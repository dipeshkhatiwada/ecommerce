@extends('frontend.layouts.master')

@section('content')
    <!-- banner -->
    <div class="banner-text">
        <div class="callbacks_container">
            <ul class="rslides" id="slider3">
                <li class="banner">
                    <div class="container">
                        <h3 class="agile_btxt">
                            <span>f</span>ashion
                            <span>h</span>ub
                        </h3>
                        <h4 class="w3_bbot">shop exclusive clothing</h4>
                        <div class="slider-info mt-sm-5">
                            <h4 class="bn_right">
                                <span>w</span>omen's
                                <span>f</span>ashion</h4>
                            <div class="bnr_clip position-relative">
                                <h4>get up to
                                    <span class="px-2">45% </span>
                                    OFF
                                </h4>

                                <p class="text-uppercase py-2">on special sale</p>
                                <a class="btn btn-primary mt-3 text-capitalize" href="shop.html" role="button">shop now</a>
                            </div>
                        </div>
                    </div>
                </li>
                {{--{{dd($categories)}}--}}
                @foreach($categories as $category)
                <li class="banner banner2">
                    <div class="container">
                        <h3 class="agile_btxt">
                            <span>f</span>ashion
                            <span>h</span>ub
                        </h3>
                        <h4 class="w3_bbot">shop exclusive clothing</h4>
                        <div class="slider-info mt-sm-5">
                            <h4 class="bn_right">
                                <span>m</span>en's
                                <span>f</span>ashion</h4>
                            <div class="bnr_clip position-relative">
                                <h4>get up to
                                    <span class="px-2">35% </span>
                                    OFF
                                </h4>

                                <p class="text-uppercase py-2">on special sale</p>
                                <a class="btn btn-primary mt-3 text-capitalize" href="shop.html" role="button">shop now</a>
                            </div>
                        </div>
                    </div>
                </li>
                    @endforeach
            </ul>
        </div>
    </div>
    <!-- //banner -->
    <!--services-->
    <div class="agileits-services" id="services">
        <div class="no-gutters agileits-services-row row">
            <div class="col-lg-3 col-sm-6 agileits-services-grids p-sm-5 p-3">
                <span class="fas fa-sync-alt p-4"></span>
                <h4 class="mt-2 mb-3">30 days replacement</h4>
            </div>
            <div class="col-lg-3 col-sm-6 agileits-services-grids p-sm-5 p-3">
                <span class="fas fa-gift p-4"></span>
                <h4 class="mt-2 mb-3">Gift Card</h4>
            </div>

            <div class="col-lg-3 col-sm-6 agileits-services-grids p-sm-5 p-3">
                <span class="fas fa-lock p-4"></span>
                <h4 class="mt-2 mb-3">secure payments</h4>
            </div>
            <div class="col-lg-3 col-sm-6 agileits-services-grids p-sm-5 p-3">
                <span class="fas fa-shipping-fast p-4"></span>
                <h4 class="mt-2 mb-3">free shipping</h4>
            </div>
        </div>
    </div>
    <!-- //services-->
    <!-- about -->
    {{--{{$categories}}--}}
    <div class="row no-gutters pb-5">

        <div class="col-sm-4">
            <div class="hovereffect">
                <img class="img-fluid" src="{{asset('frontend/images/a1.jpg')}}" alt="">
                <div class="overlay">
                    <h5>women's fashion</h5>
                    <a class="info" href="women.html">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="hovereffect">
                <img class="img-fluid" src="{{asset('frontend/images/a2.jpg')}}" alt="">
                <div class="overlay">
                    <h5>men's fashion</h5>
                    <a class="info" href="men.html">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="hovereffect">
                <img class="img-fluid" src="{{asset('frontend/images/a3.jpg')}}" alt="">
                <div class="overlay">
                    <h5>kid's fashion</h5>
                    <a class="info" href="girls.html">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- //about -->
    <!-- product tabs -->
    <section class="tabs_pro py-md-5 pt-sm-3 pb-5">
        <h5 class="head_agileinfo text-center text-capitalize pb-5">
            <span>s</span>mart Shopping</h5>
        <div class="tabs tabs-style-line pt-md-5">
            <nav class="container">
                <ul id="clothing-nav" class="nav nav-tabs tabs-style-line" role="tablist">
                   @php($i = 1) @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link @if($i == 1) active @endif" href="#{{$category->id}}" id="{{$category->slug}}" role="tab" data-toggle="tab" aria-controls="{{$category->id}}" aria-expanded="true">{{$category->name}}</a>
                    </li>
                                    @php($i++)
                    @endforeach
                    {{--@foreach($categories as $category)--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#men" role="tab" id="men-tab" data-toggle="tab" aria-controls="men">Men's Fashion--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--@endforeach--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#girl" role="tab" id="girl-tab" data-toggle="tab" aria-controls="girl">Girl's Fashion</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#boy" role="tab" id="boy-tab" data-toggle="tab" aria-controls="boy">Boy's Fashion</a>--}}
                    {{--</li>--}}
                </ul>
            </nav>
            <!-- Content Panel -->
            <div id="clothing-nav-content" class="tab-content py-sm-5">
                @php($i = 1) @foreach($categories as $category)
                <div role="tabpanel" class="tab-pane fade show @if($i == 1) active @endif" id="{{$category->id}}" aria-labelledby="{{$category->slug}}">
                    <div id="owl-demo" class="owl-carousel text-center">
                        @foreach($category->products as $product)

                        <div class="item">
                            <!-- card -->
                            <div class="card product-men p-3">
                                <div class="men-thumb-item">
                                    @if(isset($product->product_images->first()->name))
                                        <img src="{{asset('images/products/'. $product->product_images->first()->name )}}" alt="img" class="card-img-top">
                                    @endif
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            {{$product->name}}
                                            <a href="womens.html" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- card body -->
                                <div class="card-body  py-3 px-2">
                                    <h5 class="card-title text-capitalize">{{$product->name}}</h5>
                                    <div class="card-text d-flex justify-content-between">
                                        <p class="text-dark font-weight-bold">Rs. {{$product->price-$product->discount}}</p>
                                        <p class="line-through">Rs. {{$product->price}}</p>
                                    </div>
                                </div>
                                <!-- card footer -->
                                <div class="card-footer d-flex justify-content-end">
                                    <form action="#" method="post">
                                        <input type="hidden" name="cmd" value="_cart">
                                        <input type="hidden" name="add" value="1">
                                        <input type="hidden" name="hub_item" value="Self Design Women's Tunic">
                                        <input type="hidden" name="amount" value="28.00">
                                        <button type="submit" class="hub-cart phub-cart btn">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                        </button>
                                        <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                                    </form>
                                </div>
                            </div>
                            <!-- //card -->
                        </div>
                        @endforeach

                    </div>
                </div>

                    @php($i++)
                @endforeach

            </div>
        </div>
    </section>
    <!-- //product tabs -->
    <!-- insta posts -->
    <section class="py-lg-5">
        <!-- insta posts -->
        <h5 class="head_agileinfo text-center text-capitalize pb-5">
            <span>t</span>op Product</h5>
        @php($product = array_chunk($products->toArray(),6))
        @foreach($product as $pro)
            @if(count($pro)>5)
            <div class="gallery row no-gutters pt-lg-5">
                @foreach($pro as $pd)
                @php($pdetail =App\Product::find($pd['id']))
                @if(isset($pdetail->product_images->first()->name))
                        <div class="col-lg-2 col-sm-4 col-6 gallery-item">
                            <img src="{{asset('images/products/'. $pdetail->product_images->first()->name )}}" class="img-fluid" alt="" />
                            <div  >
                                <ul>
                                    <li class="gallery-item-comments  text-center">
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart">
                                            <input type="hidden" name="add" value="1">
                                            <input type="hidden" name="hub_item" value="{{$pd['name']}}">
{{--                                            <input type="hidden" name="amount" value="{{$pd['price']-$pd['dicsount']}}">--}}
                                            <button type="submit" class="hub-cart phub-cart btn ">
                                                <i class="fa fa-cart-plus" ></i> Add to Cart
                                                <i class="fa fa-cart-plus" ></i>
                                            </button>
                                            <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        @endif
        @endforeach
    </section>
    <!-- //insta posts -->
    @endsection