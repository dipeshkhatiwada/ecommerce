@extends('frontend.layouts.master')
@section('css')
    <link href="{{asset('frontend/css/shop.css')}}" type="text/css" rel="stylesheet" media="all">
    <link href="{{asset('frontend/css/checkout.css')}}" type="text/css" rel="stylesheet" media="all">

@endsection
@section('content')
    <!--checkout-->
    <section class="checkout_wthree py-sm-5 py-3">
        <div class="container">
            <div class="check_w3ls">
                <div class="d-sm-flex justify-content-between mb-4">
                    <h4>review your order
                    </h4>
                    <h4 class="mt-sm-0 mt-3">Your shopping cart contains:
                        <span>{{count($data['carts'])}} Products</span>
                    </h4>
                </div>
                <div class="checkout-right">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @if(count($data['carts']) > 0)
                        @foreach($data['carts'] as $cart)
                        <tr class="rem1">
                            <td class="invert">{{$i++}}</td>
                            <td class="invert-image">
                                <a href="single_product.html">
                                    <img src="{{asset('images/products/' . \App\Product::find($cart->id)->product_images()->first()->name)}}" alt=" " class="img-responsive">
                                </a>
                            </td>
                            <td class="invert">
                                <div class="quantity">
                                    <div class="quantity-select">

                                        <div class="entry value">
                                            <span>{{$cart->qty}}</span>
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td class="invert">{{$cart->name}}</td>

                            <td class="invert">Rs.{{$cart->price}}</td>
                            <td class="invert">
                                <div class="rem">
                                   <a href="{{route('frontend.deletecart',$cart->rowId)}}" class="close1"></a>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                            @else
                            <tr class="rem1">
                                 <td colspan="6" class="invert bg-danger">Empty Cart </td>
                            </tr>
                        @endif


                        </tbody>
                    </table>
                </div>
                <div class="row checkout-left mt-5">
                    <div class="col-md-4 checkout-left-basket">
                        <h4>Continue to basket</h4>
                        <ul>
                            @foreach($data['carts'] as $cart)
                            <li>{{$cart->name}}
                                <i>-</i>({{$cart->qty}})
                                <span>Rs. {{$cart->price * $cart->qty}} </span>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="col-md-8 address_form">
                        <h4>Billing Address</h4>
                        <form action="payment.html" method="post" class="creditly-card-form shopf-sear-headinfo_form">
                            <div class="creditly-wrapper wrapper">
                                <div class="information-wrapper">
                                    <div class="first-row form-group">
                                        <div class="controls">
                                            <label class="control-label">Full name: </label>
                                            <input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
                                        </div>
                                        <div class="card_number_grids">
                                            <div class="card_number_grid_left">
                                                <div class="controls">
                                                    <label class="control-label">Mobile number:</label>
                                                    <input class="form-control" type="text" placeholder="Mobile number">
                                                </div>
                                            </div>
                                            <div class="card_number_grid_right">
                                                <div class="controls">
                                                    <label class="control-label">Landmark: </label>
                                                    <input class="form-control" type="text" placeholder="Landmark">
                                                </div>
                                            </div>
                                            <div class="clear"> </div>
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Town/City: </label>
                                            <input class="form-control" type="text" placeholder="Town/City">
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Address type: </label>
                                            <select class="form-control option-fieldf">
                                                <option>Office</option>
                                                <option>Home</option>
                                                <option>Commercial</option>

                                            </select>
                                        </div>
                                    </div>
                                    <button class="submit check_out">place order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//checkout-->
    @endsection