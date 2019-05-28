<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\backend\permission\CreatePermissionRequest;
use App\Http\Requests\backend\permission\CreateProductRequest;
use App\Module;
use App\Permission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermissionsController extends Controller
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
        $data['page_title']="Listing Permission";
        $data['permissions']=Permission::all();

        //yo garda ne mil6
//        $data['permissions']=DB::table('permissions')->get();

        return view('backend.permissions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']="Create Permission";
        $data['modules']=Module::pluck('name','id');
        return view('backend.permissions.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePermissionRequest $request)
    {


//        $request['created_by']=Auth::user()->id;
        $request->request->add(['created_by' => Auth::user()->id]);

        //storing data in permission : Permission::create($request->all())
        $status=Permission::create($request->all());
//        dd($status);
        if($status){
            return redirect()->route('backend.permission.index');
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
        $data['page_title']="View Permission Details";
        $data['permission']=Permission::find($id);
        return view('backend/permissions/show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title']="Editing Permission";
        $data['permission']=Permission::find($id);
        $data['modules']=Module::pluck('name','id');

        return view('backend/permissions/edit',compact('data'));
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
        $cdata=Permission::find($id);
        $status=$cdata->update($request->all());
        if($status){
            return redirect()->route('backend.permission.index');
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
        $permission=Permission::find($id);
        $permission->delete();
        return redirect()->route('backend.permission.index');
    }
}
