@extends('layouts.app')
@section('description')
    <title>{{$landmark->name}}</title>
    @if($landmark->desc_en)
        <meta name="description" content="{{substr($landmark->desc_en,0,150).'...'}}">
    @else
        <meta name="description" content="Looking for places to go and see in Dubrovnik? Find all the best places and events in Dubrovnik, browse landmarks, restaurants, pubs, and much more.">
    @endif
@endsection
@section('styles')
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
@endsection
@section('content')
    <section id="speaker-section" class="speaker-section clearfix">
        <div class="jarallax" style="background-image: url(
            @if(!$landmark->photos->isEmpty())
                @foreach($landmark->photos as $landmarkPhoto)
                    @if ($loop->first)
                        {{asset($landmarkPhoto->file)}}
                    @endif
                @endforeach
            @endif
        );">
            <div class="overlay-white">
                <div class="container">
                    <!-- speaker-carousel - start -->
                    <div class="speaker-carousel">
                        <div class="slider-for">
                            <div class="item">
                                <div class="row">
                                    <!-- speaker-image - start -->
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="speaker-image image-wrapper text-center">
                                            <img src="
                                            @if(!$landmark->photos->isEmpty())
                                                @foreach($landmark->photos as $landmarkPhoto)
                                                    @if ($loop->first)
                                                        {{asset($landmarkPhoto->file)}}
                                                    @endif
                                                @endforeach
                                            @endif
                                            " alt="Image_not_found">
                                        </div>
                                    </div>

                                    <!-- speaker-content - start -->
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="speaker-content">
                                            <!-- section-title - start -->
                                            <div class="section-title text-left mb-50">
                                                <span class="line-style"></span>
                                                <h2 class="big-title"><strong>{{$landmark->name}}</strong></h2>
                                            </div>
                                            <!-- section-title - end -->
                                            <div class="speaker-info">
                                                <div class="speaker-title mb-30">
                                                    <span class="speaker-name"><strong>@if($landmark->location){{$landmark->location}}@endif</strong></span>
                                                </div>
                                                <p class="black-color mb-30">
                                                    {{$landmark['desc_'.app()->getLocale()]}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- speaker-content - end -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- speaker-carousel - end -->

                </div>
            </div>
        </div>
    </section>
    <!-- speaker-section - end
    ================================================== -->
    <section id="map-section" class="map-section clearfix" style="margin-bottom: -25px!important;">
        <!-- map-wrapper - start -->
        <div class="map-wrapper">
            <!-- section-title - start -->
            <!-- section-title - end -->

            <div id="map" style="height: 300px;"></div>
        </div>
        <!-- map-wrapper - end -->
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
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
                center: ol.proj.fromLonLat([{{$landmark->lat}}
                    , {{$landmark->lng}}
                ]),
                zoom: 15
            })
        });
        var layer = new ol.layer.Vector({
            source: new ol.source.Vector({
                features: [
                    new ol.Feature({
                        geometry: new ol.geom.Point(ol.proj.fromLonLat([{{$landmark->lat}}
                            , {{$landmark->lng}}
                        ]))
                    })
                ]
            })
        });
        map.addLayer(layer);

    </script>
@endsection