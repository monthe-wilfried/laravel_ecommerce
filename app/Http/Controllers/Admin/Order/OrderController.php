<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Order;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Display pending Orders
    public function newOrder(){
        $orders = Order::where('status',0)->get();
        return view('admin.order.pending', compact('orders'));
    }

    // Display pending order details
    public function viewOrder($id){
        $order = DB::table('orders')
                    ->join('users', 'orders.user_id', 'users.id')
                    ->select('orders.*', 'users.name', 'users.phone')
                    ->where('orders.id', $id)
                    ->first();

        $shipping = Shipping::where('order_id', $id)->first();

        $details = DB::table('order_details')
                    ->join('products', 'order_details.product_id', 'products.id')
                    ->select('order_details.*', 'products.product_code', 'products.image_one')
                    ->where('order_id', $id)
                    ->get();

        return view('admin.order.view_order', compact('order', 'shipping', 'details'));

    }

    // Accept payment
    public function paymentAccept($id){
        $order = Order::findOrFail($id);
        $order->update(['status' => 1]);
        $notification=array(
            'message'=>'Payment Accepted',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.new.order')->with($notification);
    }

    // Cancel payment
    public function paymentCancel($id){
        $order = Order::findOrFail($id);
        $order->update(['status'=>4]);
        $notification=array(
            'message'=>'Order Canceled',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.new.order')->with($notification);
    }

    // Display Orders which payment has been Accepted
    public function acceptPaymentView(){
        $orders = Order::where('status',1)->get();
        return view('admin.order.pending', compact('orders'));
    }

    // Display canceled Orders
    public function cancelOrder(){
        $orders = Order::where('status',4)->get();
        return view('admin.order.pending', compact('orders'));
    }

    // Display processed Orders
    public function processOrder(){
        $orders = Order::where('status',2)->get();
        return view('admin.order.pending', compact('orders'));
    }

    // Display success delivery orders
    public function successDelivery(){
        $orders = Order::where('status',3)->get();
        return view('admin.order.pending', compact('orders'));
    }

    // Accept payment
    public function deliveryProcess($id){
        $order = Order::findOrFail($id);
        $order->update(['status' => 2]);
        $notification=array(
            'message'=>'Send to Process Delivery',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.accept.payment')->with($notification);
    }

    // Delivery Done
    public function deliverySuccess($id){
        $order = Order::findOrFail($id);
        $order->update(['status' => 3]);
        $notification=array(
            'message'=>'Product Successfully delivered',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.process.order')->with($notification);
    }


}
