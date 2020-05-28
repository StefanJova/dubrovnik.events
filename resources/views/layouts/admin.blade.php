<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Events') }}</title>
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- icon css include -->
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome-all.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flaticon.css') }}">

    <!-- carousel css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.min.css') }}">

    <!-- others css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lightcase.css') }}">

    <!-- color switcher css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/colors/style-switcher.css') }}">
    <link id="color_theme" rel="stylesheet" type="text/css" href="{{ asset('css/colors/default.css') }}">

    <!-- custom css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">




    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
</head>
<body>
<!-- header-section - start
================================================== -->
<header id="header-section" class="header-section default-header-section auto-hide-header clearfix">

    <!-- header-top - start -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- register-login-group - start -->
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="register-login-group">
                        <ul>
                            @guest
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register', app()->getLocale()) }}">
                                        <i class="fas fa-user"></i> Register
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('login', app()->getLocale()) }}">
                                    <i class="fas fa-lock"></i> Login
                                </a>
                            </li>
                            @else
                                <li>
                                    <a href="{{ route('logout',app()->getLocale()) }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout',app()->getLocale()) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @endguest
                        </ul>
                    </div>
                </div>
                <!-- register-login-group - end -->
            </div>
        </div>
    </div>
    <!-- header-top - end -->
    <!-- header-bottom - start -->
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <!-- site-logo-wrapper - start -->
                <div class="col-lg-3">
                    <div class="site-logo-wrapper">
                        <a href="{{route('home',app()->getLocale())}}" class="logo">
                            <img src="{{ asset('images/0.site-logo.png') }}" alt="logo_not_found">
                        </a>
                    </div>
                </div>
                <!-- site-logo-wrapper - end -->

                <!-- mainmenu-wrapper - start -->
                <div class="col-lg-9">
                    <div class="mainmenu-wrapper">
                        <div class="row">

                            <!-- menu-item-list - start -->
                            <div class="col-lg-12">
                                <div class="menu-item-list ul-li clearfix">
                                    <ul>

                                        <li class="menu-item-has-children">
                                            <a href="{{route('reservation.index',[app()->getLocale()])}}">Reservations</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('admin.resNew',[app()->getLocale()])}}">New reservations</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="{{route('admin.hosts',[app()->getLocale()])}}">Hosts</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('host.create',[app()->getLocale()])}}">Create a new host</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="{{route('admin.events',[app()->getLocale()])}}">Events</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('event.create',[app()->getLocale()])}}">Create a new event</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="{{route('admin.landmarks',[app()->getLocale()])}}">Landmarks</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('landmark.create',[app()->getLocale()])}}">new landmark</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- menu-item-list - end -->
                        </div>
                    </div>
                </div>
                <!-- mainmenu-wrapper - end -->
            </div>
        </div>
    </div>
    <!-- header-bottom - end -->

</header>

<!-- altranative-header - start
================================================== -->
<div class="header-altranative">
    <div class="container">
        <div class="logo-area float-left">
            <a href="index-1.html">
                <img src="{{asset('images/1.site-logo.png')}}" alt="logo_not_found">
            </a>
        </div>

        <button type="button" id="sidebarCollapse" class="alt-menu-btn float-right">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- sidebar menu - start -->
    <div class="sidebar-menu-wrapper">
        <div id="sidebar" class="sidebar">
					<span id="sidebar-dismiss" class="sidebar-dismiss">
						<i class="fas fa-arrow-left"></i>
					</span>

            <div class="sidebar-header">
                <a href="#!">
                    <img src="{{asset('images/1.site-logo.png')}}" alt="logo_not_found">
                </a>
            </div>
            <!-- main-pages-links - start -->
            <div class="menu-link-list main-pages-links">
                <ul>
                    <li>
                        <a href="{{route('reservation.index',[app()->getLocale()])}}">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            Reservations
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('admin.resNew',[app()->getLocale()])}}">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            New reservations
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.hosts',[app()->getLocale()])}}">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            Hosts
                        </a>
                    </li>
                    <li>
                        <a href="{{route('host.create',[app()->getLocale()])}}">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            Create a new host
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.events',[app()->getLocale()])}}">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            Events
                        </a>
                    </li>
                    <li>
                        <a href="{{route('event.create',[app()->getLocale()])}}">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            Create a new event
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.landmarks',[app()->getLocale()])}}">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            Landmarks
                        </a>
                    </li>
                    <li>
                        <a href="{{route('landmark.create',[app()->getLocale()])}}">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            Create a new landmark
                        </a>
                    </li>
                </ul>
            </div>
            <!-- main-pages-links - end -->
            <div class="overlay"></div>
        </div>
    </div>
    <!-- sidebar menu - end -->
</div>
<!-- altranative-header - end
================================================== -->

<!-- header-section - end
================================================== -->
<main class="py-4" style="margin-top: 125px;">
    @yield('content')
</main>

<!-- default-footer-section - start
================================================== -->
<footer id="footer-section" class="footer-section default-footer-section clearfix">
    <!-- footer-top - start -->
    <div class="footer-top sec-ptb-100 clearfix">
        <div class="container">
            <div class="row">
                <!-- basic-info - start -->
                <div class="col-lg-12 col-md-12 col-md-12">
                    <div class="basic-info mb-50 clearfix">
                        <div class="row">
                            <!-- basic-info-item - start -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="basic-info-item">
											<span class="icon">
												<i class="fas fa-envelope"></i>
											</span>
                                    <div class="info-content">
                                        <p><a href="#!">contact@pantero.com</a></p>
                                        <h3><a href="#!">info@harmoni.com</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- basic-info-item - end -->

                            <!-- basic-info-item - start -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="basic-info-item">
											<span class="icon">
												<i class="fas fa-phone"></i>
											</span>
                                    <div class="info-content">
                                        <p><a href="#!">100 800 1234 5555</a></p>
                                        <h3><a href="#!">100 800 1234 5555</a></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- basic-info-item - end -->

                        </div>
                    </div>
                </div>
                <!-- basic-info - end -->

                <!-- about-wrapper - start -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="about-wrapper">

                        <!-- site-logo-wrapper - start -->
                        <div class="site-logo-wrapper mb-30">
                            <a href="{{route('home',app()->getLocale())}}" class="logo">
                                <img src="{{ asset('images/1.site-logo.png') }}" alt="logo_not_found">
                            </a>
                        </div>
                        <!-- site-logo-wrapper - end -->

                        <p class="mb-30">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.
                        </p>

                        <!-- social-links - start -->
                        <div class="social-links ul-li">
                            <h3 class="social-title">network</h3>
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/Dubrovnikevents-108056124187936/"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/dubrovnik.events/" target="_blank"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- social-links - end -->

                    </div>
                </div>
                <!-- about-wrapper - end -->

                <!-- usefullinks-wrapper - start -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="usefullinks-wrapper ul-li-block">
                        <h3 class="footer-item-title">
                            <strong>Events</strong>
                        </h3>
                        <ul>
                            {{--link6--}}
                            {!! Form::open(['method'=>'GET','route' =>['event.index' ,'locale'=>app()->getLocale()],'id'=>'fForm6']) !!}
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="event_category_id" value="9">
                            {!! Form::close() !!}
                            <li><a href="javascript:void(0)" id="footerBtn6">Night out</a></li>
                            <script>
                                var footerForm6 = document.getElementById("fForm6");
                                document.getElementById("footerBtn6").addEventListener("click", function () {
                                    footerForm6.submit();
                                });
                            </script>
                            {{--link7--}}
                            {!! Form::open(['method'=>'GET','route' =>['event.index' ,'locale'=>app()->getLocale()],'id'=>'fForm7']) !!}
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="event_category_id" value="8">
                            {!! Form::close() !!}
                            <li><a href="javascript:void(0)" id="footerBtn7">Music</a></li>
                            <script>
                                var footerForm7 = document.getElementById("fForm7");
                                document.getElementById("footerBtn7").addEventListener("click", function () {
                                    footerForm7.submit();
                                });
                            </script>
                            {{--link8--}}
                            {!! Form::open(['method'=>'GET','route' =>['event.index' ,'locale'=>app()->getLocale()],'id'=>'fForm8']) !!}
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="event_category_id" value="11">
                            {!! Form::close() !!}
                            <li><a href="javascript:void(0)" id="footerBtn8">Sightseeing tour</a></li>
                            <script>
                                var footerForm8 = document.getElementById("fForm8");
                                document.getElementById("footerBtn8").addEventListener("click", function () {
                                    footerForm8.submit();
                                });
                            </script>
                            {{--link9--}}
                            {!! Form::open(['method'=>'GET','route' =>['event.index' ,'locale'=>app()->getLocale()],'id'=>'fForm9']) !!}
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="event_category_id" value="7">
                            {!! Form::close() !!}
                            <li><a href="javascript:void(0)" id="footerBtn9">Food & Drink</a></li>
                            <script>
                                var footerForm9 = document.getElementById("fForm9");
                                document.getElementById("footerBtn9").addEventListener("click", function () {
                                    footerForm9.submit();
                                });
                            </script>
                            {{--link10--}}
                            {!! Form::open(['method'=>'GET','route' =>['event.index' ,'locale'=>app()->getLocale()],'id'=>'fForm10']) !!}
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="event_category_id" value="2">
                            {!! Form::close() !!}
                            <li><a href="javascript:void(0)" id="footerBtn10">Beach & Sea</a></li>
                            <script>
                                var footerForm10 = document.getElementById("fForm10");
                                document.getElementById("footerBtn10").addEventListener("click", function () {
                                    footerForm10.submit();
                                });
                            </script>
                        </ul>

                    </div>
                </div>
                <!-- usefullinks-wrapper - end -->
                <!-- usefullinks-wrapper - start -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="usefullinks-wrapper ul-li-block">
                        <h3 class="footer-item-title">
                            <strong>Places</strong>
                        </h3>
                        <ul>
                            {{--link1--}}
                            {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'fForm1']) !!}
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="host_category_id" value="5">
                            {!! Form::close() !!}
                            <li><a href="javascript:void(0)" id="footerBtn1">Hotels</a></li>
                            <script>
                                var footerForm1 = document.getElementById("fForm1");
                                document.getElementById("footerBtn1").addEventListener("click", function () {
                                    footerForm1.submit();
                                });
                            </script>
                            {{--link2--}}
                            {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'fForm2']) !!}
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="host_category_id" value="2">
                            {!! Form::close() !!}
                            <li><a href="javascript:void(0)" id="footerBtn2">Cafés</a></li>
                            <script>
                                var footerForm2 = document.getElementById("fForm2");
                                document.getElementById("footerBtn2").addEventListener("click", function () {
                                    footerForm2.submit();
                                });
                            </script>
                            {{--link3--}}
                            {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'fForm3']) !!}
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="host_category_id" value="3">
                            {!! Form::close() !!}
                            <li><a href="javascript:void(0)" id="footerBtn3">Clubs</a></li>
                            <script>
                                var footerForm3 = document.getElementById("fForm3");
                                document.getElementById("footerBtn3").addEventListener("click", function () {
                                    footerForm3.submit();
                                });
                            </script>
                            {{--link4--}}
                            {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'fForm4']) !!}
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="host_category_id" value="8">
                            {!! Form::close() !!}
                            <li><a href="javascript:void(0)" id="footerBtn4">Restaurants</a></li>
                            <script>
                                var footerForm4 = document.getElementById("fForm4");
                                document.getElementById("footerBtn4").addEventListener("click", function () {
                                    footerForm4.submit();
                                });
                            </script>
                            {{--link5--}}
                            {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'fForm5']) !!}
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="host_category_id" value="12">
                            {!! Form::close() !!}
                            <li><a href="javascript:void(0)" id="footerBtn5">Wine bars</a></li>
                            <script>
                                var footerForm5 = document.getElementById("fForm5");
                                document.getElementById("footerBtn5").addEventListener("click", function () {
                                    footerForm5.submit();
                                });
                            </script>
                        </ul>

                    </div>
                </div>
                <!-- usefullinks-wrapper - end -->

                <!-- instagram-wrapper - start -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="instagram-wrapper ul-li">
                        <h3 class="footer-item-title">
                            Our <strong>instagram</strong>
                        </h3>
                        <ul>
                            <li class="image-wrapper">
                                <img src="{{ asset('/images/foo1.jpg')}}" alt="instagram photo" class="fooInstaImg" style="max-width: unset!important;">
                                <a href="https://www.instagram.com/dubrovnik.events/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="image-wrapper">
                                <img src="{{ asset('/images/foo2.jpg')}}" alt="instagram photo" class="fooInstaImg" style="max-width: unset!important;">
                                <a href="https://www.instagram.com/dubrovnik.events/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="image-wrapper">
                                <img src="{{ asset('/images/foo3.jpg')}}" alt="instagram photo" class="fooInstaImg" style="max-width: unset!important;">
                                <a href="https://www.instagram.com/dubrovnik.events/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="image-wrapper">
                                <img src="{{ asset('/images/foo4.jpg')}}" alt="instagram photo" class="fooInstaImg" style="max-width: unset!important;">
                                <a href="https://www.instagram.com/dubrovnik.events/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                        <h4 class="followus-link">
                            Follow us on Instagram <a href="https://www.instagram.com/dubrovnik.events/" target="_blank">dubrovnik.events</a>
                        </h4>
                    </div>
                </div>
                <!-- instagram-wrapper - end -->

            </div>
        </div>
    </div>
    <!-- footer-top - end -->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">

                <!-- copyright-text - start -->
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="copyright-text">
                        <p class="m-0" style="color:#878787;">©2020 <a class="site-link">dubrovnik.events</a> all right reserved.</p>
                    </div>
                </div>
                <!-- copyright-text - end -->

                <!-- footer-menu - start -->
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="{{route('contact',app()->getLocale())}}">Contact us</a></li>
                            <li><a href="{{route('about',app()->getLocale())}}">About us</a></li>
                            <li><a href="{{route('privacy')}}">Cookies & Privacy policy</a></li>
                        </ul>
                    </div>
                </div>
                <!-- footer-menu - end -->

            </div>
        </div>
    </div>

</footer>

<!-- default-footer-section - end
================================================== -->
<!-- fraimwork - jquery include -->

<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- carousel jquery include -->
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<!-- calendar jquery include -->
<script src="{{ asset('js/atc.min.js') }}"></script>

<!-- others jquery include -->
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jarallax.min.js') }}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/lightcase.js') }}"></script>

<!-- gallery img loaded - jqury include -->
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>

<!-- multy count down - jqury include -->
<script src="{{ asset('js/jquery.countdown.js') }}"></script>

@yield('scripts')
<script src="https://kit.fontawesome.com/dddaeefbba.js" crossorigin="anonymous"></script>

<!-- custom jquery include -->
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
