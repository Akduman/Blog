<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pages;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function index()
    {
        $data['pages']=Pages::all()->sortBy('pages_must');
        return view('backend.pages.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->pages_title==null) {
            return back()->with('error','Blog title cannot be null.');
        }
        
        if (strlen($request->pages_slug)>3) {
            $slug=Str::slug($request->pages_slug);
        
        }
        else {
            $slug=$request->pages_title;
        }

        if ($request->hasFile('pages_file')) {
            $request->validate(
                ['pages_file'=>'required|image|mimes:jpg,jpeg,png|max:2048']
            );
            $file_name=uniqid().'.'.$request->pages_file->getClientOriginalExtension();
            $request->pages_file->move(public_path('/images/pages'),$file_name);
            $request->pages_file=$file_name;
        }
        else{
            $request->pages_file=null;
        }

        $pages=Pages::insert(
            [
                'pages_title'=>$request->pages_title,
                'pages_slug'=>$slug,
                'pages_file'=>$request->pages_file,
                'pages_content'=> $request->pages_content,
                'pages_status'=>$request->pages_status,
            ]
        );

        if ($pages) {
            return redirect(route('pages.index'))->with('success','Create action is complate.');
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
        $pages=Pages::where('id',$id)->first();
        return view('backend.pages.edit')->with('pages',$pages);
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

        
        
        if ($request->pages_title==null) {
            return back()->with('error','Blog title cannot be null.');
        }
        if ($request->pages_file==null) {
            # code...
        }
        
        if (strlen($request->pages_slug)>3) {
            $slug=Str::slug($request->pages_slug);        
        }
        else {
            $slug=$request->pages_title;
        }
        $path='images/pages/'.$request->old_file;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }
        if ($request->hasFile('pages_file')) {
            $request->validate(
                ['pages_file'=>'required|image|mimes:jpg,jpeg,png|max:2048']
            );
            $file_name=uniqid().'.'.$request->pages_file->getClientOriginalExtension();
            $request->pages_file->move(public_path('/images/pages'),$file_name);
            $request->pages_file=$file_name;
        }
        else{
            $file_name=$request->old_file;
        }
        if ($request->pages_file==null) {
            $file_name==null;
        }


        $pages=Pages::where('id',$id)->update(
            [
                'pages_title'=>$request->pages_title,
                'pages_slug'=>$slug,
                'pages_file'=>$file_name,
                'pages_content'=> $request->pages_content,
                'pages_status'=>$request->pages_status,
            ]
        ); 
        
        
        if ($pages) {
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
        $pages=Pages::find(intval($id));
        if ($pages->delete()) {
            echo 1;
        }
        echo 0;
    }

    public function sortable()
    {
      //  print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $value)
        {
            $pages=Pages::find(intval($value));
            $pages->pages_must=intval($key);
            $pages->save();
        }
        echo true;
    }
}
