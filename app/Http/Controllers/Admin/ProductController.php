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
            return redirect()->back()->with($notification);

        }

    }

    // Get Sub Category
    public function getSubCategory($category_id)
    {
        $category = Category::findOrFail($category_id);
        $subCategories = $category->sub_categories;
        return json_encode($subCategories);
    }



}
