<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Jorenvh\Share;

class FrontCon extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('front.index',compact('blogs'));
    }

    public function single_post(String $id){
        $blog = Blog::find($id);
        $share =  \Share::page(
            'http://127.0.0.1:8000/trip/single/'.$id,
            'Trips Website Blog : '. $blog->post_title,
        )
            ->Facebook()
            ->twitter()
            ->reddit()
            ->whatsapp()
            ->telegram()
            ->Linkedin();
        return view('single-post',compact('blog','share'));
    }
}
