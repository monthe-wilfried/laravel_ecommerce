<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function productVew($id){
        $product = Product::findOrFail($id);
        $product_color = explode(',', $product->product_color);
        $product_size = explode(',', $product->product_size);
        return view('pages.product_details', compact('product', 'product_color', 'product_size'));
    }

    public function addCart(Request $request, $id){
        $product = Product::findOrFail($id);
        $data = array();

        if (Auth::check()){
            if ($product->discount_price == Null){
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['qty'] = $request->qty;
                $data['price'] = $product->selling_price;
                $data['weight'] = 1;
                $data['options']['color'] = $request->color;
                $data['options']['size'] = $request->size;
                $data['options']['image'] = $product->image_one;
                Cart::add($data);
                $notification=array(
                    'message'=>'Added to your cart.',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }
            else{
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['qty'] = $request->qty;
                $data['price'] = $product->discount_price;
                $data['weight'] = 1;
                $data['options']['color'] = $request->color;
                $data['options']['size'] = $request->size;
                $data['options']['image'] = $product->image_one;
                Cart::add($data);
                $notification=array(
                    'message'=>'Added to your cart.',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }
        }
        else{
            $notification=array(
                'message'=>'Log in to your account',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
