<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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



    // Blog Post List
    public function blogPostList(){
        $posts = Post::all();
        return view('admin.blog.post.index', compact('posts'));
    }

    // Create Post Record
    public function blogPostCreate(){
        $categories = PostCategory::all();
        return view('admin.blog.post.create', compact('categories'));
    }

    // Create Post Record
    public function blogPostStore(Request $request){
        $this->validate($request, [
            'title_en' => 'required|max:255|min:3',
            'title_de' => 'required|max:255|min:3',
            'details_en' => 'required|min:3',
            'details_de' => 'required|min:3',
            'post_category_id' => 'required'
        ]);

        $input = $request->all();
        $image_path = 'public/media/post/';
        if ($file = $request->file('image')) {
            $image_name = hexdec(uniqid()) . '.' . $file->getClientOriginalName();
            Image::make($file)->resize(640, 426)->save($image_path . $image_name);
            $input['image'] = $image_path . $image_name;
            Post::create($input);
            $notification = array(
                'message' => 'Post successfully created.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.blog.posts.index')->with($notification);
        }
        else{
            Post::create($input);
            $notification = array(
                'message' => 'Post successfully created without image.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.blog.posts.index')->with($notification);
        }

    }

    // Edit post record
    public function blogPostEdit($id){
        $post = Post::findOrFail($id);
        $categories = PostCategory::all();
        return view('admin.blog.post.edit', compact('post' ,'categories'));
    }

    // Update post Record
    public function blogPostUpdate(Request $request, $id){
        $this->validate($request, [
            'title_en' => 'required|max:255|min:3',
            'title_de' => 'required|max:255|min:3',
            'details_en' => 'required|min:3',
            'details_de' => 'required|min:3',
            'post_category_id' => 'required'
        ]);

        $post = Post::findOrFail($id);
        $input = $request->all();
        $image_path = 'public/media/post/';
        $old_image = $post->image;

        if ($file = $request->file('image')){
            unlink($old_image);
            $image_name = hexdec(uniqid()) . '.' . $file->getClientOriginalName();
            Image::make($file)->resize(640, 426)->save($image_path . $image_name);
            $input['image'] = $image_path . $image_name;
            $post->update($input);
            $notification = array(
                'message' => 'Post successfully updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.blog.posts.index')->with($notification);
        }
        else{
            $post->update($input);
            $notification = array(
                'message' => 'Post successfully updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.blog.posts.index')->with($notification);
        }
    }

    // Delete post record
    public function blogPostDelete($id){

        $post = Post::findOrFail($id);
        if ($post->image){
            unlink($post->image);
        }
        $post->delete();
        $notification = array(
            'message' => 'Post successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


}
