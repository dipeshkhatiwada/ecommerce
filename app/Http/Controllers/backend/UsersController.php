<?php

namespace App\Http\Controllers\backend;

use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\user\CreateUserRequest;
use App\Http\Requests\backend\user\CreateSubuserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title']='List User';
        $data['users']=User::all();
//        dd($data);
        return view('backend.users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles']=Role::pluck('name','id');
        $data['roles']->prepend('Select Role','');

        $data['page_title']='Create User';
        return view('backend.users.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        if ($request->has('file')){
            $file = $request->file('file');
            $file_name=uniqid().'_'.$file->getClientOriginalName();
            $file->move('images/users',$file_name);
            $request->request->add(['image'=> $file_name]);
        }
        $request->request->add(['password'=> Hash::make($request->input('password'))]);
//        dd($request);

        $user=User::create($request->all());
        if ($user){
            return redirect()->route('backend.user.index');
        }else{
            return back();
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
        $data['page_title']='Edit User';
        $data['user']=User::find($id);
//        dd($data);
        return view('backend.users.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title']='Edit User';
        $data['user']=User::find($id);
//        dd($data);
        return view('backend.users.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user= User::find($id);
        $user->update($request->all());
//        dd($user);
        if ($user){
            return redirect()->route('backend.user.index');
        }else{
            return back();
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
        $user= User::find($id);
        $user->delete();
        return redirect()->route('backend.user.index');

    }
}
