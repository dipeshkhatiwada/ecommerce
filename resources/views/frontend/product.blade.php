@extends('frontend.layouts.master')

@section('content')
    <!-- inner banner -->
    <div class="ibanner_w3 pt-sm-5 pt-3">
        <h4 class="head_agileinfo text-center text-capitalize text-center pt-5">
            <span>f</span>ashion
            <span>h</span>ub</h4>
    </div>
    <!-- //inner banner -->
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="men.html">Men's Clothing</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Single Product</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- Single -->
    <div class="innerf-pages section py-5">
        <div class="container">
            <div class="row my-sm-5">
                <div class="col-lg-4 single-right-left">
                    <div class="grid images_3_of_2">
                        <div class="flexslider1">
                            <ul class="slides">

                                @foreach($data['product']->product_images as $image)
                                <li data-thumb="{{asset('images/products/'. $image->name)}}">
                                    <div class="thumb-image">
                                        <img src="{{asset('images/products/'. $image->name)}}" data-imagezoom="true" alt=" " class="img-fluid"> </div>
                                </li>
                                @endforeach

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-lg-0 mt-5 single-right-left simpleCart_shelfItem">
                    <h3>{{$data['product']->name}}</h3>
                    </h3>
                    <div class="caption">

                        <ul class="rating-single">
                            <li>
                                <a href="#">
                                    <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"> </div>
                        <h6>
                            $35.00</h6>
                    </div>
                    <div class="desc_single">
                        <h5>Description</h5>
                        <p>Pellentesque quis orci sapien. Phasellus at pfero in nunc egestas tincidunt. In dictum arcu purus,
                            ultricies tincidunt urna vehicula at. Aenean iaculis urna nec pfero scelerisque, ac ullamcorper
                            neque porta.</p>
                    </div>
                    <div class="d-sm-flex justify-content-between">
                        <div class="occasional">
                            <h5 class="sp_title mb-3">Highlights</h5>
                            <ul class="single_specific">
                                <li>
                                    <span>Fabric: </span> Poly-Viscose</li>
                                <li>
                                    <span>Pattern :</span> Solid</li>
                                <li>
                                    <span>Type :</span> Single Breasted</li>
                                <li>
                                    <span>Fit :</span> Slim</li>
                            </ul>

                        </div>
                        <div class="color-quality mt-sm-0 mt-4">
                            <h5 class="sp_title mb-3">services</h5>
                            <ul class="single_serv">
                                <li>
                                    <a href="#">30 Day Return Policy</a>
                                </li>
                                <li class="mt-2">
                                    <a href="#">Cash on Delivery available</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="description">
                        <h5>Check delivery, payment options and charges at your location</h5>
                        <form action="#" method="post">
                            <input type="text" placeholder="Enter pincode" required />
                            <input type="submit" value="Check">
                        </form>
                    </div>
                    <div class="occasion-cart">
                        <div class="chr single-item single_page_b">
                            <form action="{{route('frontend.addtocart')}}" method="post">
                                @csrf
                                {{--<input type="hidden" name="cmd" value="_cart">--}}
                                <input type="hidden" name="id" value="{{$data['product']->id}}">
                              <div class="form-group">
                                  <label for="quantity">Quantity</label>
                                  <select name="quantity" class="form-control col-md-4">
                                      @for($i = 1;$i <= $data['product']->stock;$i++)
                                          <option value="{{$i}}">{{$i}}</option>
                                      @endfor
                                  </select>
                              </div>
                                @foreach($data['product']->product_attributes as $attribute)
                                    <div class="form-group">
                                        <label for="quantity">{{ucfirst($attribute->name)}}</label>
                                        @php
                                        $values = explode(',',$attribute->value)
                                        @endphp
                                        <select name="attribute[{{$attribute->name}}]" class="form-control col-md-4">
                                            @foreach($values as $value)
                                                <option value="{{$value}}">{{ucfirst($value)}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                @endforeach
                                <input type="hidden" name="name" value="{{$data['product']->name}}">
                                <input type="hidden" name="amount" value="{{$data['product']->price-$data['product']->discount}}">
                                <button type="submit" class="hub-cart btn">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </button>
                                <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /new_arrivals -->
    <div class="section singlep_btm pb-5">
        <div class="container">
            <div class="new_arrivals">
                <h4 class="rad-txt text-capitalize">you may also be interested in
                </h4>
                <!-- card group 2 -->
                <div class="card-group my-5">
                    <!-- card -->
                    <div class="col-lg-3 col-sm-6 p-0">
                        <div class="card product-men p-3">
                            <div class="men-thumb-item">
                                <img src="images/pm11.jpg" alt="img" class="card-img-top">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="mens.html" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-body  py-3 px-2">
                                <h5 class="card-title text-capitalize">Black Casual Men's Blazer</h5>
                                <div class="card-text d-flex justify-content-between">
                                    <p class="text-dark font-weight-bold">$20.00</p>
                                    <p class="line-through">$25.00</p>
                                </div>
                            </div>
                            <!-- card footer -->
                            <div class="card-footer d-flex justify-content-end">
                                <form action="#" method="post">
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="hub_item" value="Black Casual Men's Blazer">
                                    <input type="hidden" name="amount" value="20.00">
                                    <button type="submit" class="hub-cart phub-cart btn">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </button>
                                    <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- //card -->
                    <!-- card -->
                    <div class="col-lg-3 col-sm-6 p-0">
                        <div class="card product-men p-3">
                            <div class="men-thumb-item">
                                <img src="images/pm12.jpg" alt="img" class="card-img-top">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="mens.html" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-body  py-3 px-2">
                                <h5 class="card-title text-capitalize">Blue Wedding Formal Blazer</h5>
                                <div class="card-text d-flex justify-content-between">
                                    <p class="text-dark font-weight-bold">$35.00</p>
                                    <p class="line-through">$44.99</p>
                                </div>
                            </div>
                            <!-- card footer -->
                            <div class="card-footer d-flex justify-content-end">
                                <form action="#" method="post">
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="hub_item" value="Blue Wedding Formal Blazer">
                                    <input type="hidden" name="amount" value="35.00">
                                    <button type="submit" class="hub-cart phub-cart btn">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </button>
                                    <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- //card -->
                    <!-- card -->
                    <div class="col-lg-3 col-sm-6 p-0">
                        <div class="card product-men p-3 out_w3">
                            <div class="men-thumb-item position-relative">
                                <img src="images/pm7.jpg" alt="img" class="card-img-top">
                                <span class="px-2 position-absolute">out of stock</span>
                            </div>
                            <!-- card body -->
                            <div class="card-body  py-3 px-2">
                                <h5 class="card-title text-capitalize">grey Wedding Formal Blazer</h5>
                                <div class="card-text d-flex justify-content-between">
                                    <p class="text-dark font-weight-bold">$25.00</p>
                                    <p class="line-through">$28.00</p>
                                </div>
                            </div>
                            <!-- card footer -->
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="hub-cart phub-cart btn">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- //card -->
                    <!-- card -->
                    <div class="col-lg-3 col-sm-6 p-0">
                        <div class="card product-men p-3">
                            <div class="men-thumb-item">
                                <img src="images/pm13.jpg" alt="img" class="card-img-top">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="mens.html" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-body  py-3 px-2">
                                <h5 class="card-title text-capitalize">Blue Casual Men's Blazer</h5>
                                <div class="card-text d-flex justify-content-between">
                                    <p class="text-dark font-weight-bold">$29.99</p>
                                    <p class="line-through">$34.99</p>
                                </div>
                            </div>
                            <!-- card footer -->
                            <div class="card-footer d-flex justify-content-end">
                                <form action="#" method="post">
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="hub_item" value="Casual Men's Blazer">
                                    <input type="hidden" name="amount" value="29.00">
                                    <button type="submit" class="hub-cart phub-cart btn">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </button>
                                    <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- //card -->
                </div>
                <!-- //card group -->
                <!--//new_arrivals-->
            </div>
        </div>
    </div>
    <!--// Single -->
    @endsection

@section('js')
    <!-- FlexSlider -->
    <script src="{{asset('frontend/js/jquery.flexslider.js')}}"></script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function () {
            $('.flexslider1').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!-- //FlexSlider-->
    <!-- zoom -->
    <script src="{{asset('frontend/js/imagezoom.js')}}"></script>
    <!-- zoom-->
    @endsection

@section('css')

    <link href="{{asset('frontend/css/flexslider.css')}}" type="text/css" rel="stylesheet" media="all">

@endsection