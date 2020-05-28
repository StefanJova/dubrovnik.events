@extends('layouts.admin')
@section('content')
        <!-- event-search-section - start
		================================================== -->
<section id="event-search-section" class="event-search-section clearfix" style="background-image: url({{asset('images/searchBg.jpg')}});">
    <div class="container">
        <div class="row">
            <!-- section-title - start -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="section-title">
                    <small class="sub-title">Find the best places in Dubrovnik</small>
                    <h2 class="big-title">host <strong>Search</strong></h2>
                </div>
            </div>
            <!-- section-title - end -->

            <!-- search-form - start -->
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="search-form form-wrapper">
                    {!! Form::open(['method'=>'GET','route' =>['admin.hosts' ,'locale'=>app()->getLocale()]]) !!}

                    <ul>
                        <li>
                            <span class="title">keyword</span>
                            <div class="form-item">
                                <input type="search" name="name" placeholder="Event name" value="{{$typed?$typed:''}}">
                            </div>
                        </li>
                        <li>
                            <span class="title">category</span>
                            <select id="event-category-select" name="host_category_id">
                                <option value="0">Any</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"{{$selectedCategory==$category->id ? 'selected':''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <button type="submit" class="submit-btn">search event now</button>
                        </li>
                    </ul>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- search-form - end -->

        </div>
    </div>
</section>
<!-- event-search-section - end
================================================== -->
<!-- event-section - start
================================================== -->
<section id="event-section" class="event-section bg-gray-light sec-ptb-100 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <!-- - start -->
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="tab-content">
                    <div id="list-style" class="tab-pane active">
                        @foreach($hosts as $host)
                                <!-- event-item - start -->
                        <div class="event-list-item clearfix">

                            <!-- event-image - start -->
                            <div class="event-image">
                                <img src="
                                @if(!$host->photos->isEmpty())
                                @foreach($host->photos as $hostPhoto)
                                @if ($loop->first)
                                {{asset($hostPhoto->file)}}
                                @endif
                                @endforeach
                                @endif " alt="host photo">
                            </div>
                            <!-- event-image - end -->

                            <!-- event-content - start -->
                            <div class="event-content">
                                <div class="event-title mb-15">
                                    <h3 class="title">
                                        @if($host->name)
                                            <strong>{{$host->name}}</strong>
                                        @endif
                                    </h3>
                                    <span class="ticket-price yellow-color">{{$host->category->name}}</span>
                                </div>
                                <p class="discription-text mb-30">
                                    {{substr($host->desc,0, 170).'...'}}
                                </p>
                                <div class="event-info-list ul-li clearfix">
                                    <ul>
                                        @if($host->location)
                                            <li>
                                            <span class="icon">
                                                <i class="fas fa-map-marker"></i>
                                            </span>
                                                <div class="info-content">
                                                    <small>Location</small>
                                                    <h3>{{$host->location}}</h3>
                                                </div>
                                            </li>
                                        @endif
                                        @if($host->info->opening OR $host->info->closing)
                                            <li>
                                            <span class="icon">
                                                <i class="fas fa-clock"></i>
                                            </span>
                                                <div class="info-content">
                                                    <small>Time</small>
                                                    <h3>{{$host->info->opening}} {{$host->info->closing?"~ ".$host->info->closing:''}}</h3>
                                                </div>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{route('host.show',[app()->getLocale(),$host->slug])}}" class="tickets-details-btn">
                                                More details
                                            </a>
                                        </li>
                                            <li>
                                                <a href="{{route('host.edit',[app()->getLocale(),$host->id])}}" class="tickets-details-btn">
                                                    Edit host
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
                        <div class="pagination ul-li clearfix">
                            <ul>
                                {{$hosts->links()}}
                            </ul>
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