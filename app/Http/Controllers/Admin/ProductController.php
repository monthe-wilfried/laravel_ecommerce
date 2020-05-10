<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // View products
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    // Show the create product view
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    // Store product record
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'product_name' => 'required',
            'product_details' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'product_color' => 'required',
            'product_size' => 'required',
            'selling_price' => 'required',
            'image_one' => 'required',
            'image_two' => 'required',
            'image_three' => 'required',
        ]);

        $input = $request->all();
        $image_path = 'public/media/product/';

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        if ($image_one && $image_two && $image_three){
            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalName();
            Image::make($image_one)->resize(300, 300)->save($image_path.$image_one_name);
            $input['image_one'] = $image_path.$image_one_name;

            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalName();
            Image::make($image_two)->resize(300, 300)->save($image_path.$image_two_name);
            $input['image_two'] = $image_path.$image_two_name;

            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalName();
            Image::make($image_three)->resize(300, 300)->save($image_path.$image_three_name);
            $input['image_three'] = $image_path.$image_three_name;

            Product::create($input);
            $notification = array(
                'message' => 'Product successfully created.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.products.index')->with($notification);

        }

    }

    // Show the single product page
    public function show($id){
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    // Show edit product page
    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'categories', 'brands', 'subCategories'));
    }

    // Update product record without photo
    public function updateWithoutPhoto(Request $request, $id){
        $this->validate($request, [
            'category_id' => 'required',
            'product_name' => 'required',
            'product_details' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'product_color' => 'required',
            'product_size' => 'required',
            'selling_price' => 'required',
        ]);

        $input = $request->all();
        $input['main_slider'] = $request->main_slider;
        $input['hot_deal'] = $request->hot_deal;
        $input['trend'] = $request->trend;
        $input['mid_slider'] = $request->mid_slider;
        $input['hot_new'] = $request->hot_new;
        $input['best_rated'] = $request->best_rated;

        $product = Product::findOrFail($id);
        $product->update($input);
        $notification = array(
            'message' => 'Product successfully updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Update product photos
    public function updatePhoto(Request $request, $id){

        $product = Product::findOrFail($id);
        $image_path = 'public/media/product/';

        $old_image_one = $product->image_one;
        $old_image_two = $product->image_two;
        $old_image_three = $product->image_three;

        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');

        if ($image_one) {
            unlink($old_image_one);
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalName();
            Image::make($image_one)->resize(300, 300)->save($image_path . $image_one_name);
            $image_one_final = $image_path . $image_one_name;

            $product->update(['image_one'=>$image_one_final]);
            $notification = array(
                'message' => 'Image one successfully updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.products.index')->with($notification);
        }

        if ($image_two) {
            unlink($old_image_two);
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalName();
            Image::make($image_two)->resize(300, 300)->save($image_path . $image_two_name);
            $image_two_final = $image_path . $image_two_name;

            $product->update(['image_two'=>$image_two_final]);
            $notification = array(
                'message' => 'Image two successfully updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.products.index')->with($notification);
        }


        if ($image_three) {
            unlink($old_image_three);
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalName();
            Image::make($image_three)->resize(300, 300)->save($image_path . $image_three_name);
            $image_three_final = $image_path . $image_three_name;

            $product->update(['image_three'=>$image_three_final]);
            $notification = array(
                'message' => 'Image three successfully updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.products.index')->with($notification);
        }

    }


    // Activate product
    public function active($status_id)
    {
        $product = Product::where('status', $status_id)->first();
        $product->update(['status'=>1]);
        $notification = array(
            'message' => 'Product successfully active.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Inactivate product
    public function inactive($status_id)
    {
        $product = Product::where('status', $status_id)->first();
        $product->update(['status'=>0]);
        $notification = array(
            'message' => 'Product successfully inactive.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    // Get Sub Category
    public function getSubCategory($category_id)
    {
        $category = Category::findOrFail($category_id);
        $subCategories = $category->sub_categories;
        return json_encode($subCategories);
    }

    // Delete Product record
    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $image_one = $product->image_one;
        $image_two = $product->image_two;
        $image_three = $product->image_three;
        unlink($image_one);
        unlink($image_two);
        unlink($image_three);
        $product->delete();
        $notification = array(
            'message' => 'Product successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }



}
