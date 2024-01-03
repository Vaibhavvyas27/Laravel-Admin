<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;
use DB;

class BlogCon extends Controller
{

    public function index(){
        $blogs = Blog::get();
        return view('admin.blogs.index',compact('blogs'));
    }
    public function store(Request $request){
        // dd($request->text);
        $image = $request->file('image')->store('uploads','public');
        $request->validate(
            [
                "title"=> 'required',
                "image"=> 'required',
                "text"=>  'required',
            ]
        );
        $user = Blog::insert(

            [
                "post_title"=> $request->title,
                "image"=>  $image,
                "description"=>  $request->text,
                "created_at"=>  now(),
                "auther"=>Auth::user()->name,
                
            ],
        );
        return to_route('blog.post.index')->with('message','Blog Is Created SucessFully');
    }

    public function show_blog_form(){
        return view('admin.blogs.show');
    }
    public function destroy(String $id){
        // dd($id);
        $blog = Blog::find($id);
        $blog->delete();
        return to_route('blog.post.index')->with('message','Blog Deleted Succesfully');
    }
    public function edit(String $id){
        $blog = Blog::find($id);
        return view('admin.blogs.edit',compact('blog'));
    }
    public function update(Request $request, $id){
        $request->validate(
            [
                "title"=> 'required',
                "text"=>  'required',
            ]
        );
        $blog = Blog::find($id);
        $blog->post_title =$request->title;
        if($request->image != null){
            $image = $request->file('image')->store('uploads','public');
            $blog->image =$image;
        }
        $blog->description =$request->text;
        $blog->save();
        return to_route('blog.post.index')->with('message','Blog Updated Succesfully');

            
    }

    public function feed_blog(){
        $blogs = Blog::get();
        // dd($blogs);
        return response()->view('rss',['blogs'=>$blogs])->header('Content-Type', 'text/xml');
    }
}
