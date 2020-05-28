@extends('layouts.app')
@section('description')
    <title>{{__('all.eventCat-'.$event->category->id).' '. $event->name}}</title>
    @if($event->desc)
        <meta name="description" content="{{substr($event->desc,0,150).'...'}}">
    @else
        <meta name="description" content="Looking for places to go and see in Dubrovnik? Find all the best places and events in Dubrovnik, browse landmarks, restaurants, pubs, and much more.">
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
    <div id="register-modal" class="reglog-modal-wrapper register-modal mfp-hide clearfix" style="background-image: url(
    @if(!$eventPhotos->isEmpty())
        @foreach($eventPhotos as $eventPhoto)
            @if ($loop->first)
                {{asset($eventPhoto->file)}}
            @endif
        @endforeach
    @elseif(!$hostPhotos->isEmpty())
        @foreach($hostPhotos as $hostPhoto)
            @if ($loop->first)
                {{asset($hostPhoto->file)}}
            @endif
        @endforeach
    @endif
    );">
        <div class="overlay-black clearfix">
            <!-- leftside-content - start -->
            <div class="leftside-content">
                <div class="site-logo-wrapper mb-80">
                    <a class="logo">
                        <h2 class="form-title title-large white-color"> {{$event->name}}</h2>
                        <span class="sub-title">{{__('all.eventCat-'.$event->category->id)}}</span>
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
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <input type="hidden" name="owner_id" value="{{$event->owner->id}}">

                    <div class="form-item">
                        <input type="hidden" id="date" name="date" value="{{$event->date_from->format('d-M-Y')}}" required>
                    </div>
                    <div class="form-item">
                        <input type="time" id="time" name="time"  @if($event->time_from)value="{{$event->time_from}}"@endif  required>
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
                    <p class="m-0">
                        {{__('all.resMes2')}}
                    </p>
                </div>

            </div>
            <!-- rightside-content - end -->
            <a class="popup-modal-dismiss" href="#!">
                <i class="fas fa-times"></i>
            </a>
        </div>
    </div>
        <!-- breadcrumb-section - start
		================================================== -->
<section id="breadcrumb-section" class="breadcrumb-section clearfix">
    <div class="jarallax" style="background-image: url(
    @if(!$eventPhotos->isEmpty())
        @foreach($eventPhotos as $eventPhoto)
            @if ($loop->first)
                {{asset($eventPhoto->file)}}
            @endif
        @endforeach
    @elseif(!$hostPhotos->isEmpty())
        @foreach($hostPhotos as $hostPhoto)
            @if ($loop->first)
                {{asset($hostPhoto->file)}}
            @endif
        @endforeach
    @endif
    );">
        <div class="overlay-black">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">

                        <!-- breadcrumb-title - start -->
                        <div class="breadcrumb-title text-center mb-50">
                            <span class="sub-title">{{__('all.eventCat-'.$eventCategory->id)}}</span>
                            @if($event->name)
                            <h2 class="big-title"><strong>{{$event->name}}</strong></h2>
                            @endif
                        </div>
                        <!-- breadcrumb-title - end -->

                        <!-- breadcrumb-list - start -->
                        <div class="breadcrumb-list">
                            <ul>
                                @if($event->time_from OR $event->time_to)
                                    <li class="breadcrumb-item active">{{$event->time_from}} {{$event->time_to?"~ ".$event->time_to:''}}</li>
                                @endif
                                @if($event->date_from OR $event->date_to)
                                    <li class="breadcrumb-item active">{{$event->date_from->format('d.m.')}} {{$event->date_to?"~ ".$event->date_to->format('d.m.Y'):''}}</li>
                                @endif
                                @if($event->location OR $host->location)
                                    <li class="breadcrumb-item active">{{$event->location?$event->location:$event->owner['location']}}</li>
                                @endif
                            </ul>
                        </div>
                        <!-- breadcrumb-list - end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-section - end
================================================== -->
        <!-- event-details-section - start
================================================== -->
<section id="event-details-section" class="event-details-section sec-ptb-100 clearfix">
    <div class="container">
        <div class="row">
            <!-- col - event-details - start -->
            <div class="col-lg-8 col-md-12 col-sm-12">
                <!-- event-details - start -->
                <div class="event-details mb-80">
                    <div class="row">
                        <div class="col-lg-8 event-title mb-30">
                            @if($event->featured>0)
                                <span class="tag-item">
                                <i class="fas fa-bookmark"></i>
                                    {{__('all.featuredEvent')}}
                            </span>
                            @endif
                            <h2 class="event-title"><strong>{{$event->name}}</strong></h2>
                        </div>
                        @if($host->accept_reservations==1)
                            <div class="col-md-4">
                                <a href="#register-modal" class="custom-btn register-modal-btn" style="align-self: end">{{__('all.makea')}}{{__('all.reservation')}}</a>
                            </div>
                        @endif
                    </div>


                    @if(!$eventPhotos->isEmpty())
                        <div id="event-details-carousel" class="event-details-carousel owl-carousel owl-theme">
                            @foreach($eventPhotos as $photo)
                                <div class="item">
                                    <img src="{{asset($photo->file)}}" alt="event photo">
                                </div>
                            @endforeach
                        </div>
                    @elseif(!$hostPhotos->isEmpty())
                        <div id="event-details-carousel" class="event-details-carousel owl-carousel owl-theme">
                            @foreach($hostPhotos as $hphoto)
                                <div class="item">
                                    <img src="{{asset($hphoto->file)}}" alt="host photo">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="event-info-list ul-li clearfix mb-50">
                        <ul>
                            @if($event->date_from OR $event->date_to)
                                <li>
                                <span class="icon">
                                    <i class="far fa-calendar"></i>
                                </span>
                                    <div class="event-content">
                                        <small class="event-title">Date</small>
                                        <h3 class="event-date">{{$event->date_from->format('d.m.')}} {{$event->date_to?"~ ".$event->date_to->format('d.m.Y'):''}}</h3>
                                    </div>
                                </li>
                            @endif
                            @if($event->time_from OR $event->time_to)
                                <li>
                                <span class="icon">
                                    <i class="far fa-clock"></i>
                                </span>
                                    <div class="event-content">
                                        <small class="event-title">{{__('all.time')}}</small>
                                        <h3 class="event-date">{{$event->time_from}} {{$event->time_to?"~ ".$event->time_to:''}}</h3>
                                    </div>
                                </li>
                            @endif
                            {{--@if($event->location)--}}
                                <li>
                                <span class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                    <div class="event-content">
                                        <small class="event-title">{{__('all.location')}}</small>
                                        <h3 class="event-date">{{$event->location?$event->location:$event->owner['location']}}</h3>
                                    </div>
                                </li>
                            {{--@endif--}}
                        </ul>
                    </div>
                    @if($event->desc)
                        <p class="black-color mb-30">
                            {{$event->desc}}
                        </p>
                    @endif
                </div>
                <!-- event-details - end -->
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
                        <div id="map" style="height: 300px; width: 100%;"></div>
                    </div>
                    <!-- map-wrapper - end -->
                    <!-- location-wrapper - start -->
                    @if($eventSocial->instagram OR $eventSocial->facebook OR $eventSocial->twitter OR $eventSocial->tadvisor OR $eventSocial->website)
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
                                @if($eventSocial->instagram)
                                    <li>
                                        <a href="{{$eventSocial->instagram}}" target="_blank">
                                        <span class="icon">
                                            <i class="fab fa-instagram"></i>
                                        </span>
                                            {{substr($eventSocial->instagram, 26)}}
                                        </a>
                                    </li>
                                @elseif($hostSocial->instagram)
                                    <li>
                                        <a href="{{$hostSocial->instagram}}" target="_blank">
                                        <span class="icon">
                                            <i class="fab fa-instagram"></i>
                                        </span>
                                            {{substr($hostSocial->instagram, 26)}}
                                        </a>
                                    </li>
                                @endif
                                @if($eventSocial->facebook)
                                    <li>
                                        <a href="{{$eventSocial->facebook}}" target="_blank">
                                        <span class="icon">
                                            <i class="fab fa-facebook-f"></i>
                                        </span>
                                            {{substr($eventSocial->facebook, 24)}}
                                        </a>
                                    </li>
                                @elseif($hostSocial->facebook)
                                    <li>
                                        <a href="{{$hostSocial->facebook}}" target="_blank">
                                        <span class="icon">
                                            <i class="fab fa-facebook-f"></i>
                                        </span>
                                            {{substr($hostSocial->facebook, 24)}}
                                        </a>
                                    </li>
                                @endif
                                @if($eventSocial->twitter)
                                    <li>
                                        <a href="{{$eventSocial->twitter}}" target="_blank">
                                            <span class="icon">
                                                <i class="fab fa-twitter"></i>
                                            </span>
                                            {{'@'.substr($eventSocial->twitter, 20)}}
                                        </a>
                                    </li>
                                    @elseif($hostSocial->twitter)
                                    <li>
                                        <a href="{{$hostSocial->twitter}}" target="_blank">
                                        <span class="icon">
                                            <i class="fab fa-twitter"></i>
                                        </span>
                                            {{'@'.substr($hostSocial->twitter, 20)}}
                                        </a>
                                    </li>
                                @endif
                                @if($eventSocial->tadvisor)
                                    <li>
                                        <a href="{{$eventSocial->tadvisor}}" target="_blank">
                                        <span class="icon">
                                            <i class="fab fa-tripadvisor"></i>
                                        </span>
                                            {{substr($eventSocial->tadvisor, 12, 15)}}
                                        </a>
                                    </li>
                                @elseif($hostSocial->tadvisor)
                                        <li>
                                            <a href="{{$hostSocial->tadvisor}}" target="_blank">
                                            <span class="icon">
                                                <i class="fab fa-tripadvisor"></i>
                                            </span>
                                                {{substr($hostSocial->tadvisor, 12, 15).'...'}}
                                            </a>
                                        </li>
                                @endif
                                @if($eventSocial->website)
                                    <li>
                                        <a href="{{$eventSocial->website}}" target="_blank">
												<span class="icon">
													<i class="fas fa-link"></i>
												</span>
                                            {{__('all.website')}}
                                        </a>
                                    </li>
                                @elseif($hostSocial->website)
                                    <li>
                                        <a href="{{$hostSocial->website}}" target="_blank">
                                            <span class="icon">
                                                <i class="fas fa-link"></i>
                                            </span>
                                            {{__('all.website')}}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endif
                    <!-- location-wrapper - end -->
                    <!-- spacial-event-wrapper - start -->
                    <div class="spacial-event-wrapper text-center" style="background-image: url(@foreach($hostPhotos as $hostPhoto) @if ($loop->first) {{asset($hostPhoto->file)}} @endif @endforeach);">
                        <div class="overlay-black">
                            <p class="sub-title white-color mb-30">{{__('all.eventHost')}}</p>
                            <h2 class="title-large white-color mb-30">
                                <strong class="yellow-color">{{__('all.hostCat-'.$hostCategory->id)}}</strong>
                                {{$host->name}}
                            </h2>
                            <a href="{{route('host.show',[app()->getLocale(),$host->slug])}}" class="custom-btn">{{__('all.viewProf')}}</a>
                        </div>
                    </div>
                    <!-- spacial-event-wrapper - end -->

                </div>
            </div>
            <!-- sidebar-section - end -->
            <div class="col-lg-12">
                @if(!$simEvents->isEmpty())
                    <section id="event-section" class="event-section sec-ptb-100 bg-gray-light clearfix">
                        <div class="container">
                            <div class="mb-50">
                                <div class="row">
                                    <!-- section-title - start -->
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="section-title text-left">
                                            <span class="line-style"></span>
                                            <h2 class="big-title"><strong>{{__('all.similar')}}</strong> {{__('all.events')}}</h2>
                                        </div>
                                    </div>
                                    <!-- section-title - end -->
                                </div>
                            </div>
                            <!-- tab-content - start -->
                            <div class="tab-content">
                                @if(!$simEvents->isEmpty())
                                        <!-- conference-event - start -->
                                <div id="conference-event" class="tab-pane active fade show">
                                    <div class="row">
                                        @foreach($simEvents as $simEvent)
                                                <!-- event-item - start -->
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="event-item2 clearfix">
                                                <!-- event-image - start -->
                                                <div class="event-image">
                                                    @if($simEvent->date_from)
                                                        <div class="post-date">
                                                            <span class="date">{{$simEvent->date_from->format('d')}}</span>
                                                            <small class="month">{{$simEvent->date_from->format('M')}}</small>
                                                        </div>
                                                    @endif
                                                    <img src="
                                                @if(!$simEvent->photos->isEmpty())
                                                    @foreach($simEvent->photos as $simEventPhoto)
                                                        @if ($loop->first)
                                                            {{asset($simEventPhoto->file)}}
                                                        @endif
                                                    @endforeach
                                                        @elseif(!$simEvent->owner->photos->isEmpty())
                                                    @foreach($simEvent->owner->photos as $simHostPhoto)
                                                        @if ($loop->first)
                                                            {{asset($simHostPhoto->file)}}
                                                        @endif
                                                    @endforeach
                                                @endif " alt="event photo">
                                                </div>
                                                <!-- event-image - end -->

                                                <!-- event-content - start -->
                                                <div class="event-content">
                                                    <div class="event-title mb-15">
                                                        <h3 class="title">
                                                            {{$simEvent->name}}
                                                        </h3>
                                                        <span class="ticket-price yellow-color">{{__('all.eventCat-'.$simEvent->category->id)}}</span>
                                                    </div>
                                                    <div class="event-post-meta ul-li-block mb-30">
                                                        <ul>
                                                            @if($simEvent->time_from OR $simEvent->time_to)
                                                                <li>
                                                            <span class="icon">
                                                                <i class="far fa-clock"></i>
                                                            </span>
                                                                    {{$simEvent->time_from}} {{$simEvent->time_to?"~ ".$simEvent->time_to:''}}
                                                                </li>
                                                            @endif
                                                            @if($simEvent->location)
                                                                <li>
                                                            <span class="icon">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                            </span>
                                                                    {{$simEvent->location}}
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <a href="{{route('event.show',[app()->getLocale(),$simEvent->id])}}" class="tickets-details-btn">
                                                        {{__('all.moreDetails')}}
                                                    </a>
                                                </div>
                                                <!-- event-content - end -->

                                            </div>
                                        </div>
                                        @endforeach
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
    @if($event->lat AND $event->lng)
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
                center: ol.proj.fromLonLat([{{$event->lat}}
                    , {{$event->lng}}
                ]),
                zoom: 15
            })
        });
        var layer = new ol.layer.Vector({
            source: new ol.source.Vector({
                features: [
                    new ol.Feature({
                        geometry: new ol.geom.Point(ol.proj.fromLonLat([{{$event->lat}}
                            , {{$event->lng}}
                        ]))
                    })
                ]
            })
        });
        map.addLayer(layer);
    </script>
    @else
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
    @endif
@endsection