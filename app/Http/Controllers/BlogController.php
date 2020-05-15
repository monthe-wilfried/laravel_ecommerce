<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    //
    public function blog(){
        $posts = Post::all();
        return view('pages.blog', compact('posts'));
    }

    public function english(){
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang', 'english');
        return redirect()->back();
    }

    public function german(){
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang', 'german');
        return redirect()->back();
    }

    // Display single blog view
    public function singleBlog($id, $post_title){
            $posts = Post::where('id', '<>', $id)->get();
            $singlePost = Post::whereId($id)->first();
            return view('pages.single_blog', compact('posts', 'singlePost'));

    }
}
