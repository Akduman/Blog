<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class SettingsController extends Controller
{
    public function index()
    {
        $data['adminSettings']=Settings::all()->sortBy('settings_must');
       
        return view('backend.settings.index',compact('data'));
    }

    public function sortable()
    {
       // print_r($_POST['item']);
        
        foreach ($_POST['item'] as $key => $value)
        {
            $settings=Settings::find(intval($value));
            $settings->settings_must=intval($key);
            $settings->save();
        }
        echo true;
    }

    public function destroy($id)
    {
            $settings=Settings::find(intval($id));
            if ($settings->delete()) {
                return back()->with('success','Success');
            }
            else {
                return back()->with('error','Faild');
            }
    }
    public function edit($id)
    {
        $settings=Settings::where('id',$id)->first();
        return view('backend.settings.edit')->with('settings',$settings);
    }
    
    public function update(Request $request,$id){

        
        if ($request->hasFile('settings_key')) {
            $request->validate(
                ['settings_key'=>'required|image|mimes:jpg,jpeg,png|max:2048']
            );
            $file_name=uniqid().'.'.$request->settings_key->getClientOriginalExtension();
            $request->settings_key->move(public_path('/images/settings'),$file_name);
            $request->settings_key=$file_name;
        }

        try {
            $settings=Settings::where('id',$id)->update(
                [
                    "settings_value"=>$request->settings_value,
                    "settings_key"=>$request->settings_key,
                    "settings_description"=>$request->settings_description
                ]                    
            );
            $path='images/settings/'.$request->settings_old_key;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
            return back()->with("success","editing completed");
        } 
        catch (\Throwable $th) {
            return back()->with("error","editing uncompleted");
        }  

    }


}
