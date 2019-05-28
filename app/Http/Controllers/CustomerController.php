<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:customer',['only' => 'index','edit']);
    }

    function index(){

        $data['page_title']='Home';
        return view('frontend.index',compact('data'));
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

    public function create()
    {
        return view('customer.auth.register');
    }

}
