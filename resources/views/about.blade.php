@extends('layouts.app')
@section('description')
    <title>{{ config('app.name', 'Dubrovnik Events') }}</title>
    <meta name="description" content="Looking for places to go and see in Dubrovnik? Find all the best places and events in Dubrovnik, browse landmarks, restaurants, pubs, and much more.">
@endsection
@section('content')
<!-- service-section - start
================================================== -->
<section id="service-section" class="service-section sec-ptb-100 clearfix">
    <div class="container">
        <!-- service-wrapper - start -->
        <div class="service-wrapper">
            <!-- service-item - start -->
            <div class="service-item clearfix">
                <div class="service-image float-left">
                    <div class="big-image">
                        <img src="{{asset('images/dubrovnik0.jpg')}}" alt="Image_not_found">
                    </div>
                    <div class="small-image">
                        <img src="{{asset('images/dubrovnik1.jpg')}}" style="max-height: 200px;" alt="Image_not_found">
                    </div>
                </div>
                <div class="service-content float-right">
                    <div class="service-title mb-30">
                        <h2 class="title-text">{{__('all.about')}}</h2>
                    </div>
                    <p class="service-description black-color mb-30">
                        {{__('all.aboutText')}}
                    </p>
                    <div class="service-type-list mb-50 clearfix">
                        <ul>
                            <li>
                                <a href="{{route('event.index',app()->getLocale())}}">
                                    <span class="icon">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                    {{__('all.browseEvents')}}

                                </a>
                            </li>
                            <li>
                                <a href="{{route('host.index',app()->getLocale())}}">
                                    <span class="icon">
                                        <i class="fas fa-building"></i>
                                    </span>
                                    {{__('all.browsePlaces')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- service-item - end -->
        </div>
        <!-- service-wrapper - end -->
    </div>
</section>
<!-- service-section - end
================================================== -->
@endsection