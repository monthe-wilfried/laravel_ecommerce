<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRoleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Get all non admin users
    public function userRole(){
        $users = Admin::where('type',2)->get();
        return view('admin.role.all_role', compact('users'));
    }

    // Create Admin
    public function createAdmin(){
        return view('admin.role.create_role');
    }

    // store admin records
    public function storeAdmin(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ]);

        $inputs = $request->except('password');
        $inputs['type'] = 2;
        $inputs['password'] = Hash::make($request->password);
        Admin::create($inputs);
        $notification=array(
            'message'=>'Child Admin created Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.all.user')->with($notification);

    }


    // Show Edit Admin Form
    public function editAdmin($id){
        $user = Admin::whereId($id)->first();
        return view('admin.role.edit_role', compact('user'));
    }

    // update admin records
    public function updateAdmin(Request $request, $id){

        $user = Admin::findOrFail($id);
        $input = array();
        $input['name'] = $request->name;
        $input['phone'] = $request->phone;
        $input['email'] = $request->email;
        $input['category'] = $request->category;
        $input['coupon'] = $request->coupon;
        $input['product'] = $request->product;
        $input['order'] = $request->order;
        $input['blog'] = $request->blog;
        $input['newsletter'] = $request->newsletter;
        $input['return'] = $request->return;
        $input['report'] = $request->report;
        $input['role'] = $request->role;
        $input['seo'] = $request->seo;
        $input['contact'] = $request->contact;
        $input['review'] = $request->review;
        $input['setting'] = $request->setting;
        $input['stock'] = $request->stock;


        if ($request->password && strlen($request->password)>=6){
            $input['password'] = Hash::make($request->password);
            $user->update($input);
            $notification=array(
                'message'=>'Child Admin updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        elseif (empty($request->password)){
            $user->update($input);
            $notification=array(
                'message'=>'Child Admin updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            $notification=array(
                'message'=>'Password must be atlist 6 characters',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }


    }

    // Delete Admin
    public function deleteAdmin($id){
        Admin::whereId($id)->delete();
        $notification=array(
            'message'=>'Child Admin deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.all.user')->with($notification);
    }


    // Product Stock
    public function productStock(){
        $products = Product::all();
        return view('admin.stock.stock', compact('products'));
    }


}
