<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Ecommerce @if(isset($data['page_title']))| {{$data['page_title']}} @endif </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Fashion Hub Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    {{--<script>--}}
        {{--addEventListener("load", function () {--}}
            {{--setTimeout(hideURLbar, 0);--}}
        {{--}, false);--}}

        {{--function hideURLbar() {--}}
            {{--window.scrollTo(0, 1);--}}
        {{--}--}}
    {{--</script>--}}
    <!-- Custom Theme files -->
    <link href="{{asset('frontend/css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all">
    <!-- shop css -->
    <link href="{{asset('frontend/css/shop.css')}}" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <!-- Owl-Carousel-CSS -->
    <link href="{{asset('frontend/css/style.css')}}" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="{{asset('frontend/css/fontawesome-all.min.css')}}" rel="stylesheet">
    @yield('css')
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    {{--<link href="{{asset('frontend///fonts.googleapis.com/css?family=Elsie+Swash+Caps:400,900" rel="stylesheet">--}}
    {{--<link href="{{asset('frontend///fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">--}}
    <!-- //online-fonts -->
</head>

<body>
<!-- header -->
@include('frontend.includes.header')
<!-- //header -->
@yield('content')
<!-- footer -->
@include('frontend.includes.footer')
<!-- //footer -->
<!-- sign up Modal -->
<div class="modal fade" id="myModal_btn" tabindex="-1" role="dialog" aria-labelledby="myModal_btn" aria-hidden="true">
    <div class="agilemodal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body pt-3 pb-5 px-sm-5">
                <div class="row">
                    <div class="col-md-6 mx-auto align-self-center">
                        <img src="images/p3.png" class="img-fluid" alt="login_image" />
                    </div>
                    <div class="col-md-6">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="recipient-name1" class="col-form-label">Your Name</label>
                                <input type="text" class="form-control" placeholder=" " name="Name" id="recipient-name1" required="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-email" class="col-form-label">Email</label>
                                <input type="email" class="form-control" placeholder=" " name="Email" id="recipient-email" required="">
                            </div>
                            <div class="form-group">
                                <label for="password1" class="col-form-label">Password</label>
                                <input type="password" class="form-control" placeholder=" " name="Password" id="password1" required="">
                            </div>
                            <div class="form-group">
                                <label for="password2" class="col-form-label">Confirm Password</label>
                                <input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2" required="">
                            </div>
                            <div class="sub-w3l">
                                <div class="sub-agile">
                                    <input type="checkbox" id="brand2" value="">
                                    <label for="brand2" class="mb-3">
                                        <span></span>I Accept to the Terms & Conditions</label>
                                </div>
                            </div>
                            <div class="right-w3l">
                                <input type="submit" class="form-control" value="Register">
                            </div>
                        </form>
                        <p class="text-center mt-3">Already a member?
                            <a href="#" data-toggle="modal" data-target="#exampleModal1" class="text-dark login_btn">
                                Login Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //signup modal -->
<!-- signin Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1" aria-hidden="true">
    <div class="agilemodal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body  pt-3 pb-5 px-sm-5">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <img src="images/p3.png" class="img-fluid" alt="login_image" />
                    </div>
                    <div class="col-md-6">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Your Name</label>
                                <input type="text" class="form-control" placeholder=" " name="Name" id="recipient-name" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input type="password" class="form-control" placeholder=" " name="Password" required="">
                            </div>
                            <div class="right-w3l">
                                <input type="submit" class="form-control" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- signin Modal -->
<!-- js -->
<script src="{{asset('frontend/js/jquery-2.2.3.min.js')}}"></script>
<!-- //js -->
<!-- script for show signin and signup modal -->
<script>
    $(document).ready(function () {
//        $("#myModal_btn").modal();
    });
</script>
<!-- //script for show signin and signup modal -->
<!-- smooth dropdown -->
<script>
    $(document).ready(function () {
        $('ul li.dropdown').hover(function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
        }, function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
        });
    });
</script>
<!-- //smooth dropdown -->
<!-- script for password match -->
<script>
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
</script>
<!-- script for password match -->
<!-- Banner Responsiveslides -->
<script src="{{asset('frontend/js/responsiveslides.min.js')}}"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: false,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!-- // Banner Responsiveslides -->
<!-- Product slider Owl-Carousel-JavaScript -->
<script src="{{asset('frontend/js/owl.carousel.js')}}"></script>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 4,
        loop: false,
        margin: 10,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        responsive: {
            320: {
                items: 1,
            },
            568: {
                items: 2,
            },
            991: {
                items: 3,
            },
            1050: {
                items: 4
            }
        }
    });
</script>
<!-- //Product slider Owl-Carousel-JavaScript -->
<!-- cart-js -->
<script src="{{asset('frontend/js/minicart.js')}}">
</script>
<script>
    hub.render();

    hub.cart.on('new_checkout', function (evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {}
        }
    });
</script>
<!-- //cart-js -->
<!-- price range (top products) -->
<script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
<script>
    //<![CDATA[
    $(window).load(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 9000,
            values: [50, 6000],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

    }); //]]>
</script>
<!-- //price range (top products) -->
<!-- start-smooth-scrolling -->
<script src="{{asset('frontend/js/bootstrap.js')}}"></script>
<!-- start-smoth-scrolling -->
<script src="{{asset('frontend/js/move-top.js')}}"></script>
<script src="{{asset('frontend/js/easing.js')}}"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->


<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<script src="{{asset('frontend/js/SmoothScroll.min.js')}}"></script>
<!-- //smooth-scrolling-of-move-up -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('frontend/js/bootstrap.js')}}"></script>

@yield('js')
</body>

</html>