<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

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
    public function store()
    {

    }

    // Get Sub Category
    public function getSubCategory($category_id)
    {
        $category = Category::findOrFail($category_id);
        $subCategories = $category->sub_categories;
        return json_encode($subCategories);
    }



}
