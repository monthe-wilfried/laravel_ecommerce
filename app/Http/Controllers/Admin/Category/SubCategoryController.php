<?php

namespace App\Http\Controllers\Admin\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // View sub category main page
    public function index(){
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.category.sub_category', compact( 'subCategories', 'categories'));
    }

    // Store sub category record
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'category_id' => 'required'
        ]);

        $input = $request->all();
        SubCategory::create($input);
        $notification = array(
            'message' => 'Sub Category successfully created.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Edit sub category record
    public function edit($id){
        $categories = Category::all();
        $subCategory = SubCategory::findOrFail($id);
        return view('admin.category.sub_category_edit', compact('subCategory', 'categories'));
    }

    // Update sub category record
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:255',
            'category_id' => 'required'
        ]);
        $subCategory = SubCategory::findOrFail($id);
        $input = $request->all();
        $subCategory->update($input);
        $notification = array(
            'message' => 'Sub Category successfully updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('sub.categories.index')->with($notification);
    }

    // Delete sub category record
    public function delete($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        $notification = array(
            'message' => 'Sub Category successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


}
