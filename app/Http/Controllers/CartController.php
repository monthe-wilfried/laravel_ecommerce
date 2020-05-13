<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
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

    public function showCart(){
        $cart = Cart::content();
        return view('pages.cart', compact('cart'));
    }

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
        Cart::update($rowId, $qty);
        $notification=array(
            'message'=>'Product Quantity Updated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


}
