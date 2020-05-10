<?php

namespace App\Http\Controllers;

use App\Newsletter;
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

}
