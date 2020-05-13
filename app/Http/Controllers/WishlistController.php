<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
}
