<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function productView($id){
        $product = Product::findOrFail($id);
        $product_color = explode(',', $product->product_color);
        $product_size = explode(',', $product->product_size);
        $categories = Category::all();
        return view('pages.product_details', compact('product', 'product_color', 'product_size', 'categories'));
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

    // Display all products of a sub category
    public function productsView($sub_category_id){
        $sub_category = SubCategory::findOrFail($sub_category_id);
        $sub_name = $sub_category->name;
        $categories = Category::all();
        $brands_id = DB::table('products')->where('sub_category_id', $sub_category_id)->select('brand_id')->groupBy('brand_id')->get();
        $products = DB::table('products')->where('sub_category_id', $sub_category_id)->paginate(10);
        return view('pages.all_products', compact('products', 'categories', 'sub_name', 'brands_id'));
    }

    // Display all products of a category
    public function categoriesView($category_id){
        $cat = Category::findOrFail($category_id);
        $products = Product::where('category_id', $category_id)->paginate(10);
        $brands = Brand::all();
        $categories = Category::all();
        return view('pages.all_category', compact('products', 'categories', 'cat', 'brands'));
    }


}
