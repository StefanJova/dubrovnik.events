@extends('layouts.app')
@section('description')
    <title>Dubrovnik events</title>
    <meta name="description" content="Looking for places to go and see in Dubrovnik? Find all the best places and events in Dubrovnik, browse landmarks, restaurants, pubs, and much more.">
@endsection
@section('styles')
    <style>
        .searchForm30{
            width:30%!important;
        }
    </style>
@endsection
@section('content')
        <!-- slide-section - start
		================================================== -->
<section id="main-carousel2" class="main-carousel2 clearfix">
    @if(!$latFeaEvents->isEmpty())
        @foreach($latFeaEvents as $latFeaEvent)
        <div class="item" style="background-image: url(
            @if(!$latFeaEvent->photos->isEmpty())
                @foreach($latFeaEvent->photos as $latFeaEventPhoto)
                    @if ($loop->first)
                        {{asset($latFeaEventPhoto->file)}}
                    @endif
                @endforeach
            @else
                @foreach($latFeaEvent->owner->photos as $eventFeaOwnerPhoto)
                    @if ($loop->first)
                        {{asset($eventFeaOwnerPhoto->file)}}
                    @endif
                @endforeach
            @endif
        );">
        <div class="overlay-black">
            <div class="container">
                @if(session('resCreated'))
                    <div class="alert alert-success" role="alert" style="margin: 0 auto; width:fit-content;">
                        {{ 'Reservation created' }}
                    </div>
                @endif
                <div class="row">
                    <!-- slider-content - start -->
                    <div class="col-lg-8">
                        <div class="slider-content">
                            @if($latFeaEvent->date_from OR $latFeaEvent->date_to)
                            <span class="date">{{$latFeaEvent->date_from->format('d.m.')}} {{$latFeaEvent->date_to?"~ ".$latFeaEvent->date_to->format('d.m.Y'):''}}</span>
                            @endif
                            <h4 class="title-text" style="font-size: 40px!important;">
                                {{__('all.eventCat-'.$latFeaEvent->category->id)}}
                            </h4>
                            <strong class="bold-text">{{$latFeaEvent->name}}</strong>
                            <a href="{{route('event.show',[app()->getLocale(),$latFeaEvent->id])}}" class="custom-btn">{{__('all.moreDetails')}}</a></div>
                    </div>
                    <!-- slider-content - end -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="item" style="background-image: url({{asset('images/dubg.jpg')}});">
            <div class="overlay-black">
                <div class="container">
                    <div class="row">
                        <!-- slider-content - start -->
                        <div class="col-lg-8">
                            <div class="slider-content">
                                <h1 class="title-text" style="font-size: 40px;">
                                    {{__('all.findBest')}}
                                </h1>
                                <strong class="bold-text">dubrovnik.events</strong>
                            </div>
                        </div>
                        <!-- slider-content - end -->
                    </div>
                </div>
            </div>
        </div>
@endif
    </section>
<!-- slide-section - end
================================================== -->
<!-- absolute-eventmake-section - start
================================================== -->
<div id="absolute-eventmake-section" class="absolute-eventmake-section sec-ptb-100 bg-gray-light clearfix">
    <div class="eventmaking-wrapper">
        <ul class="nav eventmake-tabs">
            <li>
                <a class="active" data-toggle="tab" href="#conference">
                    <i class="fas fa-clock"></i>
                    {{__('all.events')}}
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#musical">
                    <i class="fas fa-map-marker"></i>
                    {{__('all.places')}}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="conference" class="tab-pane fade in active show">
                {!! Form::open(['method'=>'GET','route' =>['event.index' ,'locale'=>app()->getLocale()]]) !!}
                    <ul>
                        <li class="pad0 col-lg-6 col-sm-12">
                            <input type="text" name="name" placeholder=" {{__('all.typeEN')}}">
                        </li>
                        <li class="pad0 col-lg-6 col-sm-12">
                            <select name="event_category_id" class="country-select">
                                <option value="0">{{__('all.any')}}</option>
                                @foreach($eventCategories as $eventCategory)
                                    <option value="{{$eventCategory->id}}">{{__('all.eventCat-'.$eventCategory->id)}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <button type="submit" class="custom-btn"> {{__('all.searchEvents')}}</button>
                        </li>
                    </ul>
                {!! Form::close() !!}
            </div>
            <div id="musical" class="tab-pane fade">
                {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()]]) !!}
                    <ul>
                        <li class="pad0 col-lg-6 col-sm-12">
                            <input type="text" name="name" placeholder=" {{__('all.typePN')}}">
                        </li>
                        <li class="pad0 col-lg-6 col-sm-12">
                            <select name="host_category_id" class="country-select">
                                <option value="0">Any</option>
                                @foreach($hostCategories as $hostCategory)
                                    <option value="{{$hostCategory->id}}">{{__('all.hostCat-'.$hostCategory->id)}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <button type="submit" class="custom-btn"> {{__('all.searchPlaces')}}</button>
                        </li>
                    </ul>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- upcomming-event-section2 - start
================================================== -->
@if(count($catHosts)>0 )
<section id="upcomming-event-section2" class="upcomming-event-section2 sec-ptb-100 clearfix">
    <div class="container">
    </div>
    <div class="comming-event-item">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="event-content">
                        <!-- event-title - start -->
                        <div class="event-title">
                            <h3 class="title-text"> {{__('all.topPlacesIn')}}  <strong>{{__('all.du')}}</strong></h3>
                            <span class="sub-title"> {{__('all.bestRatedPlaces')}}</span>
                        </div>
                        <!-- event-title - end -->
                        <p class="black-color mb-30">
                            {{__('all.aboutText')}}
                        </p>
                        <div class="text-left">
                            <a href="{{route('featured.places',app()->getLocale())}}" class="custom-btn"> {{__('all.seeFeatured')}}</a>
                        </div>
                    </div>
                </div>
                {{--carousel--}}
                <div id="carouselExampleIndicators" class=" col-lg-4 carousel slide" data-ride="carousel" style="background-color: #2a2a2a;">
                    <div class="carousel-inner" style="padding-top: 10px;">
                        @foreach($hostCategories as $hostCategory)
                            @if(count($catHosts->where('host_category_id',$hostCategory->id))>0)
                            <div class="carousel-item @if($hostCategory->id == 18) active @endif"  >
                                <div class="event-title">
                                    <h3 class="title-text" style="color:#ffc107!important;">{{'Top '.__('all.hostCat-'.$hostCategory->id)}}</h3>
                                </div>
                                    {{--<table class="table table-filter" >--}}
                                        {{--<tbody>--}}
                                        @foreach($catHosts->where('host_category_id',$hostCategory->id) as $catHost)
                                            {{--<tr>--}}
                                                {{--<td>--}}
                                                    <a href="{{route('host.show',[app()->getLocale(),$catHost->slug])}}">
                                                        <div class="row">
                                                        <div class="pull-left col-lg-4">
                                                            <img src="@foreach($catHost->photos as $catHostPhoto)@if($loop->first){{asset($catHostPhoto->file)}} @endif @endforeach" class="media-photo">
                                                        </div>
                                                        <div class="media-body col-lg-8">

                                                            <h4 class="title" style="color:#fff!important;">
                                                                {{$catHost->name}}
                                                            </h4>
                                                            @if($catHost->location)
                                                            <p style="color:#fff!important;">{{$catHost->location}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    </a>
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                            {{--</a>--}}
                                        @endforeach
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endif
<!-- upcomming-event-section2 - end
================================================== -->
<!-- event-section - start
================================================== -->
@if(count($latEvents)>0)
<section id="event-section" class="event-section sec-ptb-100 bg-gray-light clearfix">
    <div class="container">
        <div class="mb-50">
            <div class="row">
                <!-- section-title - start -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="section-title text-left">
                        <span class="line-style"></span>
                        <h2 class="big-title"><strong>{{__('all.upcoming')}}</strong> {{__('all.events')}}</h2>
                    </div>
                </div>
                <!-- section-title - end -->
                <!-- event-tab-menu - start -->
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="event-tab-menu clearfix">
                        <ul class="nav">
                            <li>
                                <a class="active" data-toggle="tab" href="#conference-event">
                                    <strong><i class="fas fa-calendar"></i> {{__('all.all')}}</strong> {{__('all.events')}}
                                </a>
                            </li>
                            @if(count($latEvents->where('event_category_id',10))>0)
                            <li>
                                <a data-toggle="tab" href="#playground-event">
                                    <strong><i class="fas fa-music"></i> {{__('all.music')}}</strong> {{__('all.events')}}
                                </a>
                            </li>
                            @endif
                            @if(count($latEvents->where('event_category_id',9))>0)
                            <li>
                                <a data-toggle="tab" href="#musical-event">
                                    <strong><i class="fas fa-fish"></i> {{__('all.foodDrink')}}</strong>
                                </a>
                            </li>
                            @endif
                            @if(count($latEvents->where('event_category_id',11))>0)
                            <li>
                                <a data-toggle="tab" href="#other-event">
                                    <strong><i class="fas fa-wine-glass"></i> {{__('all.nightOut')}}</strong>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- event-tab-menu - end -->
            </div>
        </div>
        <!-- tab-content - start -->
        <div class="tab-content">
            <!-- conference-event - start -->
            <div id="conference-event" class="tab-pane fade in active show">
                <div class="row">
                    @foreach($latEvents->take(15) as $latEvent)
                    <!-- event-item - start -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="event-item2 clearfix">
                            <!-- event-image - start -->
                            <div class="event-image">
                                @if($latEvent->date_from)
                                <div class="post-date">
                                    <span class="date">{{$latEvent->date_from->format('d')}}</span>
                                    <small class="month">{{$latEvent->date_from->format('M')}}</small>
                                </div>
                                @endif
                                <img src="
                                @if(!$latEvent->photos->isEmpty())
                                    @foreach($latEvent->photos as $latEventPhoto)
                                        @if ($loop->first)
                                            {{asset($latEventPhoto->file)}}
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($latEvent->owner->photos as $eventOwnerPhoto)
                                        @if ($loop->first)
                                            {{asset($eventOwnerPhoto->file)}}
                                        @endif
                                    @endforeach
                                @endif
                                        " alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->
                            <!-- event-content - start -->
                            <div class="event-content">
                                <div class="event-title mb-15">
                                    <h3 class="title">
                                        {{$latEvent->name}}
                                    </h3>
                                    <span class="ticket-price yellow-color">{{__('all.eventCat-'.$latEvent->category->id)}}</span>
                                </div>
                                <div class="event-post-meta ul-li-block mb-30">
                                    <ul>
                                        @if($latEvent->time_from OR $latEvent->time_to)
                                        <li>
                                            <span class="icon">
                                                <i class="far fa-clock"></i>
                                            </span>
                                            {{$latEvent->time_from}} {{$latEvent->time_to?"~ ".$latEvent->time_to:''}}
                                        </li>
                                        @endif
                                        @if($latEvent->location)
                                        <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                            {{$latEvent->location}}
                                        </li>
                                        @elseif($latEvent->owner->location)
                                            <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                                {{$latEvent->owner->location}}
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <a href="{{route('event.show',[app()->getLocale(),$latEvent->id])}}" class="tickets-details-btn">
                                    {{__('all.moreDetails')}}
                                </a>
                            </div>
                            <!-- event-content - end -->
                        </div>
                    </div>
                    <!-- event-item - end -->
                    @endforeach
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <a href="{{route('event.index',app()->getLocale())}}" class="custom-btn">
                            {{__('all.browseEvents')}}
                        </a>
                    </div>

                </div>
            </div>
            <!-- conference-event - end -->
            <!-- playground-event - start -->
            <div id="playground-event" class="tab-pane fade">
                <div class="row">
                    @foreach($latEvents->where('event_category_id',10)->take(15) as $latEvent)
                            <!-- event-item - start -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="event-item2 clearfix">
                            <!-- event-image - start -->
                            <div class="event-image">
                                @if($latEvent->date_from)
                                    <div class="post-date">
                                        <span class="date">{{$latEvent->date_from->format('d')}}</span>
                                        <small class="month">{{$latEvent->date_from->format('M')}}</small>
                                    </div>
                                @endif
                                <img src="
                                @if(!$latEvent->photos->isEmpty())
                                @foreach($latEvent->photos as $latEventPhoto)
                                @if ($loop->first)
                                {{asset($latEventPhoto->file)}}
                                @endif
                                @endforeach
                                @else
                                @foreach($latEvent->owner->photos as $eventOwnerPhoto)
                                @if ($loop->first)
                                {{asset($eventOwnerPhoto->file)}}
                                @endif
                                @endforeach
                                @endif
                                        " alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->
                            <!-- event-content - start -->
                            <div class="event-content">
                                <div class="event-title mb-15">
                                    <h3 class="title">
                                        {{$latEvent->name}}
                                    </h3>
                                    <span class="ticket-price yellow-color">{{__('all.eventCat-'.$latEvent->category->id)}}</span>
                                </div>
                                <div class="event-post-meta ul-li-block mb-30">
                                    <ul>
                                        @if($latEvent->time_from OR $latEvent->time_to)
                                            <li>
                                            <span class="icon">
                                                <i class="far fa-clock"></i>
                                            </span>
                                                {{$latEvent->time_from}} {{$latEvent->time_to?"~ ".$latEvent->time_to:''}}
                                            </li>
                                        @endif
                                        @if($latEvent->location)
                                            <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                                {{$latEvent->location}}
                                            </li>
                                        @elseif($latEvent->owner->location)
                                            <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                                {{$latEvent->owner->location}}
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <a href="{{route('event.show',[app()->getLocale(),$latEvent->id])}}" class="tickets-details-btn">
                                    {{__('all.moreDetails')}}
                                </a>
                            </div>
                            <!-- event-content - end -->
                        </div>
                    </div>
                    <!-- event-item - end -->
                    @endforeach
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <a href="{{route('event.index',app()->getLocale())}}" class="custom-btn">
                            {{__('all.browseEvents')}}
                        </a>
                    </div>

                </div>
            </div>
            <!-- playground-event - end -->

            <!-- musical-event - start -->
            <div id="musical-event" class="tab-pane fade">
                <div class="row">
                    @foreach($latEvents->where('event_category_id',9)->take(15) as $latEvent)
                            <!-- event-item - start -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="event-item2 clearfix">
                            <!-- event-image - start -->
                            <div class="event-image">
                                @if($latEvent->date_from)
                                    <div class="post-date">
                                        <span class="date">{{$latEvent->date_from->format('d')}}</span>
                                        <small class="month">{{$latEvent->date_from->format('M')}}</small>
                                    </div>
                                @endif
                                <img src="
                                @if(!$latEvent->photos->isEmpty())
                                @foreach($latEvent->photos as $latEventPhoto)
                                @if ($loop->first)
                                {{asset($latEventPhoto->file)}}
                                @endif
                                @endforeach
                                @else
                                @foreach($latEvent->owner->photos as $eventOwnerPhoto)
                                @if ($loop->first)
                                {{asset($eventOwnerPhoto->file)}}
                                @endif
                                @endforeach
                                @endif
                                        " alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->
                            <!-- event-content - start -->
                            <div class="event-content">
                                <div class="event-title mb-15">
                                    <h3 class="title">
                                        {{$latEvent->name}}
                                    </h3>
                                    <span class="ticket-price yellow-color">{{__('all.eventCat-'.$latEvent->category->id)}}</span>
                                </div>
                                <div class="event-post-meta ul-li-block mb-30">
                                    <ul>
                                        @if($latEvent->time_from OR $latEvent->time_to)
                                            <li>
                                            <span class="icon">
                                                <i class="far fa-clock"></i>
                                            </span>
                                                {{$latEvent->time_from}} {{$latEvent->time_to?"~ ".$latEvent->time_to:''}}
                                            </li>
                                        @endif
                                        @if($latEvent->location)
                                            <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                                {{$latEvent->location}}
                                            </li>
                                        @elseif($latEvent->owner->location)
                                            <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                                {{$latEvent->owner->location}}
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <a href="{{route('event.show',[app()->getLocale(),$latEvent->id])}}" class="tickets-details-btn">
                                    {{__('all.moreDetails')}}
                                </a>
                            </div>
                            <!-- event-content - end -->
                        </div>
                    </div>
                    <!-- event-item - end -->
                    @endforeach
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <a href="{{route('event.index',app()->getLocale())}}" class="custom-btn">
                            {{__('all.browseEvents')}}
                        </a>
                    </div>

                </div>
            </div>
            <!-- musical-event - end -->

            <!-- other-event - start -->
            <div id="other-event" class="tab-pane fade">
                <div class="row">
                    @foreach($latEvents->where('event_category_id',11)->take(15) as $latEvent)
                            <!-- event-item - start -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="event-item2 clearfix">
                            <!-- event-image - start -->
                            <div class="event-image">
                                @if($latEvent->date_from)
                                    <div class="post-date">
                                        <span class="date">{{$latEvent->date_from->format('d')}}</span>
                                        <small class="month">{{$latEvent->date_from->format('M')}}</small>
                                    </div>
                                @endif
                                <img src="
                                @if(!$latEvent->photos->isEmpty())
                                @foreach($latEvent->photos as $latEventPhoto)
                                @if ($loop->first)
                                {{asset($latEventPhoto->file)}}
                                @endif
                                @endforeach
                                @else
                                @foreach($latEvent->owner->photos as $eventOwnerPhoto)
                                @if ($loop->first)
                                {{asset($eventOwnerPhoto->file)}}
                                @endif
                                @endforeach
                                @endif
                                        " alt="Image_not_found">
                            </div>
                            <!-- event-image - end -->
                            <!-- event-content - start -->
                            <div class="event-content">
                                <div class="event-title mb-15">
                                    <h3 class="title">
                                        {{$latEvent->name}}
                                    </h3>
                                    <span class="ticket-price yellow-color">{{__('all.eventCat-'.$latEvent->category->id)}}</span>
                                </div>
                                <div class="event-post-meta ul-li-block mb-30">
                                    <ul>
                                        @if($latEvent->time_from OR $latEvent->time_to)
                                            <li>
                                            <span class="icon">
                                                <i class="far fa-clock"></i>
                                            </span>
                                                {{$latEvent->time_from}} {{$latEvent->time_to?"~ ".$latEvent->time_to:''}}
                                            </li>
                                        @endif
                                        @if($latEvent->location)
                                            <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                                {{$latEvent->location}}
                                            </li>
                                        @elseif($latEvent->owner->location)
                                            <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                                {{$latEvent->owner->location}}
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <a href="{{route('event.show',[app()->getLocale(),$latEvent->id])}}" class="tickets-details-btn">
                                    {{__('all.moreDetails')}}
                                </a>
                            </div>
                            <!-- event-content - end -->
                        </div>
                    </div>
                    <!-- event-item - end -->
                    @endforeach
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <a href="{{route('event.index',app()->getLocale())}}" class="custom-btn">
                            {{__('all.browseDetails')}}
                        </a>
                    </div>

                </div>
            </div>
            <!-- other-event - end -->
        </div>
        <!-- tab-content - end -->
    </div>
</section>
@endif
<!-- event-section - end
================================================== -->

    <section id="event-expertise-section" class="event-expertise-section bg-gray-light sec-ptb-100 clearfix">
        <div class="container">

            <!-- section-title - start -->
            <div class="section-title text-center mb-50">
                <small class="sub-title">{{__('all.landmarks')}}</small>
                <h2 class="big-title"><strong>{{__('all.places')}}</strong> {{__('all.toSee')}}</h2>
            </div>
            <!-- section-title - end -->

            <!-- event-expertise-carousel - start -->
            <div id="event-expertise-carousel" class="event-expertise-carousel owl-carousel owl-theme">
                <!-- expertise-item - start -->
                @foreach($landmarks as $landmark)
                <div class="item">
                    <span class="expertise-title"></span>
                    <div class="expertise-item">
                        <div class="image image-wrapper">
                            <img src="
                            @foreach($landmark->photos as $lmPhoto)
                                @if($loop->first)
                                    {{$lmPhoto->file}}
                                @endif
                            @endforeach
                            " alt="Image_not_found">
                            <a href="{{route('landmark.show',[app()->getLocale(),$landmark->slug])}}" class="plus-effect"></a>
                        </div>
                        <div class="content">
                            <h3 class="title">{{$landmark->name}}</h3>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- expertise-item - end -->
            </div>
            <!-- event-expertise-carousel - end -->

        </div>
    </section>

@endsection