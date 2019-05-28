<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\backend\tag\CreateTagRequest;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TagsController extends Controller
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
        $data['page_title']='List Tag';
        $data['tags']=Tag::all();
//        dd($data);
        return view('backend.tags.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Create Tag';
        return view('backend.tags.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
//        dd($request);
        
        $request->request->add(['created_by'=> Auth::user()->id]);
        $tag=Tag::create($request->all());
        if ($tag){
            $message = "Tag added with id no: ". $tag->id . " with name ". $tag->name . ' added by ' . Auth::user()->name ;
            Log::channel('crud')->info($message);
//            return redirect()->route('backend.tag.index');
        }else{
//            return back();
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
        $data['page_title']='Edit Tag';
        $data['tag']=Tag::find($id);
//        dd($data);
        return view('backend.tags.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title']='Edit Tag';
        $data['tag']=Tag::find($id);
//        dd($data);
        return view('backend.tags.edit',compact('data'));
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
        $tag= Tag::find($id);
        $tag->update($request->all());
//        dd($tag);
        if ($tag){
            return redirect()->route('backend.tag.index');
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
        $tag= Tag::find($id);
        $tag->delete();
        return redirect()->route('backend.tag.index');

    }
}
