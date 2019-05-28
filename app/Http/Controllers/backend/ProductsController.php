<?php

namespace App\Http\Controllers\backend;

use App\ProductAttribute;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\product\CreateProductRequest;
use App\Product;
use App\ProductImage;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title']='List Product';
        $data['products']=Product::all();

        return view('backend.products.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Create Product';
        $data['categories']=Category::pluck('name','id');
        $data['categories']->prepend('Select Category','');

        $data['tags']=Tag::pluck('name','id');
//        $data['tags']->prepend('Select Tag','');
//        dd($data);
        return view('backend.products.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {


        $request->request->add(['created_by'=> Auth::user()->id]);
        $request->request->add(['stock'=> $request->input('quantity')]);
        $request->request->add(['view_count'=> 0]);
//        dd($request);
//            $att=[];

//        dd($att);
        $product=Product::create($request->all());
        if ($product){
            $product->tags()->sync($request->input('tag_id'));
            for($i=0;$i<count($request->input('attribute_name'));$i++){
                $att= [
                    'product_id' =>   $product->id,
                    'name' =>   $request->input('attribute_name')[$i],
                    'value' =>$request->input('attribute_value')[$i],
                    'created_by' =>Auth::user()->id,
                ];
                ProductAttribute::create($att);
            }

            if ($request->has('file')){
                foreach ($request->file('file') as $file){
                    $file_name=uniqid().'_'.$file->getClientOriginalName();
                    $file->move('images/products',$file_name);
                    $request->request->add(['image'=> $file_name]);
                    $image=[
                        'name' => $file_name,
                        'product_id' => $product->id,
                        'created_by' =>Auth::user()->id,
                    ];
                    ProductImage::create($image);

                }
            }
//            $product->attributes()->createMany(['name' =>$request->input('attribute_name'),'value' =>$request->input('attribute_value'),'created_by' =>Auth::user()->id]);
            return redirect()->route('backend.product.index');
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
        $data['page_title']='Show Product';
        $data['product']=Product::find($id);
        $data['images']=ProductImage::where('product_id',$data['product']->id)->get();
//        dd($data['image']);
        return view('backend.products.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['tags']=Tag::pluck('name','id');
        $data['page_title']='Edit Product';
        $data['product']=Product::find($id);
        $data['categories']=Category::pluck('name','id');

        $data['categories']->prepend('Select Category','');
//        dd($data);
        return view('backend.products.edit',compact('data'));
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
        $product= Product::find($id);
        $product->update($request->all());
        if ($product){
            $product->tags()->sync($request->input('tag_id'));
            if ($request->has('file')){
                foreach ($request->file('file') as $file){
                    $file_name=uniqid().'_'.$file->getClientOriginalName();
                    $file->move('images/products',$file_name);
                    $request->request->add(['image'=> $file_name]);
                    $image=[
                        'name' => $file_name,
                        'product_id' => $product->id,
                        'created_by' =>Auth::user()->id,
                    ];
                    ProductImage::create($image);
                }
            }

            for($i=0;$i<count($request->input('attribute_name'));$i++){
                if (isset($request->input('attribute_id')[$i]) && !empty($request->input('attribute_id')[$i])){
                   $product_attribute = ProductAttribute::find($request->input('attribute_id')[$i]);
                    $product_attribute->name =    $request->input('attribute_name')[$i];
                    $product_attribute->value =    $request->input('attribute_value')[$i];
                    $product_attribute->updated_by = Auth::user()->id;
                    $product_attribute->update();

                }else{
                    if (!empty($request->input('attribute_name')[$i])) {

                        $att = [
                            'product_id' => $id,
                            'name' => $request->input('attribute_name')[$i],
                            'value' => $request->input('attribute_value')[$i],
                            'created_by' => Auth::user()->id,
                        ];
                        ProductAttribute::create($att);
                    }
                }

            }
            return redirect()->route('backend.product.index');
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
        dd('dsvhjkl');
//        $product= Product::find($id);
//        $product->delete();
//        return redirect()->route('backend.product.index');
    }
    function destroy_image($id){
//        dd('ducj');
        $product_image= ProductImage::find($id);
        $product_image->delete();
        return back();
//        return redirect()->route('backend.product.index');
    }
}
