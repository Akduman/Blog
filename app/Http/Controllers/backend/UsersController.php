<?php


namespace App\Http\Controllers\backend;
use Illuminate\Support\Str;
use App\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller

{
    public function index()
    {
        $data['users']=Users::all()->sortBy('users_must');
        return view('backend.users.index',compact('data')); 

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
     $request->validate([
        'users_name' => 'required',
        'users_email' => 'required|email',
        'users_password' => 'required|Min:6'
    ]);


    if ($request->hasFile('users_file')) {
        $request->validate([
            'users_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file_name=uniqid().'.'.$request->users_file->getClientOriginalExtension();
        $request->users_file->move(public_path('/images/users'),$file_name);
    } else {
        $file_name = null;
    }


    $user = Users::insert(
        [
            "name" => $request->users_name,
            "email" => $request->users_email,
            "users_file" => $file_name,//İşlem
            "password" => Hash::make($request->users_password),
            "users_status" => $request->users_status,
            "role" => 'user',
        ]
    );

    if ($user) {
        return redirect(route('users.index'))->with('success', 'İşlem Başarılı');
    }
    return back()->with('error', 'İşlem Başarısız');
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
        $users=Users::where('id',$id)->first();
        return view('backend.users.edit')->with('users',$users);
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

        $request->validate([
            'users_name' => 'required',
            'users_email' => 'required|email',
        ]);


        if ($request->hasFile('users_file')) {
            $request->validate([
                'users_files' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $file_name = uniqid() . '.' . $request->users_file->getClientOriginalExtension();
            $request->users_file->move(public_path('images/users'), $file_name);


            if (strlen($request->password) > 0) {

                $request->validate([
                    'users_password' => 'required|Min:6'
                ]);

                $user = Users::Where('id', $id)->update(
                    [
                        "name" => $request->users_name,
                        "email" => $request->users_email,
                        "users_file" => $file_name,//İşlem
                        "password" => Hash::make($request->users_password),
                        "users_status" => $request->users_status,
                    ]
                );
            } else {
                $user = Users::Where('id', $id)->update(
                    [
                        "name" => $request->users_name,
                        "email" => $request->users_email,
                        "users_file" => $file_name,//İşlem
                        "users_status" => $request->users_status,
                    ]
                );
            }


            $path = 'images/users/' . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }

        } else {

            if (strlen($request->password) > 0) {

                $request->validate([
                    'password' => 'required|Min:6'
                ]);

                $users = Users::Where('id', $id)->update(
                    [
                        "name" => $request->users_name,
                        "email" => $request->users_email,
                        "password" => Hash::make($request->users_password),
                        "users_status" => $request->users_status,
                    ]
                );

            } else {

                $users = Users::Where('id', $id)->update(
                    [
                        "name" => $request->users_name,
                        "email" => $request->users_email,
                        "users_status" => $request->users_status,
                    ]
                );

            }


        }

        if ($users) {
            return back()->with('success', 'İşlem Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users=Users::find(intval($id));
        if ($users->delete()) {
            echo 1;
        }
        echo 0;
    }

    public function sortable()
    {
      //  print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $value)
        {
            $users=Users::find(intval($value));
            $users->users_must=intval($key);
            $users->save();
        }
        echo true;
    }
}

