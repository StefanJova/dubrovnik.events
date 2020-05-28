@extends('layouts.admin')
@section('content')
<!-- event-section - start
================================================== -->
<section id="event-section" class="event-section bg-gray-light sec-ptb-100 clearfix">
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success" role="alert" style="margin: 0 auto; width:fit-content;">
                {{ session('status') }}
            </div>
        @endif
            <br>
            <div class="breadcrumb-title text-center mb-50">
                    <h2 class="big-title"><strong>Reservations</strong></h2>
            </div>

            <div class="row justify-content-center">
            <!-- - start -->
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="tab-content">
                    <div id="list-style" class="tab-pane fade in active show">
                    @foreach($reservations as $reservation)
                        <!-- reservation-item - start -->
                        <div class="event-list-item clearfix">

                            <!-- reservation-image - start -->
                            <div class="event-image">
                                @if($reservation->date)
                                <div class="post-date">
                                    <span class="date">{{$reservation->date->format('d')}}</span>
                                    <small class="month">{{$reservation->date->format('M')}}</small>
                                </div>
                                @endif
                                <img src="
                                    @if(!$reservation->owner->photos->isEmpty())
                                        @foreach($reservation->owner->photos as $hostPhoto)
                                            @if ($loop->first)
                                                {{asset($hostPhoto->file)}}
                                            @endif
                                        @endforeach
                                    @endif
                                {{--@endif--}}
                               " alt="host photo">
                            </div>
                            <!-- res-image - end -->

                            <!-- res-content - start -->
                            <div class="event-content">
                                <div class="event-title mb-15">
                                    @if($reservation->owner->name)
                                        <a href="{{route('host.show',[app()->getLocale(),$reservation->owner->slug])}}">
                                            <h3 class="title">
                                                {{$reservation->owner->category->name}} <strong>{{$reservation->owner->name}}</strong>
                                            </h3>
                                        </a>
                                    @endif
                                    @if($reservation->event_id)
                                        {{' | '}}
                                        <a href="{{route('event.show',[app()->getLocale(),$reservation->event->id])}}">
                                            <h3 class="title">
                                                <strong>{{$reservation->event->name}}</strong>
                                            </h3>
                                        </a>
                                    @endif

                                        <br>
                                    <span class="ticket-price yellow-color">
                                       @if($reservation->date)
                                           {{$reservation->date->format('d.m.Y')}}
                                       @endif
                                       @if($reservation->time)
                                           {{$reservation->time}}
                                       @endif
                                    </span>
                                </div>
                                @if($reservation->name)
                                <p class="discription-text mb-30">
                                    {{$reservation->desc}}
                                </p>
                                @endif
                                <div class="event-info-list ul-li clearfix">
                                    <ul>
                                        @if($reservation->name)
                                        <li>
                                            <span class="icon">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <div class="info-content">
                                                <small>Name</small>
                                                <h3>{{$reservation->name}}</h3>
                                            </div>
                                        </li>
                                        @endif
                                        @if($reservation->num_people)
                                        <li>
                                            <span class="icon">
                                                <i class="fas fa-users"></i>
                                            </span>
                                            <div class="info-content">
                                                <small>Number of people</small>
                                                <h3>{{$reservation->num_people}}</h3>
                                            </div>
                                        </li>
                                        @endif
                                        @if($reservation->email)
                                        <li>
                                            <span class="icon">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <div class="info-content">
                                                <small>Email</small>
                                                <h3>{{$reservation->email}}</h3>
                                            </div>
                                        </li>
                                        @endif
                                        @if($reservation->phone)
                                        <li>
                                            <span class="icon">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                            <div class="info-content">
                                                <small>Phone</small>
                                                <h3>{{$reservation->phone}}</h3>
                                            </div>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="event-info-list ul-li clearfix">
                                    <ul>
                                        @if($reservation->done==0)
                                        <li>
                                            <a href="{{route('reservation.done',[app()->getLocale(),$reservation->id])}}" class="zeleni-btn">
                                               Done
                                            </a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{route('reservation.undone',[app()->getLocale(),$reservation->id])}}" class="crveni-btn">
                                                Undone
                                            </a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="{{route('reservation.del',[app()->getLocale(),$reservation->id])}}" class="hell-btn">
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- res-content - end -->

                        </div>
                        <!-- reservation-item - end -->
                    @endforeach


                        <div class="pagination ul-li clearfix">
                            <ul>
                                {{$reservations->links()}}
                            </ul>
                        </div>

                    </div>

                    <div id="grid-style" class="tab-pane fade">
                        <div class="row justify-content-center">

                            <!-- event-grid-item - start -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="event-grid-item">
                                    <!-- event-image - start -->
                                    <div class="event-image">
                                        <div class="post-date">
                                            <span class="date">26</span>
                                            <small class="month">june</small>
                                        </div>
                                        <img src="assets/images/event/1.event-grid.jpg" alt="Image_not_found">
                                    </div>
                                    <!-- event-image - end -->

                                    <!-- event-content - start -->
                                    <div class="event-content">
                                        <div class="event-title mb-30">
                                            <h3 class="title">
                                                Barcelona Food Truck Festival 2018-2019
                                            </h3>
                                            <span class="ticket-price yellow-color">Tickets from $52</span>
                                        </div>
                                        <div class="event-post-meta ul-li-block mb-30">
                                            <ul>
                                                <li>
															<span class="icon">
																<i class="far fa-clock"></i>
															</span>
                                                    Start 20:00pm - 22:00pm
                                                </li>
                                                <li>
															<span class="icon">
																<i class="fas fa-map-marker-alt"></i>
															</span>
                                                    Manhattan, New York
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#!" class="tickets-details-btn">
                                            tickets & details
                                        </a>
                                    </div>
                                    <!-- event-content - end -->
                                </div>
                            </div>
                            <!-- event-grid-item - end -->

                            <!-- event-grid-item - start -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="event-grid-item">
                                    <!-- event-image - start -->
                                    <div class="event-image">
                                        <div class="post-date">
                                            <span class="date">26</span>
                                            <small class="month">june</small>
                                        </div>
                                        <img src="assets/images/event/2.event-grid.jpg" alt="Image_not_found">
                                    </div>
                                    <!-- event-image - end -->

                                    <!-- event-content - start -->
                                    <div class="event-content">
                                        <div class="event-title mb-30">
                                            <h3 class="title">
                                                Barcelona Food Truck Festival 2018-2019
                                            </h3>
                                            <span class="ticket-price yellow-color">Tickets from $52</span>
                                        </div>
                                        <div class="event-post-meta ul-li-block mb-30">
                                            <ul>
                                                <li>
															<span class="icon">
																<i class="far fa-clock"></i>
															</span>
                                                    Start 20:00pm - 22:00pm
                                                </li>
                                                <li>
															<span class="icon">
																<i class="fas fa-map-marker-alt"></i>
															</span>
                                                    Manhattan, New York
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#!" class="tickets-details-btn">
                                            tickets & details
                                        </a>
                                    </div>
                                    <!-- event-content - end -->
                                </div>
                            </div>
                            <!-- event-grid-item - end -->

                            <!-- event-grid-item - start -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="event-grid-item">
                                    <!-- event-image - start -->
                                    <div class="event-image">
                                        <div class="post-date">
                                            <span class="date">26</span>
                                            <small class="month">june</small>
                                        </div>
                                        <img src="assets/images/event/1.event-grid.jpg" alt="Image_not_found">
                                    </div>
                                    <!-- event-image - end -->

                                    <!-- event-content - start -->
                                    <div class="event-content">
                                        <div class="event-title mb-30">
                                            <h3 class="title">
                                                Barcelona Food Truck Festival 2018-2019
                                            </h3>
                                            <span class="ticket-price yellow-color">Tickets from $52</span>
                                        </div>
                                        <div class="event-post-meta ul-li-block mb-30">
                                            <ul>
                                                <li>
															<span class="icon">
																<i class="far fa-clock"></i>
															</span>
                                                    Start 20:00pm - 22:00pm
                                                </li>
                                                <li>
															<span class="icon">
																<i class="fas fa-map-marker-alt"></i>
															</span>
                                                    Manhattan, New York
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#!" class="tickets-details-btn">
                                            tickets & details
                                        </a>
                                    </div>
                                    <!-- event-content - end -->
                                </div>
                            </div>
                            <!-- event-grid-item - end -->

                            <!-- event-grid-item - start -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="event-grid-item">
                                    <!-- event-image - start -->
                                    <div class="event-image">
                                        <div class="post-date">
                                            <span class="date">26</span>
                                            <small class="month">june</small>
                                        </div>
                                        <img src="assets/images/event/2.event-grid.jpg" alt="Image_not_found">
                                    </div>
                                    <!-- event-image - end -->

                                    <!-- event-content - start -->
                                    <div class="event-content">
                                        <div class="event-title mb-30">
                                            <h3 class="title">
                                                Barcelona Food Truck Festival 2018-2019
                                            </h3>
                                            <span class="ticket-price yellow-color">Tickets from $52</span>
                                        </div>
                                        <div class="event-post-meta ul-li-block mb-30">
                                            <ul>
                                                <li>
															<span class="icon">
																<i class="far fa-clock"></i>
															</span>
                                                    Start 20:00pm - 22:00pm
                                                </li>
                                                <li>
															<span class="icon">
																<i class="fas fa-map-marker-alt"></i>
															</span>
                                                    Manhattan, New York
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#!" class="tickets-details-btn">
                                            tickets & details
                                        </a>
                                    </div>
                                    <!-- event-content - end -->
                                </div>
                            </div>
                            <!-- event-grid-item - end -->

                            <!-- event-grid-item - start -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="event-grid-item">
                                    <!-- event-image - start -->
                                    <div class="event-image">
                                        <div class="post-date">
                                            <span class="date">26</span>
                                            <small class="month">june</small>
                                        </div>
                                        <img src="assets/images/event/1.event-grid.jpg" alt="Image_not_found">
                                    </div>
                                    <!-- event-image - end -->

                                    <!-- event-content - start -->
                                    <div class="event-content">
                                        <div class="event-title mb-30">
                                            <h3 class="title">
                                                Barcelona Food Truck Festival 2018-2019
                                            </h3>
                                            <span class="ticket-price yellow-color">Tickets from $52</span>
                                        </div>
                                        <div class="event-post-meta ul-li-block mb-30">
                                            <ul>
                                                <li>
															<span class="icon">
																<i class="far fa-clock"></i>
															</span>
                                                    Start 20:00pm - 22:00pm
                                                </li>
                                                <li>
															<span class="icon">
																<i class="fas fa-map-marker-alt"></i>
															</span>
                                                    Manhattan, New York
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#!" class="tickets-details-btn">
                                            tickets & details
                                        </a>
                                    </div>
                                    <!-- event-content - end -->
                                </div>
                            </div>
                            <!-- event-grid-item - end -->

                            <!-- event-grid-item - start -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="event-grid-item">
                                    <!-- event-image - start -->
                                    <div class="event-image">
                                        <div class="post-date">
                                            <span class="date">26</span>
                                            <small class="month">june</small>
                                        </div>
                                        <img src="assets/images/event/2.event-grid.jpg" alt="Image_not_found">
                                    </div>
                                    <!-- event-image - end -->

                                    <!-- event-content - start -->
                                    <div class="event-content">
                                        <div class="event-title mb-30">
                                            <h3 class="title">
                                                Barcelona Food Truck Festival 2018-2019
                                            </h3>
                                            <span class="ticket-price yellow-color">Tickets from $52</span>
                                        </div>
                                        <div class="event-post-meta ul-li-block mb-30">
                                            <ul>
                                                <li>
															<span class="icon">
																<i class="far fa-clock"></i>
															</span>
                                                    Start 20:00pm - 22:00pm
                                                </li>
                                                <li>
															<span class="icon">
																<i class="fas fa-map-marker-alt"></i>
															</span>
                                                    Manhattan, New York
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#!" class="tickets-details-btn">
                                            tickets & details
                                        </a>
                                    </div>
                                    <!-- event-content - end -->
                                </div>
                            </div>
                            <!-- event-grid-item - end -->

                            <!-- pagination - start -->
                            <div class="pagination ul-li clearfix">
                                <ul>
                                    <li class="page-item prev-item">
                                        <a class="page-link" href="#!">Prev</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#!">01</a></li>
                                    <li class="page-item active"><a class="page-link" href="#!">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#!">03</a></li>
                                    <li class="page-item"><a class="page-link" href="#!">04</a></li>
                                    <li class="page-item"><a class="page-link" href="#!">05</a></li>
                                    <li class="page-item next-item">
                                        <a class="page-link" href="#!">Next</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- pagination - end -->

                        </div>
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