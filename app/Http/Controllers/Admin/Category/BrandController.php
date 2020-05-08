<?php

namespace App\Http\Controllers\Admin\Category;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // View brands records
    public function index(){
        $brands = Brand::all();
        return view('admin.category.brand', compact('brands'));
    }

    //Store a brand record
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:brands|max:255',
            'logo' => 'required|unique:brands|mimes:jpeg,bmp,png'
        ]);

        if($file = $request->file('logo')){
            $filename = date('dmy_H_s_i').$file->getClientOriginalName();
            $upload_path = 'public/media/brand/';
            $file->move($upload_path, $filename);

            $image_url = $upload_path.$filename;
            Brand::create(['name'=>$request->name, 'logo'=>$image_url]);
            $notification = array(
                'message' => 'Brand successfully created.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Brand Logo has not been created',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    // View brand edit page
    public function edit($id){
        $brand = Brand::whereId($id)->first();
        return view('admin.category.brand_edit', compact('brand'));
    }

    // Update brand record
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:255',

        ]);

        $brand = Brand::findOrFail($id);
        if($file = $request->file('logo')){
            unlink($brand->logo);
            $filename = date('dmy_H_s_i').$file->getClientOriginalName();
            $upload_path = 'public/media/brand/';
            $file->move($upload_path, $filename);

            $image_url = $upload_path.$filename;
            $brand->update(['name'=>$request->name, 'logo'=>$image_url]);
            $notification = array(
                'message' => 'Brand successfully updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('brands.index')->with($notification);
        }
        else{
            $brand->update(['name'=>$request->name]);
            $notification = array(
                'message' => 'Brand successfully updated without logo.',
                'alert-type' => 'success'
            );
            return redirect()->route('brands.index')->with($notification);
        }
    }

    // Delete a category record
    public function delete($id)
    {
       $brand = Brand::whereId($id)->first();
       if ($brand->logo){
           unlink($brand->logo);
           $brand->delete();
           $notification = array(
               'message' => 'Brand successfully deleted.',
               'alert-type' => 'success'
           );
           return redirect()->back()->with($notification);
       }

    }



}
