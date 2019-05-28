<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\backend\role\CreateRoleRequest;
use App\Module;
use App\Permission;
use App\Role;
//use App\Http\Requests\backend\Role\CreatePermissionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function __construct(){
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title']="Listing Role";
        $data['roles']=Role::all();

        //yo garda ne mil6
//        $data['roles']=DB::table('roles')->get();

        return view('backend.roles.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']="Create Role";
        return view('backend.roles.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {

//        $request['created_by']=Auth::user()->id;
        $request->request->add(['created_by' => Auth::user()->id]);

        //storing data in Role : Role::create($request->all())
        $status=Role::create($request->all());
//        dd($status);
        if($status){
            return redirect()->route('backend.role.index');
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
        $data['page_title']="View Role Details";
        $data['role']=Role::find($id);
        return view('backend/roles/show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title']="Editing Role";
        $data['role']=Role::find($id);
        return view('backend/roles/edit',compact('data'));
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
        $cdata=Role::find($id);
        $status=$cdata->update($request->all());
        if($status){
            return redirect()->route('backend.role.index');
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
        $Role=Role::find($id);
        $Role->delete();
        return redirect()->route('backend.role.index');
    }

    function  assignpermission($id){
        $data['page_title']="Assign Permission to  Role";
        $data['role'] = Role::find($id);
        $data['permissions'] = Permission::all();
        $ap = [];
        foreach ($data['role']->permissions as $permission){
            $ap[] = $permission->id;
        }
        $data['assigned_permissions'] = $ap;
        return view('backend.roles.assignpermission',compact('data'));
    }

    function  postpermission(Request $request){
        $role = Role::find($request->input('role_id'));
        $role->permissions()->sync($request->input('permission_id'));
        return redirect()->route('backend.role.index');


    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function  assignmodule($id){
        $data['page_title']="Assign Module to  Role";
        $data['role'] = Role::find($id);
        $data['modules'] = Module::all();
        $am = [];
        foreach ($data['role']->modules as $module){
            $am[] = $module->id;
        }
        $data['assigned_modules'] = $am;
        return view('backend.roles.assignmodule',compact('data'));
    }

    function  postmodule(Request $request){
        $role = Role::find($request->input('role_id'));
        $role->modules()->sync($request->input('module_id'));
        return redirect()->route('backend.role.index');


    }
}
