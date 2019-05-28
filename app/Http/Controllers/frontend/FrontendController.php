<?php

namespace App\Http\Controllers\frontend;

use App\Product;
use App\Subcategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class FrontendController extends Controller
{
    function  __construct()
    {
        $this->middleware('Locale');
    }

    function index(){
        $data['page_title']='Home';
        return view('frontend.index',compact('data'));
    }
    function subcategory($slug){

        $s = Subcategory::where('slug',$slug)->get();
        $data['subcategory'] = $s[0];
        $data['products'] = $data['subcategory']->products->where('status',1);
        $data['page_title']=$data['subcategory']->name;
        return view('frontend.subcategory',compact('data'));
    }

    function product($slug){
        $products = Product::where('slug',$slug)->get();
        $data['product'] = $products[0];
        $data['page_title']=$data['product']->name;
        return view('frontend.product',compact('data'));
    }

    function  addtocart(Request $request){
        Cart::add(['id' => $request->input('id'), 'name' => $request->input('name'), 'qty' => $request->input('quantity'), 'price' => $request->input('amount'), 'options' => $request->input('attribute')]);
        return back();
    }

    function  listcart(){
        $data['carts'] = Cart::content();
        $data['title'] = 'Cart List';
        return view('frontend.cart',compact('data'));

    }

    function  deletecart($rowId){
        Cart::remove($rowId);
        return back();

    }

    public function language($locale='en'){
        if (!in_array($locale, ['en', 'np', 'lv'])){
            $locale = 'en';
        }
        Session::put('locale', $locale);
        return redirect(url(URL::previous()));
    }

}
