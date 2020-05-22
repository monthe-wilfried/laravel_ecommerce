<?php

namespace App\Http\Controllers;

use App\Country;
use App\Mail\InvoiceMail;
use App\Order;
use App\OrderDetail;
use App\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    // Payment Process
    public function payment(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country_id' => 'required',
            'payment' => 'required'
        ]);

        $country = Country::findOrFail($request->country_id);

        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['payment'] = $request->payment;
        $data['country'] = $country->name;

        if ($request->payment == 'stripe'){
            return view('pages.payment.stripe', compact('data'));
        }
        elseif ($request->payment == 'paypal'){
            return view('pages.payment.paypal', compact('data'));
        }
        elseif ($request->payment == 'oncash'){
            return view('pages.payment.oncash', compact('data'));
        }
        else{
            return 'Cash On Delivery';
        }


    }

    public function stripeCharge(Request $request){

        $email = Auth::user()->email;
        $total = $request->total;
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_H9OKn1K3DFjXgvc1VXXk9TiO00gBFoIMzg');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total*100,
            'currency' => 'usd',
            'description' => 'Trade Commerce Details',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        // Insert into Orders table
        $data = array();

        $data['user_id'] = Auth::id();
        $data['payment_type'] = $request->payment_type;
        $data['payment_id'] = $charge->payment_method;
        $data['paying_amount'] = $charge->amount;
        $data['balance_transaction'] = $charge->balance_transaction;
        $data['stripe_order_id'] = $charge->metadata->order_id;
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['tracking_number'] = mt_rand(100000,999999);  // Generate some random 6 digits code

        if (session()->has('coupon')){
            $data['subtotal'] = Cart::subtotal() - session()->get('coupon')['discount'];
        }
        else{
            $data['subtotal'] = Cart::subtotal();
        }
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        $order = Order::create($data);

        // Send an invoice mail to the user
        Mail::to($email)->send(new InvoiceMail($data));


        // Insert into Shippings table
        $shipping = array();
        $shipping['order_id'] = $order->id;
        $shipping['shipping_name'] = $request->shipping_name;
        $shipping['shipping_phone'] = $request->shipping_phone;
        $shipping['shipping_email'] = $request->shipping_email;
        $shipping['shipping_address'] = $request->shipping_address;
        $shipping['shipping_city'] = $request->shipping_city;
        $shipping['shipping_country'] = $request->shipping_country;
        Shipping::create($shipping);

        // Insert into order_details table
        $contents = Cart::content();
        $details = array();
        foreach ($contents as $content){
            $details['order_id'] = $order->id;
            $details['product_id'] = $content->id;
            $details['product_name'] = $content->name;
            $details['color'] = $content->options->color;
            $details['size'] = $content->options->size;
            $details['quantity'] = $content->qty;
            $details['single_price'] = $content->price;
            $details['total_price'] = $content->qty * $content->price;
            OrderDetail::create($details);
        }

        Cart::destroy();
        if (session()->has('coupon')){
            session()->forget('coupon');
        }
        $notification=array(
            'message'=>'Thanks, Order successfully processed!',
            'alert-type'=>'success'
        );
        return Redirect()->to('/')->with($notification);

    }


    public function successList(){
        $orders = Order::where('user_id', Auth::id())->where('status', 3)->orderBy('id', 'desc')->paginate(5);
        return view('pages.return_order', compact('orders'));
    }


    // Return Request
    public function returnRequest($id){
        $order = Order::findOrFail($id);
        $order->update(['return_order'=>1]);
        $notification=array(
            'message'=>'Return Request done!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }



    public function oncashCharge(Request $request){

        // Insert into Orders table
        $data = array();

        $data['user_id'] = Auth::id();
        $data['payment_type'] = $request->payment_type;
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['tracking_number'] = mt_rand(100000,999999);  // Generate some random 6 digits code

        if (session()->has('coupon')){
            $data['subtotal'] = Cart::subtotal() - session()->get('coupon')['discount'];
        }
        else{
            $data['subtotal'] = Cart::subtotal();
        }
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        $order = Order::create($data);



        // Insert into Shippings table
        $shipping = array();
        $shipping['order_id'] = $order->id;
        $shipping['shipping_name'] = $request->shipping_name;
        $shipping['shipping_phone'] = $request->shipping_phone;
        $shipping['shipping_email'] = $request->shipping_email;
        $shipping['shipping_address'] = $request->shipping_address;
        $shipping['shipping_city'] = $request->shipping_city;
        $shipping['shipping_country'] = $request->shipping_country;
        Shipping::create($shipping);

        // Insert into order_details table
        $contents = Cart::content();
        $details = array();
        foreach ($contents as $content){
            $details['order_id'] = $order->id;
            $details['product_id'] = $content->id;
            $details['product_name'] = $content->name;
            $details['color'] = $content->options->color;
            $details['size'] = $content->options->size;
            $details['quantity'] = $content->qty;
            $details['single_price'] = $content->price;
            $details['total_price'] = $content->qty * $content->price;
            OrderDetail::create($details);
        }

        Cart::destroy();
        if (session()->has('coupon')){
            session()->forget('coupon');
        }
        $notification=array(
            'message'=>'Thanks, Order successfully processed!',
            'alert-type'=>'success'
        );
        return Redirect()->to('/')->with($notification);

    }







}
