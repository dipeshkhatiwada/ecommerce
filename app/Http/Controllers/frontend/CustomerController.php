<?php

namespace App\Http\Controllers\frontend;

use App\Product;
use App\Subcategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:customer',['only' => 'index','edit']);
    }

    function index(){
        $data['page_title']='Home';
        return view('customer.dashboard',compact('data'));
    }

    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required',
            'password'      => 'required'
        ]);
        // store in the database
        $customers = new Customer;
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->password=bcrypt($request->password);
        $customers->save();
        return redirect()->route('customer.auth.login');
    }
}
