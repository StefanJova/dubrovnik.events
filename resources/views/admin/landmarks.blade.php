@extends('layouts.admin')
@section('content')

<!-- event-section - start
================================================== -->
<section id="event-section" class="event-section bg-gray-light sec-ptb-100 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <!-- - start -->
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="tab-content">
                    <div id="list-style" class="tab-pane active">
                        @foreach($landmarks as $landmark)
                                <!-- event-item - start -->
                        <div class="event-list-item clearfix">
                            <!-- event-image - start -->
                            <div class="event-image">
                                <img src="
                                @if(!$landmark->photos->isEmpty())
                                    @foreach($landmark->photos as $landmarkPhoto)
                                        @if ($loop->first)
                                            {{asset($landmarkPhoto->file)}}
                                        @endif
                                    @endforeach
                                @endif " alt="host photo">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <div class="event-title mb-15">
                                    <h3 class="title">
                                        @if($landmark->name)
                                            <strong>{{$landmark->name}}</strong>
                                        @endif
                                    </h3>
                                    @if($landmark->location)
                                        <span class="ticket-price yellow-color">{{$landmark->location}}</span>
                                    @endif
                                </div>
                                <p class="discription-text mb-30">
                                    {{substr($landmark->desc,0, 170).'...'}}
                                </p>
                                <div class="event-info-list ul-li clearfix">
                                    <ul>
                                        <li>
                                            <a href="{{route('landmark.show',[app()->getLocale(),$landmark->slug])}}" class="tickets-details-btn">
                                                More details
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('landmark.edit',[app()->getLocale(),$landmark->id])}}" class="tickets-details-btn">
                                                Edit
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- event-content - end -->
                        </div>
                        <!-- event-item - end -->
                        @endforeach
                        <!-- event-item - end -->
                    </div>
                </div>

            </div>
            <!-- - end -->

        </div>
    </div>
</section>
<!-- event-section - end
================================================== -->
@endsection