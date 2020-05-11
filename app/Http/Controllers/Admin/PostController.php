<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Blog Category List
    public function blogCategoryList(){
        $categories = PostCategory::all();
        return view('admin.blog.category.index', compact('categories'));
    }

    // Store blog category records
    public function blogCategoryStore(Request $request){
        $this->validate($request, [
            'category_name_en' => 'required|max:50',
            'category_name_de' => 'required|max:50'
        ]);

        $input = $request->all();
        PostCategory::create($input);
        $notification = array(
            'message' => 'Category successfully created.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Edit Category Record
    public function blogCategoryEdit($id){
        $category = PostCategory::whereId($id)->first();
        return view('admin.blog.category.edit', compact('category'));
    }

    // Update Category Record
    public function blogCategoryUpdate(Request $request, $id){
        $this->validate($request, [
            'category_name_en' => 'required|max:50',
            'category_name_de' => 'required|max:50'
        ]);

        $input = $request->all();
        $category = PostCategory::whereId($id)->first();
        $category->update($input);
        $notification = array(
            'message' => 'Category successfully updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.categories.index')->with($notification);
    }



    // Delete blog category record
    public function blogCategoryDelete($id){
        PostCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


}
