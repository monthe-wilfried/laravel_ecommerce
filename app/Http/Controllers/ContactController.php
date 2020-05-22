<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //Contact Page View
    public function contactPage(){
        $categories = Category::all();
        $site = DB::table('sitesetting')->first();
        return view('pages.contact', compact('categories', 'site'));
    }


    //Contact Form Store records
    public function contactForm(Request $request){
        $inputs = $request->all();
        Contact::create($inputs);
        $notification = array(
            'message' => 'Message sent successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    //Contact Form Store records
    public function allMessages(Request $request){
        $messages = Contact::all();
        return view('admin.contact.all_messages', compact('messages'));

    }


    //Delete message records
    public function deleteMessage($id){
        Contact::whereId($id)->delete();
        $notification = array(
            'message' => 'Message deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    //Delete message records
    public function search(Request $request){
        $item = $request->search;
        $products = Product::where('product_name', 'LIKE', "%$item%")->paginate(20);
        return view('pages.search', compact('products'));

    }

}
