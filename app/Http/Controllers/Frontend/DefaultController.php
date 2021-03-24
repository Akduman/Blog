<?php

namespace App\Http\Controllers\Frontend;

use App\Blogs;
use App\Http\Controllers\Controller;
use App\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{
    public function index()
    {      
        $data['blogs']=Blogs::all()->sortBy('blogs_must');  
        $data['sliders']=Sliders::all()->sortby('slider_must');
        return view('frontend.default.index',compact('data'));
    }

    public function contact()
    {      
        
        return view('frontend.default.contact');
    }
}
