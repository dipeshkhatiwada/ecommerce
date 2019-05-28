<header>
{{--    {{dd($categories)}}--}}
    <div class="container">
        <!-- top nav -->
        <nav class="top_nav d-flex pt-3 pb-1">
            <!-- logo -->
            <h1>
                <a class="navbar-brand" href="{{route('frontend.index')}}">ecommerce
                </a>
            </h1>
            <a href="{{url('language/np')}}" class="btn btn-success">NP</a>
            <a href="{{url('language/en')}}" class="btn btn-info">EN</a>

            <!-- //logo -->
            <div class="w3ls_right_nav ml-auto d-flex">
                <!-- search form -->
                <form class="nav-search form-inline my-0 form-control" action="" method="post">
                    <select class="form-control input-md" name="category">
                        <option value="all">@lang('message.search_placeholder')</option>
                        {{--{{dd($categories)}}--}}

                    @foreach($categories as $category)
                        <optgroup label="{{$category->name}}">
                            @foreach($category->subcategories->where('status',1) as $subcategory)
                            <option value="{{$subcategory->slug}}">{{$subcategory->name}}</option>
                                @endforeach
                        </optgroup>
                        @endforeach


                    </select>
                    <input class="btn btn-outline-secondary  ml-3 my-sm-0" type="submit" value="{{__('message.search_button')}}">
                </form>
                <!-- search form -->
                <div class="nav-icon d-flex">
                    @if(!isset(Auth::user('customer')->name))
                    <!-- sigin and sign up -->
                    <a class="text-dark login_btn align-self-center mx-3" href=" {{ route( 'customer.auth.login' ) }} " >
                        <i class="far fa-user"></i>
                    </a>
                    @else

                            <a class="btn btn-default btn-flat" href="{{ route('customer.auth.logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{Auth::user('customer')->name}}
                            </a>
                            <form id="logout-form" action="{{ route('customer.auth.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endif

                    <!-- sigin and sign up -->
                    <!-- shopping cart -->
                    <div class="cart-mainf">
                        <div class="hubcart hubcart2 cart cart box_1">
                            <a href="{{route('frontend.listcart')}}">
                                <sup>{{count(\Gloudemans\Shoppingcart\Facades\Cart::content())}}</sup>
                                <i class="fas fa-shopping-bag"></i>
                                </a>

                        </div>
                    </div>
                    <!-- //shopping cart ends here -->
                </div>
            </div>
        </nav>
        <!-- //top nav -->
        <!-- bottom nav -->
        <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link  active" href="{{route('frontend.index')}}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @foreach($categories as $category)

                      @php($subcategories = array_chunk($category->subcategories->toArray(),2))
{{--                    {{dd($subcategories)}}--}}
                    <li class="nav-item dropdown has-mega-menu" style="position:static;">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{$category->name}}</a>
                        <div class="dropdown-menu" style="width:100%">
                            <div class="px-0 container">
                                <div class="row">
                                    @foreach($subcategories as $subcategory)
                                    <div class="col-md-4">
                                        @foreach($subcategory as $sub)
                                            <a class="dropdown-item" href="{{route('frontend.subcategory',$sub['slug'])}}">{{$sub['name']}}</a>
                                        @endforeach
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- //bottom nav -->
    </div>
    <!-- //header container -->
</header>