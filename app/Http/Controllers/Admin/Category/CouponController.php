<?php

namespace App\Http\Controllers\Admin\Category;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public  function index(){
        $coupons = Coupon::all();
        return view('admin.coupon.coupon', compact('coupons'));
    }

    // Store coupon record
    public function store(Request $request){
        $this->validate($request, [
            'coupon' => 'required|unique:coupons',
            'discount' => 'required|max:3'
        ]);

        $input = $request->all();
        Coupon::create($input);
        $notification = array(
            'message' => 'Coupon successfully created.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Edit coupon record
    public  function edit($id){
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.coupon_edit', compact('coupon'));
    }

    // Update coupon record
    public  function update(Request $request, $id){
        $this->validate($request, [
            'coupon' => 'required',
            'discount' => 'required|max:3'
        ]);
        $input = $request->all();
        $coupon = Coupon::whereId($id)->first();
        $coupon->update($input);
        $notification = array(
            'message' => 'Coupon successfully updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.coupons.index')->with($notification);
    }

    // Delete coupon record
    public  function delete($id){
        $coupon = Coupon::whereId($id)->first();
        $coupon->delete();
        $notification = array(
            'message' => 'Coupon successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



}
