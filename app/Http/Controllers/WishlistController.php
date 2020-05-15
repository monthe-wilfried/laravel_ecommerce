<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    //
    public function addWishlist($id){

        $user_id = Auth::id();
        $product_id = $id;
        $check = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if (Auth::check()){
            if ($check){
                return \Response::json(['error'=>'Already in your wishlist']);
            }
            else{
                Wishlist::create(['user_id'=>$user_id, 'product_id'=>$product_id]);
                return \Response::json(['success'=>'Added to your wishlist']);
            }
        }
        else{
           return \Response::json(['error'=>'Log in first to your account']);
        }
    }

    // Show wishlist view
    public function wishlist(){

        if (Auth::check()){
            $user_id = Auth::id();
            $products = DB::table('wishlists')
                        ->join('products', 'wishlists.product_id', 'products.id')
                        ->select('products.*', 'wishlists.user_id')
                        ->where('wishlists.user_id', $user_id)
                        ->get();
            return view('pages.wishlist', compact('products'));
        }
        else{
            $notification=array(
                'message'=>'Login first to your account!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // Remove individual product from wishlist
    public function removeWishlist($product_id){
        $product = Wishlist::where('product_id', $product_id)->first();
        $product->delete();
        $notification=array(
            'message'=>'Product removed from wishlist',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }



}
