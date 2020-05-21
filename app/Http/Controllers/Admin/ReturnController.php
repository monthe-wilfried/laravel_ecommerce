<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Display Return Requests
    public function returnRequest()
    {
        $orders = Order::where('return_order',1)->get();
        return view('admin.return.request', compact('orders'));
    }


    // Approve Return Requests
    public function approveReturn($id)
    {
        $order = Order::where('id',$id)->first();
        $order->update(['return_order'=>2]);
        $notification=array(
            'message'=>'Return Request Approved!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    // Display all approved returned Requests
    public function allRequests()
    {
        $orders = Order::where('return_order',2)->get();
        return view('admin.return.all_requests', compact('orders'));
    }
}
