<?php

namespace App\Http\Controllers\Frontend;

use App\Blogs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        $data['blogs']=Blogs::all()->sortby('blogs_must');
        return view('frontend.blogs.index',compact('data'));
    }

    public function detail($slugs)
    {
        $data['blogs_list']=Blogs::all()->sortBy('blogs_must');
        $data['blogs']=Blogs::where('blogs_slug',$slugs)->first();
        return view('frontend.blogs.detail',compact('data'));
    }
}
