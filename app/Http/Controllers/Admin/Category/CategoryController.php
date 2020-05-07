<?php

namespace App\Http\Controllers\Admin\Category;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Display the category view
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    // store a new category record
    public  function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:categories|max:255'
        ]);
        $input = $request->all();
        Category::create($input);

//        $data = array();
//        $data['name'] = $request->name;
//        DB::table('categories')->insert($data);
//
//        $category = new Category();
//        $category->name = $request->name;
//        $category->save();

        $notification = array(
            'message' => 'Category successfully created.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Show the category edit view
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    // Update a category record
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $category = Category::findOrFail($id);
        $input = $request->all();
        $category->update($input);
        $notification = array(
            'message' => 'Category successfully updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.index')->with($notification);
    }

    // Delete a category record
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $notification = array(
            'message' => 'Category successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
