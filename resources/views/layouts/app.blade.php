<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166768132-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-166768132-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('description')
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

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
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/colors/style-switcher.css') }}">--}}
    <link id="color_theme" rel="stylesheet" type="text/css" href="{{ asset('css/colors/default.css') }}">

    <!-- custom css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    {{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">--}}


    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
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
                <!-- basic-contact - start -->
                <div class="col-lg-6">
                    <div class="basic-contact">
                        <ul>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fas fa-envelope"></i>
                                    info@<!--$$-->dubrovnik.events

                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <i class="fas fa-phone"></i>
                                    100-2222-9999
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- basic-contact - end -->

                <!-- register-login-group - start -->
                <div class="col-lg-6">
                    <div class="register-login-group">
                        <ul class="basic-contact">
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon
                                @switch(app()->getLocale())
                                    @case('en')
                                        {{'flag-icon-gb'}}
                                    @break
                                    @case('hr')
                                        {{'flag-icon-hr'}}
                                    @break
                                    @default
                                        {{'flag-icon-gb'}}
                                    @endswitch"> </span>{{' '. strtoupper(app()->getLocale()) }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown09" style="background-color: #ff9f24">
                                    @php
                                    $segments=\Illuminate\Support\Facades\Request::segments();
                                    @endphp
                                    @foreach(config('app.available_locales') as $locale)
                                        @php
                                        $segments[0]=$locale
                                        @endphp
                                        <a class="nav-link langDrop" href="/@foreach($segments as $segment){{$segment.'/'}}@endforeach">
                                        <span class="flag-icon flag-icon-@if($locale=='en'){{'gb'}}@else{{'hr'}} @endif"> </span>  {{ strtoupper($locale) }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
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
                                        {{--menu main btn--}}
                                        <li class="menu-item-has-children">
                                            <a href="#!">{{__('all.mainHostCat1')}}</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item-has-children active">
                                                    <a href="#!">{{__('all.menuRest')}}</a>
                                                    <ul class="sub-menu">
                                                        {{--menu item--}}
                                                        {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF26']) !!}
                                                        <input type="hidden" name="name" value="">
                                                        <input type="hidden" name="host_category_id" value="26">
                                                        {!! Form::close() !!}
                                                        <li><a href="javascript:void(0)" id="menuBtn26">{{__('all.hostCat-26')}}</a></li>
                                                        <script>
                                                            var menuF26 = document.getElementById("menuF26");
                                                            document.getElementById("menuBtn26").addEventListener("click", function () {
                                                                menuF26.submit();
                                                            });
                                                        </script>
                                                        {{--menu item--}}
                                                        {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF8']) !!}
                                                        <input type="hidden" name="name" value="">
                                                        <input type="hidden" name="host_category_id" value="8">
                                                        {!! Form::close() !!}
                                                        <li><a href="javascript:void(0)" id="menuBtn8">{{__('all.hostCat-8')}}</a></li>
                                                        <script>
                                                            var menuF8 = document.getElementById("menuF8");
                                                            document.getElementById("menuBtn8").addEventListener("click", function () {
                                                                menuF8.submit();
                                                            });
                                                        </script>
                                                        {{--menu item--}}
                                                        {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF27']) !!}
                                                        <input type="hidden" name="name" value="">
                                                        <input type="hidden" name="host_category_id" value="27">
                                                        {!! Form::close() !!}
                                                        <li><a href="javascript:void(0)" id="menuBtn27">{{__('all.hostCat-27')}}</a></li>
                                                        <script>
                                                            var menuF27 = document.getElementById("menuF27");
                                                            document.getElementById("menuBtn27").addEventListener("click", function () {
                                                                menuF27.submit();
                                                            });
                                                        </script>
                                                        {{--menu item--}}
                                                        {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF28']) !!}
                                                        <input type="hidden" name="name" value="">
                                                        <input type="hidden" name="host_category_id" value="28">
                                                        {!! Form::close() !!}
                                                        <li><a href="javascript:void(0)" id="menuBtn28">{{__('all.hostCat-28')}}</a></li>
                                                        <script>
                                                            var menuF28 = document.getElementById("menuF28");
                                                            document.getElementById("menuBtn28").addEventListener("click", function () {
                                                                menuF28.submit();
                                                            });
                                                        </script>
                                                        {{--menu item--}}
                                                        {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF29']) !!}
                                                        <input type="hidden" name="name" value="">
                                                        <input type="hidden" name="host_category_id" value="29">
                                                        {!! Form::close() !!}
                                                        <li><a href="javascript:void(0)" id="menuBtn29">{{__('all.hostCat-29')}}</a></li>
                                                        <script>
                                                            var menuF29 = document.getElementById("menuF29");
                                                            document.getElementById("menuBtn29").addEventListener("click", function () {
                                                                menuF29.submit();
                                                            });
                                                        </script>
                                                        {{--menu item--}}
                                                        {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF30']) !!}
                                                        <input type="hidden" name="name" value="">
                                                        <input type="hidden" name="host_category_id" value="30">
                                                        {!! Form::close() !!}
                                                        <li><a href="javascript:void(0)" id="menuBtn30">{{__('all.hostCat-30')}}</a></li>
                                                        <script>
                                                            var menuF30 = document.getElementById("menuF30");
                                                            document.getElementById("menuBtn30").addEventListener("click", function () {
                                                                menuF30.submit();
                                                            });
                                                        </script>
                                                    </ul>
                                                </li>


                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF24']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="24">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn24">{{__('all.hostCat-24')}}</a></li>
                                                <script>
                                                    var menuF24 = document.getElementById("menuF24");
                                                    document.getElementById("menuBtn24").addEventListener("click", function () {
                                                        menuF24.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF25']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="25">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn25">{{__('all.hostCat-25')}}</a></li>
                                                <script>
                                                    var menuF25 = document.getElementById("menuF25");
                                                    document.getElementById("menuBtn25").addEventListener("click", function () {
                                                        menuF25.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF23']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="23">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn23">{{__('all.hostCat-23')}}</a></li>
                                                <script>
                                                    var menuF23 = document.getElementById("menuF23");
                                                    document.getElementById("menuBtn23").addEventListener("click", function () {
                                                        menuF23.submit();
                                                    });
                                                </script>

                                            </ul>
                                        </li>
                                        {{--menu main btn--}}
                                        <li class="menu-item-has-children">
                                            <a href="#!">{{__('all.mainHostCat4')}}</a>
                                            <ul class="sub-menu">
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF1']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="1">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn1">{{__('all.hostCat-1')}}</a></li>
                                                <script>
                                                    var menuF1 = document.getElementById("menuF1");
                                                    document.getElementById("menuBtn1").addEventListener("click", function () {
                                                        menuF1.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF2']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="2">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn2">{{__('all.hostCat-2')}}</a></li>
                                                <script>
                                                    var menuF2 = document.getElementById("menuF2");
                                                    document.getElementById("menuBtn2").addEventListener("click", function () {
                                                        menuF2.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF3']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="3">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn3">{{__('all.hostCat-3')}}</a></li>
                                                <script>
                                                    var menuF3 = document.getElementById("menuF3");
                                                    document.getElementById("menuBtn3").addEventListener("click", function () {
                                                        menuF3.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF7']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="7">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn7">{{__('all.hostCat-7')}}</a></li>
                                                <script>
                                                    var menuF7 = document.getElementById("menuF7");
                                                    document.getElementById("menuBtn7").addEventListener("click", function () {
                                                        menuF7.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF12']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="12">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn12">{{__('all.hostCat-12')}}</a></li>
                                                <script>
                                                    var menuF12 = document.getElementById("menuF12");
                                                    document.getElementById("menuBtn12").addEventListener("click", function () {
                                                        menuF12.submit();
                                                    });
                                                </script>

                                            </ul>
                                        </li>
                                        {{--menu main btn--}}
                                        <li class="menu-item-has-children">
                                            <a href="#!">{{__('all.mainHostCat3')}}</a>
                                            <ul class="sub-menu">
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF18']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="18">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn18">{{__('all.hostCat-18')}}</a></li>
                                                <script>
                                                    var menuF18 = document.getElementById("menuF18");
                                                    document.getElementById("menuBtn18").addEventListener("click", function () {
                                                        menuF18.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF19']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="19">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn19">{{__('all.hostCat-19')}}</a></li>
                                                <script>
                                                    var menuF19 = document.getElementById("menuF19");
                                                    document.getElementById("menuBtn19").addEventListener("click", function () {
                                                        menuF19.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF20']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="20">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn20">{{__('all.hostCat-20')}}</a></li>
                                                <script>
                                                    var menuF20 = document.getElementById("menuF20");
                                                    document.getElementById("menuBtn20").addEventListener("click", function () {
                                                        menuF20.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF5']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="5">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn5">{{__('all.hostCat-5')}}</a></li>
                                                <script>
                                                    var menuF5 = document.getElementById("menuF5");
                                                    document.getElementById("menuBtn5").addEventListener("click", function () {
                                                        menuF5.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF22']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="22">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn22">{{__('all.hostCat-22')}}</a></li>
                                                <script>
                                                    var menuF22 = document.getElementById("menuF22");
                                                    document.getElementById("menuBtn22").addEventListener("click", function () {
                                                        menuF22.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF21']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="21">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn21">{{__('all.hostCat-21')}}</a></li>
                                                <script>
                                                    var menuF21 = document.getElementById("menuF21");
                                                    document.getElementById("menuBtn21").addEventListener("click", function () {
                                                        menuF21.submit();
                                                    });
                                                </script>

                                            </ul>
                                        </li>
                                        {{--menu main btn--}}
                                        <li class="menu-item-has-children">
                                            <a href="#!">{{__('all.mainHostCat2')}}</a>
                                            <ul class="sub-menu">
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF4']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="4">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn4">{{__('all.hostCat-4')}}</a></li>
                                                <script>
                                                    var menuF4 = document.getElementById("menuF4");
                                                    document.getElementById("menuBtn4").addEventListener("click", function () {
                                                        menuF4.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF13']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="13">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn13">{{__('all.hostCat-13')}}</a></li>
                                                <script>
                                                    var menuF13 = document.getElementById("menuF13");
                                                    document.getElementById("menuBtn13").addEventListener("click", function () {
                                                        menuF13.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF14']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="14">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn14">{{__('all.hostCat-14')}}</a></li>
                                                <script>
                                                    var menuF14 = document.getElementById("menuF14");
                                                    document.getElementById("menuBtn14").addEventListener("click", function () {
                                                        menuF14.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF15']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="15">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn15">{{__('all.hostCat-15')}}</a></li>
                                                <script>
                                                    var menuF15 = document.getElementById("menuF15");
                                                    document.getElementById("menuBtn15").addEventListener("click", function () {
                                                        menuF15.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF16']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="16">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn16">{{__('all.hostCat-16')}}</a></li>
                                                <script>
                                                    var menuF16 = document.getElementById("menuF16");
                                                    document.getElementById("menuBtn16").addEventListener("click", function () {
                                                        menuF16.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF17']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="17">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn17">{{__('all.hostCat-17')}}</a></li>
                                                <script>
                                                    var menuF17 = document.getElementById("menuF17");
                                                    document.getElementById("menuBtn17").addEventListener("click", function () {
                                                        menuF17.submit();
                                                    });
                                                </script>

                                            </ul>
                                        </li>
                                        {{--menu main btn--}}
                                        <li class="menu-item-has-children">
                                            <a href="#!">{{__('all.mainHostCat5')}}</a>
                                            <ul class="sub-menu">
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF6']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="6">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn6">{{__('all.hostCat-6')}}</a></li>
                                                <script>
                                                    var menuF6 = document.getElementById("menuF6");
                                                    document.getElementById("menuBtn6").addEventListener("click", function () {
                                                        menuF6.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF10']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="10">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn10">{{__('all.hostCat-10')}}</a></li>
                                                <script>
                                                    var menuF10 = document.getElementById("menuF10");
                                                    document.getElementById("menuBtn10").addEventListener("click", function () {
                                                        menuF10.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF9']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="9">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn9">{{__('all.hostCat-9')}}</a></li>
                                                <script>
                                                    var menuF9 = document.getElementById("menuF9");
                                                    document.getElementById("menuBtn9").addEventListener("click", function () {
                                                        menuF9.submit();
                                                    });
                                                </script>
                                                {{--menu item--}}
                                                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'menuF11']) !!}
                                                <input type="hidden" name="name" value="">
                                                <input type="hidden" name="host_category_id" value="11">
                                                {!! Form::close() !!}
                                                <li><a href="javascript:void(0)" id="menuBtn11">{{__('all.hostCat-11')}}</a></li>
                                                <script>
                                                    var menuF11 = document.getElementById("menuF11");
                                                    document.getElementById("menuBtn11").addEventListener("click", function () {
                                                        menuF11.submit();
                                                    });
                                                </script>
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
<!-- header-section - end
================================================== -->
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
            <!-- other-pages-links - start -->
            <div class="menu-link-list other-pages-links">
                <h2 class="menu-title">{{__('all.mainHostCat1')}}</h2>
                <ul>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn26">
                            <span class="icon"><i class="fas fa-utensils"></i></span>
                            {{__('all.hostCat-26')}}
                        </a>
                    </li>
                    <script>
                        var menuF26 = document.getElementById("menuF26");
                        document.getElementById("menuSmallBtn26").addEventListener("click", function () {
                            menuF26.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn8">
                            <span class="icon"><i class="fas fa-fish"></i></span>
                            {{__('all.hostCat-8')}}
                        </a>
                    </li>
                    <script>
                        var menuF8 = document.getElementById("menuF8");
                        document.getElementById("menuSmallBtn8").addEventListener("click", function () {
                            menuF8.submit();
                        });
                    </script>

                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn27">
                            <span class="icon"><i class="fas fa-fish"></i></span>
                            {{__('all.hostCat-27')}}
                        </a>
                    </li>
                    <script>
                        var menuF27 = document.getElementById("menuF27");
                        document.getElementById("menuSmallBtn27").addEventListener("click", function () {
                            menuF27.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn28">
                            <span class="icon"><i class="fas fa-drumstick-bite"></i></span>
                            {{__('all.hostCat-28')}}
                        </a>
                    </li>
                    <script>
                        var menuF28 = document.getElementById("menuF28");
                        document.getElementById("menuSmallBtn28").addEventListener("click", function () {
                            menuF28.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn29">
                            <span class="icon"><i class="fas fa-fish"></i></span>
                            {{__('all.hostCat-29')}}
                        </a>
                    </li>
                    <script>
                        var menuF29 = document.getElementById("menuF29");
                        document.getElementById("menuSmallBtn29").addEventListener("click", function () {
                            menuF29.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn30">
                            <span class="icon"><i class="fas fa-fish"></i></span>
                            {{__('all.hostCat-30')}}
                        </a>
                    </li>
                    <script>
                        var menuF30 = document.getElementById("menuF30");
                        document.getElementById("menuSmallBtn30").addEventListener("click", function () {
                            menuF30.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn24">
                            <span class="icon"><i class="fas fa-hamburger"></i></span>
                            {{__('all.hostCat-24')}}
                        </a>
                    </li>
                    <script>
                        var menuF24 = document.getElementById("menuF24");
                        document.getElementById("menuSmallBtn24").addEventListener("click", function () {
                            menuF24.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn25">
                            <span class="icon"><i class="fas fa-birthday-cake"></i></span>
                            {{__('all.hostCat-25')}}
                        </a>
                    </li>
                    <script>
                        var menuF25 = document.getElementById("menuF25");
                        document.getElementById("menuSmallBtn25").addEventListener("click", function () {
                            menuF25.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn23">
                            <span class="icon"><i class="fas fa-bread-slice"></i></span>
                            {{__('all.hostCat-23')}}
                        </a>
                    </li>
                    <script>
                        var menuF23 = document.getElementById("menuF23");
                        document.getElementById("menuSmallBtn23").addEventListener("click", function () {
                            menuF23.submit();
                        });
                    </script>
                </ul>
            </div>
            <div class="menu-link-list other-pages-links">
                <h2 class="menu-title">{{__('all.mainHostCat4')}}</h2>
                <ul>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn1">
                            <span class="icon"><i class="fas fa-beer"></i></span>
                            {{__('all.hostCat-1')}}
                        </a>
                    </li>
                    <script>
                        var menuF1 = document.getElementById("menuF1");
                        document.getElementById("menuSmallBtn1").addEventListener("click", function () {
                            menuF1.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn2">
                            <span class="icon"><i class="fas fa-coffee"></i></span>
                            {{__('all.hostCat-2')}}
                        </a>
                    </li>
                    <script>
                        var menuF2 = document.getElementById("menuF2");
                        document.getElementById("menuSmallBtn2").addEventListener("click", function () {
                            menuF2.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn3">
                            <span class="icon"><i class="fas fa-music"></i></span>
                            {{__('all.hostCat-3')}}
                        </a>
                    </li>
                    <script>
                        var menuF3 = document.getElementById("menuF3");
                        document.getElementById("menuSmallBtn3").addEventListener("click", function () {
                            menuF3.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn7">
                            <span class="icon"><i class="fas fa-beer"></i></span>
                            {{__('all.hostCat-7')}}
                        </a>
                    </li>
                    <script>
                        var menuF7 = document.getElementById("menuF7");
                        document.getElementById("menuSmallBtn7").addEventListener("click", function () {
                            menuF7.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn12">
                            <span class="icon"><i class="fas fa-wine-glass"></i></span>
                            {{__('all.hostCat-12')}}
                        </a>
                    </li>
                    <script>
                        var menuF12 = document.getElementById("menuF12");
                        document.getElementById("menuSmallBtn12").addEventListener("click", function () {
                            menuF12.submit();
                        });
                    </script>
                </ul>
            </div>
            <div class="menu-link-list other-pages-links">
                <h2 class="menu-title">{{__('all.mainHostCat3')}}</h2>
                <ul>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn18">
                            <span class="icon"><i class="fas fa-hotel"></i></span>
                            {{__('all.hostCat-18')}}
                        </a>
                    </li>
                    <script>
                        var menuF18 = document.getElementById("menuF18");
                        document.getElementById("menuSmallBtn18").addEventListener("click", function () {
                            menuF18.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn19">
                            <span class="icon"><i class="fas fa-hotel"></i></span>
                            {{__('all.hostCat-19')}}
                        </a>
                    </li>
                    <script>
                        var menuF19 = document.getElementById("menuF19");
                        document.getElementById("menuSmallBtn19").addEventListener("click", function () {
                            menuF19.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn20">
                            <span class="icon"><i class="fas fa-hotel"></i></span>
                            {{__('all.hostCat-20')}}
                        </a>
                    </li>
                    <script>
                        var menuF20 = document.getElementById("menuF20");
                        document.getElementById("menuSmallBtn20").addEventListener("click", function () {
                            menuF20.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn22">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            {{__('all.hostCat-22')}}
                        </a>
                    </li>
                    <script>
                        var menuF22 = document.getElementById("menuF22");
                        document.getElementById("menuSmallBtn22").addEventListener("click", function () {
                            menuF22.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn21">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            {{__('all.hostCat-21')}}
                        </a>
                    </li>
                    <script>
                        var menuF21 = document.getElementById("menuF21");
                        document.getElementById("menuSmallBtn21").addEventListener("click", function () {
                            menuF21.submit();
                        });
                    </script>
                </ul>
            </div>
            <div class="menu-link-list other-pages-links">
                <h2 class="menu-title">{{__('all.mainHostCat2')}}</h2>
                <ul>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn4">
                            <span class="icon"><i class="fas fa-store"></i></span>
                            {{__('all.hostCat-4')}}
                        </a>
                    </li>
                    <script>
                        var menuF4 = document.getElementById("menuF4");
                        document.getElementById("menuSmallBtn4").addEventListener("click", function () {
                            menuF4.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn13">
                            <span class="icon"><i class="fas fa-gem"></i></span>
                            {{__('all.hostCat-13')}}
                        </a>
                    </li>
                    <script>
                        var menuF13 = document.getElementById("menuF13");
                        document.getElementById("menuSmallBtn13").addEventListener("click", function () {
                            menuF13.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn14">
                            <span class="icon"><i class="fas fa-wine-bottle"></i></span>
                            {{__('all.hostCat-14')}}
                        </a>
                    </li>
                    <script>
                        var menuF14 = document.getElementById("menuF14");
                        document.getElementById("menuSmallBtn14").addEventListener("click", function () {
                            menuF14.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn15">
                            <span class="icon"><i class="fas fa-smoking"></i></span>
                            {{__('all.hostCat-15')}}
                        </a>
                    </li>
                    <script>
                        var menuF15 = document.getElementById("menuF15");
                        document.getElementById("menuSmallBtn15").addEventListener("click", function () {
                            menuF15.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn16">
                            <span class="icon"><i class="fas fa-tshirt"></i></span>
                            {{__('all.hostCat-16')}}
                        </a>
                    </li>
                    <script>
                        var menuF16 = document.getElementById("menuF16");
                        document.getElementById("menuSmallBtn16").addEventListener("click", function () {
                            menuF16.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn17">
                            <span class="icon"><i class="fas fa-user-tie"></i></span>
                            {{__('all.hostCat-17')}}
                        </a>
                    </li>
                    <script>
                        var menuF17 = document.getElementById("menuF17");
                        document.getElementById("menuSmallBtn17").addEventListener("click", function () {
                            menuF17.submit();
                        });
                    </script>
                </ul>
            </div>
            <div class="menu-link-list other-pages-links">
                <h2 class="menu-title">{{__('all.mainHostCat5')}}</h2>
                <ul>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn6">
                            <span class="icon"><i class="fas fa-university"></i></span>
                            {{__('all.hostCat-6')}}
                        </a>
                    </li>
                    <script>
                        var menuF6 = document.getElementById("menuF6");
                        document.getElementById("menuSmallBtn6").addEventListener("click", function () {
                            menuF6.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn10">
                            <span class="icon"><i class="fas fa-volleyball-ball"></i></span>
                            {{__('all.hostCat-10')}}
                        </a>
                    </li>
                    <script>
                        var menuF10 = document.getElementById("menuF10");
                        document.getElementById("menuSmallBtn10").addEventListener("click", function () {
                            menuF10.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn9">
                            <span class="icon"><i class="fas fa-school"></i></span>
                            {{__('all.hostCat-9')}}
                        </a>
                    </li>
                    <script>
                        var menuF9 = document.getElementById("menuF9");
                        document.getElementById("menuSmallBtn9").addEventListener("click", function () {
                            menuF9.submit();
                        });
                    </script>
                    {{--btn--}}
                    <li>
                        <a href="javascript:void(0)" id="menuSmallBtn11">
                            <span class="icon"><i class="fas fa-university"></i></span>
                            {{__('all.hostCat-11')}}
                        </a>
                    </li>
                    <script>
                        var menuF11 = document.getElementById("menuF11");
                        document.getElementById("menuSmallBtn11").addEventListener("click", function () {
                            menuF11.submit();
                        });
                    </script>
                </ul>
            </div>

            <!-- other-pages-links - end -->
            <!-- social-links - start -->
            <div class="social-links">
                <h2 class="menu-title">{{__('all.getInTouch')}}</h2>
                <div class="mb-15">
                    <h3 class="contact-info">
                        <i class="fas fa-phone"></i>
                        100-2222-9999
                    </h3>
                    <h3 class="contact-info">
                        <i class="fas fa-envelope"></i>
                        info@dubrovnik.events
                    </h3>
                </div>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/Dubrovnikevents-108056124187936/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/dubrovnik.events/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
                {{--<a href="{{route('contact',app()->getLocale())}}" class="contact-btn">{{__('all.contactUs')}}</a>--}}
            </div>
            <!-- social-links - end -->

            <div class="overlay"></div>
        </div>
    </div>
    <!-- sidebar menu - end -->
</div>
<!-- altranative-header - end
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
                                        <p><a href="javascript:void(0)">{{__('all.sendEmail')}}</a></p>
                                        <h3><a href="javascript:void(0)">info@dubrovnik.events</a></h3>
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

                        <p class="mb-30" style="color: #878787;">
                            {{__('all.footerText')}}
                        </p>
                        <!-- social-links - start -->
                        <div class="social-links ul-li">
                            <h3 class="social-title">{{__('all.socialM')}}</h3>
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
                            <strong>{{__('all.events')}}</strong>
                        </h3>
                        <ul>
                            {{--link6--}}
                            {!! Form::open(['method'=>'GET','route' =>['event.index' ,'locale'=>app()->getLocale()],'id'=>'fForm6']) !!}
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="event_category_id" value="9">
                            {!! Form::close() !!}
                            <li><a href="javascript:void(0)" id="footerBtn6">{{__('all.nightOut')}}</a></li>
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
                            <li><a href="javascript:void(0)" id="footerBtn7">{{__('all.music')}}</a></li>
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
                            <li><a href="javascript:void(0)" id="footerBtn8">{{__('all.sightseeingTour')}}</a></li>
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
                            <li><a href="javascript:void(0)" id="footerBtn9">{{__('all.foodDrink')}}</a></li>
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
                            <li><a href="javascript:void(0)" id="footerBtn10">{{__('all.beachSea')}}</a></li>
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
                            <strong>{{__('all.places')}}</strong>
                        </h3>
                        <ul>
                            {{--link1--}}
                            {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()],'id'=>'fForm1']) !!}
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="host_category_id" value="5">
                            {!! Form::close() !!}
                            <li><a href="javascript:void(0)" id="footerBtn1">{{__('all.menuHotels')}}</a></li>
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
                            <li><a href="javascript:void(0)" id="footerBtn2">{{__('all.menuCafes')}}</a></li>
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
                            <li><a href="javascript:void(0)" id="footerBtn3">{{__('all.menuClubs')}}</a></li>
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
                            <li><a href="javascript:void(0)" id="footerBtn4">{{__('all.menuRest')}}</a></li>
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
                            <li><a href="javascript:void(0)" id="footerBtn5">{{__('all.menuWBars')}}</a></li>
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
                            {{__('all.our')}} <strong>{{__('all.insta')}}</strong>
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
                            {{__('all.followIg')}} <a href="https://www.instagram.com/dubrovnik.events/" target="_blank">dubrovnik.events</a>
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
                        <p class="m-0" style="color:#878787;">©2020 <a class="site-link">dubrovnik.events</a> {{__('all.rights')}}.</p>
                    </div>
                </div>
                <!-- copyright-text - end -->

                <!-- footer-menu - start -->
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="footer-menu">
                        <ul>
{{--                            <li><a href="{{route('contact',app()->getLocale())}}">{{__('all.contactUs')}}</a></li>--}}
                            <li><a href="{{route('about',app()->getLocale())}}">{{__('all.about')}}</a></li>
                            <li><a href="{{route('privacy')}}">{{__('all.privacy')}}</a></li>
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
<script type="text/javascript" id="cookieinfo"
        src="//cookieinfoscript.com/js/cookieinfo.min.js"
        data-moreinfo="{{route('privacy')}}"
        data-message="{{__('all.cookieWarning')}}"
        data-linkmsg="{{__('all.moreInfo')}}"
>
</script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ebbeb385c9865f5"></script>

</body>
</html>
