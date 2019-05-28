<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\backend\module\CreateModuleRequest;
use App\Module;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ModulesController extends Controller
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
        $data['page_title']="Listing Module";
        $data['modules']=Module::all();

        //yo garda ne mil6
//        $data['modules']=DB::table('modules')->get();

        return view('backend.modules.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']="Create Module";
        return view('backend.modules.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateModuleRequest $request)
    {


//        $request['created_by']=Auth::user()->id;
        $request->request->add(['created_by' => Auth::user()->id]);

        //storing data in module : Module::create($request->all())
        $status=Module::create($request->all());
//        dd($status);
        if($status){
            return redirect()->route('backend.module.index');
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
        $data['page_title']="View Module Details";
        $data['module']=Module::find($id);
        return view('backend/modules/show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title']="Editing Module";
        $data['module']=Module::find($id);
        return view('backend/modules/edit',compact('data'));
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
        $cdata=Module::find($id);
        $status=$cdata->update($request->all());
        if($status){
            return redirect()->route('backend.module.index');
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
        $module=Module::find($id);
        $module->delete();
        return redirect()->route('backend.module.index');
    }
}
