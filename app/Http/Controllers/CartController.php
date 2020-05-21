<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Coupon;
use App\Product;
use App\Setting;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Add Product in cart if user is authenticated
    public function addCart($id){
        $product = Product::findOrFail($id);
        $data = array();

        if (Auth::check()){
            if ($product->discount_price == Null){
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['qty'] = 1;
                $data['price'] = $product->selling_price;
                $data['weight'] = 1;
                $data['options']['color'] = '';
                $data['options']['size'] = '';
                $data['options']['image'] = $product->image_one;
                Cart::add($data);
                return \Response::json(['success'=>'Added to your cart.']);
            }
            else{
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['qty'] = 1;
                $data['price'] = $product->discount_price;
                $data['weight'] = 1;
                $data['options']['color'] = '';
                $data['options']['size'] = '';
                $data['options']['image'] = $product->image_one;
                Cart::add($data);
                return \Response::json(['success'=>'Added to your cart.']);
            }
        }
        else{
            return \Response::json(['error'=>'Log in first to your account']);
        }

    }

    public function check(){
        $content = Cart::content();
        dd($content);
    }

    // Show cart content
    public function showCart(){
        $cart = Cart::content();
        $categories = Category::all();
        return view('pages.cart', compact('cart', 'categories'));
    }

    // Remove individual cart items
    public function removeCart($rowId){
        Cart::remove($rowId);
        $notification=array(
            'message'=>'Product removed from cart',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function updateQuantity(Request $request){
        $rowId = $request->product_id;
        $qty = $request->qty;

        $product = Product::findOrFail($request->id);
        // Checks if the requested number of products by the user is greater than what we have in stock
        if ($qty > $product->product_quantity){
            $notification=array(
                'message'=>'Only '.$product->product_quantity.' products left in Stock',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            Cart::update($rowId, $qty);
            $notification=array(
                'message'=>'Product Quantity Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }


    }

    // Product quick view in the modal
    public function quickViewProduct($id){
        $product = Product::findOrFail($id);

        $product_category = $product->category->name;
        $product_sub = $product->sub_category->name;
        $product_brand = $product->brand->name;
        $product_color = explode(',', $product->product_color);
        $product_size = explode(',', $product->product_size);

        return response::json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
            'category' => $product_category,
            'sub_category' => $product_sub,
            'brand' => $product_brand,
        ));
    }

    // Insert product in the cart if user is authenticated
    public function insertCart(Request $request){
        $id = $request->product_id;
        $product = Product::findOrFail($id);
        $color = $request->color;
        $size = $request->size;
        $quantity = $request->qty;

        $data = array();

        if (Auth::check()){
            if ($product->discount_price == Null){
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['qty'] = $quantity;
                $data['price'] = $product->selling_price;
                $data['weight'] = 1;
                $data['options']['color'] = $color;
                $data['options']['size'] = $size;
                $data['options']['image'] = $product->image_one;
                Cart::add($data);
                $notification=array(
                    'message'=>'Added to your Cart',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }
            else{
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['qty'] = $quantity;
                $data['price'] = $product->discount_price;
                $data['weight'] = 1;
                $data['options']['color'] = $color;
                $data['options']['size'] = $size;
                $data['options']['image'] = $product->image_one;
                Cart::add($data);
                $notification=array(
                    'message'=>'Added to your Cart',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }
        }
        else{
            $notification=array(
                'message'=>'Login first to your account',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // Shows the checkout view if user is authenticated
    public function checkout(){
        if (Auth::check()){
            $cart = Cart::content();
            $setting = Setting::all();
            return view('pages.checkout', compact('cart', 'setting'));
        }
        else{
            $notification=array(
                'message'=>'Login first to your account and make some purchases!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // Apply Coupon
    public function applyCoupon(Request $request){
        $coupon = $request->coupon;
        $check = Coupon::where('coupon', $coupon)->first();
        if ($check){
            Session::put('coupon', [
                'name' => $check->coupon,
                'discount' => $check->discount,
//                'balance' => Cart::subtotal() - $check->discount
            ]);
            $notification=array(
                'message'=>'Coupon applied!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            $notification=array(
                'message'=>'Invalid Coupon!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // Remove Coupon
    public function removeCoupon(){
        Session::forget('coupon');
        $notification=array(
            'message'=>'Session Removed!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    // Payment page
    public function paymentPage(){
        if (Auth::check()){
            $cart = Cart::content();
            $setting = Setting::all();
            $categories = Category::all();
            $countries = Country::all();
            return view('pages.payment', compact('cart', 'setting', 'categories', 'countries'));
        }
        else{
            $notification=array(
                'message'=>'Login first to your account and make some purchases!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // Remove all products from the cart
    public function removeAll(){
//        Cart::destroy();
//        $notification=array(
//            'message'=>'Cart is empty!',
//            'alert-type'=>'info'
//        );
//        return Redirect()->back()->with($notification);
    }

}
