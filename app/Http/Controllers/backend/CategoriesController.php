<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\category\CreateCategoryRequest;
use App\Http\Requests\backend\category\CreateSubcategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
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
        $data['page_title']='List Category';
        $data['categories']=Category::all();
//        dd($data);
        return view('backend.categories.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Create Category';
        return view('backend.categories.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
//        dd($request);
        if ($request->has('file')){
            $file = $request->file('file');
//            dd($file);
            $file_name=uniqid().'_'.$file->getClientOriginalName();
            $file->move('images/categories',$file_name);
            $request->request->add(['image'=> $file_name]);
        }
        $request->request->add(['created_by'=> Auth::user()->id]);
        $category=Category::create($request->all());
        if ($category){
            return redirect()->route('backend.category.index');
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
        $data['page_title']='Edit Category';
        $data['category']=Category::find($id);
//        dd($data);
        return view('backend.categories.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title']='Edit Category';
        $data['category']=Category::find($id);
//        dd($data);
        return view('backend.categories.edit',compact('data'));
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
        dd($id);
        if ($request->has('file')){
            $file = $request->file('file');
//            dd($file);
            $file_name=uniqid().'_'.$file->getClientOriginalName();
            $file->move('images/categories',$file_name);
            $request->request->add(['image'=> $file_name]);
        }
        $category= Category::find($id);
        $category->update($request->all());
//        dd($category);
        if ($category){
            return redirect()->route('backend.category.index');
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
        $category= Category::find($id);
        $category->delete();
        return redirect()->route('backend.category.index');

    }
}
