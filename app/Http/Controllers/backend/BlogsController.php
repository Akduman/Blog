<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blogs;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs']=Blogs::all()->sortBy('blogs_must');
        return view('backend.blogs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->blogs_title==null) {
            return back()->with('error','Blog title cannot be null.');
        }
        
        if (strlen($request->blogs_slug)>3) {
            $slug=Str::slug($request->blogs_slug);
        
        }
        else {
            $slug=$request->blogs_title;
        }

        if ($request->hasFile('blogs_file')) {
            $request->validate(
                ['blogs_file'=>'required|image|mimes:jpg,jpeg,png|max:2048']
            );
            $file_name=uniqid().'.'.$request->blogs_file->getClientOriginalExtension();
            $request->blogs_file->move(public_path('/images/blogs'),$file_name);
            $request->blogs_file=$file_name;
        }
        else{
            $request->blogs_file=null;
        }

        $blogs=Blogs::insert(
            [
                'blogs_title'=>$request->blogs_title,
                'blogs_slug'=>$slug,
                'blogs_file'=>$request->blogs_file,
                'blogs_content'=> $request->blogs_content,
                'blogs_status'=>$request->blogs_status,
            ]
        );

        if ($blogs) {
            return redirect(route('blogs.index'))->with('success','Create action is complate.');
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
        $blogs=Blogs::where('id',$id)->first();
        return view('backend.blogs.edit')->with('blogs',$blogs);
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

        
        
        if ($request->blogs_title==null) {
            return back()->with('error','Blog title cannot be null.');
        }
        if ($request->blogs_file==null) {
            # code...
        }
        
        if (strlen($request->blogs_slug)>3) {
            $slug=Str::slug($request->blogs_slug);        
        }
        else {
            $slug=$request->blogs_title;
        }
        $path='images/blogs/'.$request->old_file;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }
        if ($request->hasFile('blogs_file')) {
            $request->validate(
                ['blogs_file'=>'required|image|mimes:jpg,jpeg,png|max:2048']
            );
            $file_name=uniqid().'.'.$request->blogs_file->getClientOriginalExtension();
            $request->blogs_file->move(public_path('/images/blogs'),$file_name);
            $request->blogs_file=$file_name;
        }
        else{
            $file_name=$request->old_file;
        }
        if ($request->blogs_file==null) {
            $file_name==null;
        }


        $blogs=Blogs::where('id',$id)->update(
            [
                'blogs_title'=>$request->blogs_title,
                'blogs_slug'=>$slug,
                'blogs_file'=>$file_name,
                'blogs_content'=> $request->blogs_content,
                'blogs_status'=>$request->blogs_status,
            ]
        ); 
        
        
        if ($blogs) {
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
        $blogs=Blogs::find(intval($id));
        if ($blogs->delete()) {
            echo 1;
        }
        echo 0;
    }

    public function sortable()
    {
       //print_r($_POST['item']);

       foreach ($_POST['item'] as $key => $value)
        {
            $blogs=Blogs::find(intval($value));
            $blogs->blogs_must=intval($key);
            $blogs->save();
        }
        echo true;
        
    }

}
