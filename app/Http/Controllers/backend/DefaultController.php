<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{


    public function index()
    {
       return view("backend.default.index");
    }

    public function login()
    {   
        return view('backend.default.login');
    }

    public function authenticate(Request $request)
    {
        $request->flash(); /// form verilerini geri gönderir.
        
        $credentials=$request->only('password','email');
        $remember_me=$request->has('remmeber_me')? true:false;

        if (Auth::attempt($credentials,$remember_me)) {
            return redirect()->intended(route('nedmin.Index'));
        } else {
            return back()->with('error','Wrong e-mail or password');
        }      

    }
    
    public function logout()
    {
        Auth::logout();
        return redirect(route('nedmin.Login'))->with('success','Logout');
    }

}
