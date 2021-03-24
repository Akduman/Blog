<?php

namespace App\Http\Controllers\backend;
use App\Sliders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class SlidersController extends Controller
{
    public function index()
    {
        $data['sliders']=Sliders::all()->sortBy('sliders_must');
        return view('backend.sliders.index',compact('data'));
  

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->sliders_title==null) {
            return back()->with('error','Blog title cannot be null.');
        }
        
        if (strlen($request->sliders_slug)>3) {
            $slug=Str::slug($request->sliders_slug);
        
        }
        else {
            $slug=$request->sliders_title;
        }

        if ($request->hasFile('sliders_file')) {
            $request->validate(
                ['sliders_file'=>'required|image|mimes:jpg,jpeg,png|max:2048']
            );
            $file_name=uniqid().'.'.$request->sliders_file->getClientOriginalExtension();
            $request->sliders_file->move(public_path('/images/sliders'),$file_name);
            $request->sliders_file=$file_name;
        }
        else{
            $request->sliders_file=null;
        }

        $sliders=Sliders::insert(
            [
                'sliders_title'=>$request->sliders_title,
                'sliders_slug'=>$slug,
                'sliders_file'=>$request->sliders_file,
                'sliders_content'=> $request->sliders_content,
                'sliders_status'=>$request->sliders_status,
            ]
        );

        if ($sliders) {
            return redirect(route('sliders.index'))->with('success','Create action is complate.');
        }
         else 
        {
            return back()->with('error','Create action is not complate.');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders=Sliders::where('id',$id)->first();
        return view('backend.sliders.edit')->with('sliders',$sliders);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        
        
        if ($request->sliders_title==null) {
            return back()->with('error','Blog title cannot be null.');
        }
        
        if (strlen($request->sliders_slug)>3) {
            $slug=Str::slug($request->sliders_slug);        
        }
        else {
            $slug=$request->sliders_title;
        }


       

        if ($request->hasFile('sliders_file')) {
            $request->validate(
                ['sliders_file'=>'required|image|mimes:jpg,jpeg,png|max:2048']
            );
            $file_name=uniqid().'.'.$request->sliders_file->getClientOriginalExtension();
            $request->sliders_file->move(public_path('/images/sliders'),$file_name);
            //$request->sliders_file=$file_name;
            
            $path='images/sliders/'.$request->old_file;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }
        }
        else{
            $file_name=$request->old_file;
        }

        $sliders=Sliders::where('id',$id)->update(
            [
                'sliders_title'=>$request->sliders_title,
                'sliders_slug'=>$slug,
                'sliders_file'=>$file_name,
                'sliders_content'=> $request->sliders_content,
                'sliders_status'=>$request->sliders_status,
            ]
        ); 
        
        
        if ($sliders) {
            return back()->with('success','Editing okey');
        }
        else {
            return back()->with('error','Editing error');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders=Sliders::find(intval($id));
        if ($sliders->delete()) {
            echo 1;
        }
        echo 0;
    }

    public function sortable()
    {
      //  print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $value)
        {
            $sliders=Sliders::find(intval($value));
            $sliders->sliders_must=intval($key);
            $sliders->save();
        }
        echo true;
    }
}
