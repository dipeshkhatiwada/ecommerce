<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Subcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\subcategory\CreateSubcategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title']='List Sub-category';
        $data['subcategories']=Subcategory::all();
//        dd($data);
        return view('backend.subcategories.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']="Creating Sub-category";
        $data['categories']=Category::pluck('name','id');
        $data['categories']->prepend('Select Category','');
//        $data['category'] = Subcategory::all();
        return view('backend.subcategories.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubcategoryRequest $request)
    {
        if ($request->has('file')){
            $file = $request->file('file');
            $file_name=uniqid().'_'.$file->getClientOriginalName();
            $file->move('images/subcategories',$file_name);
            $request->request->add(['image'=> $file_name]);
        }
//        dd($request);

        $request->request->add(['created_by'=> Auth::user()->id]);
        $subcategory=Subcategory::create($request->all());
        if ($subcategory){
            return redirect()->route('backend.subcategory.index');
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
        $data['page_title']='Edit Subcategory';
        $data['subcategory']=Subcategory::find($id);
//        dd($data);
        return view('backend.subcategories.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title']='Edit Sub-category';
        $data['subcategory']=Subcategory::find($id);
        $data['categories']=Category::pluck('name','id');

//        dd($data);
        return view('backend.subcategories.edit',compact('data'));
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
        if ($request->has('file')){
            $file = $request->file('file');
            $file_name=uniqid().'_'.$file->getClientOriginalName();
            $file->move('images/subcategories',$file_name);
            $request->request->add(['image'=> $file_name]);
        }
        $subcategory= Subcategory::find($id);

        $subcategory->update($request->all());
//        dd($subcategory);
        if ($subcategory){
            return redirect()->route('backend.subcategory.index');
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
        $subcategory= Subcategory::find($id);
        $subcategory->delete();
        return redirect()->route('backend.subcategory.index');
    }
    function getDataByCategory_id(Request $request){
//        dd($request);
        $opt = "<option value=''>Select Subcategory</option>";
        $category = Category::find($request->input('category_id'));

        foreach($category->subcategories as $subcategory){
            if ($request->input('sub_category_id') == $subcategory->id){
                $opt .= "<option value='$subcategory->id' selected>$subcategory->name</option>";
            }else{
                $opt .= "<option value='$subcategory->id'>$subcategory->name</option>";
            }

        }
        return $opt;
    }
}
