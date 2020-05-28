@extends('layouts.app')
@section('description')
    <title>{{__('all.hostCat-'.$host->category->id).' '. $host->name}}</title>

    @if($host->desc)
        <meta name="description" content="{{substr($host->desc,0,150).'...'}}">
    @else
        <meta name="description" content="Looking for places to go and see in Dubrovnik? Find all the best places and events in Dubrovnik, browse landmarks, restaurants, cafes, wine bars, pubs, and much more.">
    @endif
@endsection
@section('styles')
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">

    <style>
        input[type=date]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
    }
    input[type=time]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
    }
    </style>
@endsection
@section('content')
    <script>
        $( document ).ready(function() {
            let today = new Date().toISOString().substr(0, 10);
            document.querySelector("#date").value = today;
        });
    </script>
<!-- event-details-section - start
================================================== -->
<div id="register-modal" class="reglog-modal-wrapper register-modal mfp-hide clearfix" style="background-image: url(
@foreach($hostPhotos as $hostPhoto)
@if ($loop->first)
{{asset($hostPhoto->file)}}
@endif
@endforeach);">
    <div class="overlay-black clearfix">
        <!-- leftside-content - start -->
        <div class="leftside-content">
            <div class="site-logo-wrapper mb-80">
                <a class="logo">
                   <h2 class="form-title title-large white-color">{{__('all.hostCat-'.$host->category->id).' '.$host->name}}</h2>
                </a>
            </div>
        </div>
        <!-- leftside-content - end -->

        <!-- rightside-content - start -->
        <div class="rightside-content text-center" style="overflow-y:auto;">
            <div class="mb-30">
                <h2 class="form-title title-large white-color">{{__('all.makea')}} <strong>{{__('all.reservation')}}</strong></h2>
            </div>
            <div class="login-form text-center mb-50">
                {!! Form::open(['method'=>'POST','route' => [ 'reservation.store' ,app()->getLocale()]]) !!}
                    <input type="hidden" name="owner_id" value="{{$host->id}}">
                    <div class="form-item">
                        <input type="date" id="date" name="date" required>
                    </div>
                    <div class="form-item">
                        <input type="time" id="time" name="time" required>
                    </div>
                    <div class="form-item">
                        <input type="text" name="name" placeholder="{{__('all.fname')}}" required>
                    </div>
                    <div class="form-item">
                        <input type="number" name="num_people" placeholder="{{__('all.numOVis')}}" required>
                    </div>
                    <div class="form-item">
                        <input type="email" name="email" placeholder="{{__('all.emailAddress')}}">
                    </div>
                    <div class="form-item">
                        <input type="text" name="phone" placeholder="{{__('all.phoneNum')}}">
                    </div>
                    <div class="form-item">
                        <textarea id="reservationDesc" name="desc" cols="10" rows="2" placeholder="{{__('all.addInfo')}}"></textarea>
                    </div>
                    <button type="submit" class="login-btn">{{__('all.submit')}}</button>
                {!! Form::close() !!}
            </div>

            <div class="bottom-text white-color">
                <p class="m-0">
                    {{__('all.resMes1')}}
                </p>
                <p class="m-0">{{__('all.resMes2')}}</p>
            </div>

        </div>
        <!-- rightside-content - end -->
        <a class="popup-modal-dismiss" href="#!">
            <i class="fas fa-times"></i>
        </a>
    </div>
</div>

<script>
    $('a#').click(function () {
        $('#my-modal').modal({
            show: true,
            closeOnEscape: true
        });
    });
</script>
<section id="event-details-section" class="event-details-section sec-ptb-100 clearfix">
    <div class="container">
        <div class="row">
            <!-- col - event-details - start -->
            <div class="col-lg-8 col-md-12 col-sm-12">
                <!-- event-details - start -->
                <div class="event-details mb-80">
                    <div class="row">
                        <div class="col-md-8 event-title mb-30">
                            <h2 class="event-title">{{__('all.hostCat-'.$host->category->id).' '}}<strong>{{$host->name}}</strong></h2>
                        </div>
                        @if($host->accept_reservations==1)
                        <div class="col-md-4">
                            <a href="#register-modal" class="custom-btn register-modal-btn" style="align-self: end">{{__('all.makea')}}{{__('all.reservation')}}</a>
                        </div>
                        @endif
                    </div>

                    @if($hostPhotos)
                    <div id="event-details-carousel" class="event-details-carousel owl-carousel owl-theme">
                        @foreach($hostPhotos as $photo)
                        <div class="item">
                            <img src="{{asset($photo->file)}}" alt="host photo">
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="event-info-list ul-li clearfix mb-50">
                        <ul>
                            @if($hostDetails->opening AND $hostDetails->closing)
                            <li>
                                <span class="icon">
                                    <i class="far fa-clock"></i>
                                </span>
                                <div class="event-content">
                                    <small class="event-title">{{__('all.open')}}</small>
                                    <h3 class="event-date">{{$hostDetails->opening}} ~ {{$hostDetails->closing}}</h3>
                                </div>
                            </li>
                            @endif
                            @if($host->location)
                            <li>
                                <span class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <div class="event-content">
                                    <small class="event-title">{{__('all.location')}}</small>
                                    <h3 class="event-date">{{$host->location}}</h3>
                                </div>
                            </li>
                            @endif
                            @if($hostDetails->capacity)
                            <li>
                                <span class="icon">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="event-content">
                                    <small class="event-title">{{__('all.capacity')}}</small>
                                    <h3 class="event-date">{{$hostDetails->capacity}}</h3>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                    @if($host->desc)
                    <p class="black-color mb-30">
                        {{$host->desc}}
                    </p>
                    @endif
                </div>
                <!-- event-details - end -->
                <!-- service-section - start
================================================== -->
                {{--AMENITIES--}}
                <!-- service-section - end
                ================================================== -->
            </div>
            <!-- col - event-details - end -->

            <!-- sidebar-section - start -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="sidebar-section">
                    <!-- map-wrapper - start -->
                    <div class="map-wrapper mb-30">
                        <!-- section-title - start -->
                        <div class="section-title mb-30" style="margin-top: 73px;">
                        </div>
                        <!-- section-title - end -->
                        <div id="map" style="height: 300px; width:100% ;"></div>
                    </div>
                    <!-- map-wrapper - end -->
                    <!-- location-wrapper - start -->
                    @if($hostSocial->instagram OR $hostSocial->facebook OR $hostSocial->twitter OR $hostSocial->tadvisor OR $hostSocial->website)
                    <div class="location-wrapper mb-30">
                        <div class="title-wrapper">
                            <span class="icon">
                                <i class="fas fa-link"></i>
                            </span>
                            <div class="title-content">
                                <small>{{__('all.contactUs')}}</small>
                                <h3>{{__('all.socialM')}}</h3>
                            </div>
                        </div>
                        <div class="contact-links ul-li-block clearfix">
                            <ul>
                                @if($hostSocial->instagram)
                                    <li>
                                        <a href="{{$hostSocial->instagram}}" target="_blank">
                                        <span class="icon">
                                            <i class="fab fa-instagram"></i>
                                        </span>
                                            {{substr($hostSocial->instagram, 26)}}
                                        </a>
                                    </li>
                                @endif
                                @if($hostSocial->facebook)
                                <li>
                                    <a href="{{$hostSocial->facebook}}" target="_blank">
                                        <span class="icon">
                                            <i class="fab fa-facebook-f"></i>
                                        </span>
                                        {{substr($hostSocial->facebook, 24)}}
                                    </a>
                                </li>
                                @endif
                                @if($hostSocial->twitter)
                                    <li>
                                        <a href="{{$hostSocial->twitter}}" target="_blank">
                                            <span class="icon">
                                                <i class="fab fa-twitter"></i>
                                            </span>
                                            {{'@'.substr($hostSocial->twitter, 20)}}
                                        </a>
                                    </li>
                                @endif
                                @if($hostSocial->tadvisor)
                                    <li>
                                        <a href="{{$hostSocial->tadvisor}}" target="_blank">
                                        <span class="icon">
                                            <i class="fab fa-tripadvisor"></i>
                                        </span>
                                            {{substr($hostSocial->tadvisor, 12, 15)}}
                                        </a>
                                    </li>
                                @endif
                                @if($hostSocial->website)
                                <li>
                                    <a href="{{$hostSocial->website}}" target="_blank">
												<span class="icon">
													<i class="fas fa-link"></i>
												</span>
                                        {{substr($hostSocial->website, 12, 18).'...'}}
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endif
            <!-- location-wrapper - end -->
                </div>
            </div>
            <!-- sidebar-section - end -->
            <div class="col-lg-12">
                <section id="service-section" class="service-section sec-ptb-100 bg-gray-light clearfix">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section-title mb-50 sr-fade1">
                                    <span class="line-style"></span>
                                    <h2 class="big-title"><strong>{{__('all.amenities')}}</strong></h2>
                                </div>
                            </div>
                        </div>
                        <div class="service-wrapper sr-fade1">
                            <ul>
                                @foreach($icons as $icon)
                                    @if($hostAmenities[$icon->col_name]!=NULL)
                                        <li style="height: 250px">
                                            <a href="#!">
                                        <span class="icon">
                                            <i class="{{$icon->icon}}"></i>
                                        </span>
                                                <strong class="service-title">{{$icon->title}}</strong>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </section>
                @if(!$comingEvents->isEmpty() OR !$pastEvents->isEmpty())
                <section id="event-section" class="event-section sec-ptb-100 bg-gray-light clearfix">
                    <div class="container">
                        <div class="mb-50">
                            <div class="row">
                                <!-- section-title - start -->
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="section-title text-left">
                                        <span class="line-style"></span>
                                        <h2 class="big-title"><strong>{{__('all.our')}}</strong> {{__('all.events')}}</h2>
                                    </div>
                                </div>
                                <!-- section-title - end -->

                                <!-- event-tab-menu - start -->
                                <div class="col-lg-8 col-md-12 col-sm-12">
                                    <div class="event-tab-menu clearfix">
                                        <ul class="nav">
                                            @if(!$comingEvents->isEmpty())
                                            <li>
                                                <a data-toggle="tab" class="active" href="#conference-event">
                                                    <strong><i class="fas fa-calendar-alt"></i> {{__('all.coming')}}</strong> {{__('all.events')}}
                                                </a>
                                            </li>
                                            @endif
                                            @if(!$pastEvents->isEmpty())
                                            <li>
                                                <a data-toggle="tab" href="#other-event">
                                                    <strong><i class="far fa-check-square"></i> {{__('all.past')}}</strong> {{__('all.events')}}
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
                            @if(!$comingEvents->isEmpty())
                            <!-- conference-event - start -->
                            <div id="conference-event" class="tab-pane active fade show">
                                <div class="row">
                                    @foreach($comingEvents as $comingEvent)
                                    <!-- event-item - start -->
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="event-item2 clearfix">
                                            <!-- event-image - start -->
                                            <div class="event-image">
                                                @if($comingEvent->date_from)
                                                <div class="post-date">
                                                    <span class="date">{{$comingEvent->date_from->format('d')}}</span>
                                                    <small class="month">{{$comingEvent->date_from->format('M')}}</small>
                                                </div>
                                                @endif
                                                <img src="
                                                @if(!$comingEvent->photos->isEmpty())
                                                    @foreach($comingEvent->photos as $comingEventPhoto)
                                                        @if ($loop->first)
                                                            {{asset($comingEventPhoto->file)}}
                                                        @endif
                                                    @endforeach
                                                @elseif(!$hostPhotos->isEmpty())
                                                    @foreach($hostPhotos as $hostPhoto)
                                                        @if ($loop->first)
                                                            {{asset($hostPhoto->file)}}
                                                        @endif
                                                    @endforeach
                                                @endif " alt="event photo">
                                            </div>
                                            <!-- event-image - end -->

                                            <!-- event-content - start -->
                                            <div class="event-content">
                                                <div class="event-title mb-15">
                                                    <h3 class="title">
                                                        {{$comingEvent->name}}
                                                    </h3>
                                                    <span class="ticket-price yellow-color">{{__('all.eventCat-'.$comingEvent->category->id)}}</span>
                                                </div>
                                                <div class="event-post-meta ul-li-block mb-30">
                                                    <ul>
                                                        @if($comingEvent->time_from OR $comingEvent->time_to)
                                                        <li>
                                                            <span class="icon">
                                                                <i class="far fa-clock"></i>
                                                            </span>
                                                            {{$comingEvent->time_from}} {{$comingEvent->time_to?"~ ".$comingEvent->time_to:''}}
                                                        </li>
                                                        @endif
                                                        @if($comingEvent->location)
                                                        <li>
                                                            <span class="icon">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                            </span>
                                                           {{$comingEvent->location}}
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <a href="{{route('event.show',[app()->getLocale(),$comingEvent->id])}}" class="tickets-details-btn">
                                                    {{__('all.moreDetails')}}
                                                </a>
                                            </div>
                                            <!-- event-content - end -->

                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- event-item - end -->
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="pagination evPagHost ul-li clearfix">
                                            <ul>
                                                {{$comingEvents->links()}}
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                           @endif
                           @if(!$pastEvents->isEmpty())
                                   <!-- conference-event - start -->
                            <div id="other-event" class="tab-pane fade">
                                <div class="row">
                                    @foreach($pastEvents as $pastEvent)
                                            <!-- event-item - start -->
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="event-item2 clearfix">
                                            <!-- event-image - start -->
                                            <div class="event-image">
                                                @if($pastEvent->date_from)
                                                    <div class="post-date">
                                                        <span class="date">{{$pastEvent->date_from->format('d')}}</span>
                                                        <small class="month">{{$pastEvent->date_from->format('M')}}</small>
                                                    </div>
                                                @endif
                                                <img src="
                                                @if(!$pastEvent->photos->isEmpty())
                                                    @foreach($pastEvent->photos as $pastEventPhoto)
                                                        @if ($loop->first)
                                                            {{asset($pastEventPhoto->file)}}
                                                        @endif
                                                    @endforeach
                                                @elseif(!$hostPhotos->isEmpty())
                                                    @foreach($hostPhotos as $hostPhoto)
                                                        @if ($loop->first)
                                                            {{asset($hostPhoto->file)}}
                                                        @endif
                                                    @endforeach
                                                @endif " alt="event photo">
                                            </div>
                                            <!-- event-image - end -->

                                            <!-- event-content - start -->
                                            <div class="event-content">
                                                <div class="event-title mb-15">
                                                    <h3 class="title">
                                                        {{$pastEvent->name}}
                                                    </h3>
                                                    <span class="ticket-price yellow-color">{{__('all.eventCat-'.$pastEvent->category->id)}}</span>
                                                </div>
                                                <div class="event-post-meta ul-li-block mb-30">
                                                    <ul>
                                                        @if($pastEvent->time_from OR $pastEvent->time_to)
                                                            <li>
                                                            <span class="icon">
                                                                <i class="far fa-clock"></i>
                                                            </span>
                                                                {{$pastEvent->time_from}} {{$pastEvent->time_to?"~ ".$pastEvent->time_to:''}}
                                                            </li>
                                                        @endif
                                                        @if($pastEvent->location)
                                                            <li>
                                                            <span class="icon">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                            </span>
                                                                {{$pastEvent->location}}
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <a href="{{route('event.show',[app()->getLocale(),$pastEvent->id])}}" class="tickets-details-btn">
                                                    {{__('all.moreDetails')}}
                                                </a>
                                            </div>
                                            <!-- event-content - end -->

                                        </div>
                                    </div>
                                    @endforeach
                                            <!-- event-item - end -->
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="pagination evPagHost ul-li clearfix">
                                            <ul>
                                                {{$pastEvents->links()}}
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endif

                        </div>
                        <!-- tab-content - end -->
                    </div>
                </section>
                @endif
            </div>

        </div>
    </div>
</section>
<!-- event-details-section - end
================================================== -->
@endsection
@section('scripts')
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    {{--<script src="https://www.openlayers.org/api/OpenLayers.js"></script>--}}
    <script>
        var attribution = new ol.control.Attribution({
            collapsible: false
        });

        var map = new ol.Map({
            controls: ol.control.defaults({attribution: false}).extend([attribution]),
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM({
                        url: "https://a.tile.openstreetmap.org/{z}/{x}/{y}.png"
                    })
                })
            ],
            target: 'map',
            view: new ol.View({
                center: ol.proj.fromLonLat([{{$hostDetails->lat}}
                    , {{$hostDetails->lng}}
                ]),
                zoom: 15
            })
        });
        var layer = new ol.layer.Vector({
            source: new ol.source.Vector({
                features: [
                    new ol.Feature({
                        geometry: new ol.geom.Point(ol.proj.fromLonLat([{{$hostDetails->lat}}
                            , {{$hostDetails->lng}}
                        ]))
                    })
                ]
            })
        });
        map.addLayer(layer);
    </script>
@endsection