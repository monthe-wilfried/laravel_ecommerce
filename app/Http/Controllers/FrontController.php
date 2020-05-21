<?php

namespace App\Http\Controllers;

use App\Newsletter;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    // Store newsletter record
    public function storeNewsletter(Request $request){
        $this->validate($request, [
            'email' => 'required|unique:newsletters|max:55'
        ]);

        $input = $request->all();
        Newsletter::create($input);
        $notification = array(
            'message' => 'Thanks for subscribing.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Track your Order
    public function orderTracking(Request $request){
        $code = $request->code;
        $track = Order::where('tracking_number', $code)->first();
        if ($track){
            return view('pages.tracking', compact('track'));
        }
        else{
            $notification = array(
                'message' => 'Invalid Tracking Code',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

}
