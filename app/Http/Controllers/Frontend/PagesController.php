<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function detail($slugs)
    {
        $data['pages_list']=Pages::all()->sortBy('pages_must');
        $data['pages']=Pages::where('pages_slug',$slugs)->first();
        return view('frontend.pages.detail',compact('data'));
    
    }
}
