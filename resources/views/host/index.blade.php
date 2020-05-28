@extends('layouts.app')
@section('description')
    <title>{{ config('app.name', 'Dubrovnik Events') }}</title>
    <meta name="description" content="Looking for places to go and see in Dubrovnik? Find all the best places and events in Dubrovnik, browse landmarks, restaurants, pubs, and much more.">
@endsection
@section('content')
        <!-- event-search-section - start
		================================================== -->
<section id="event-search-section" class="event-search-section clearfix" style="background-image: url({{asset('images/searchBg.jpg')}});">
    <div class="container">
        <div class="row">
            <!-- section-title - start -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="section-title">
                    <small class="sub-title">{{__('all.bestPlaces')}}</small>
                    <h2 class="big-title">{{__('all.places')}} <strong>{{__('all.search')}}</strong></h2>
                </div>
            </div>
            <!-- section-title - end -->

            <!-- search-form - start -->
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="search-form form-wrapper">
                    {!! Form::open(['method'=>'GET','route' =>['host.index' ,'locale'=>app()->getLocale()]]) !!}

                    <ul>
                        <li>
                            <span class="title">{{__('all.keyword')}}</span>
                            <div class="form-item">
                                <input type="search" name="name" placeholder="{{__('all.typePN')}}" value="{{$typed?$typed:''}}">
                            </div>
                        </li>
                        <li>
                            <span class="title">{{__('all.category')}}</span>
                            <select id="event-category-select" name="host_category_id">
                                <option value="0">{{__('all.any')}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"{{$selectedCategory==$category->id ? 'selected':''}}>{{__('all.hostCat-'.$category->id)}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <button type="submit" class="submit-btn">{{__('all.searchPlaces')}}</button>
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
                    @if(count($hosts)>0)
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
                                    <span class="ticket-price yellow-color">{{__('all.hostCat-'.$host->category->id)}}</span>
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
                                                    <small>{{__('all.location')}}</small>
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
                                                    <small>{{__('all.open')}}</small>
                                                    <h3>{{$host->info->opening}} {{$host->info->closing?"~ ".$host->info->closing:''}}</h3>
                                                </div>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{route('host.show',[app()->getLocale(),$host->slug])}}" class="tickets-details-btn">
                                                {{__('all.moreDetails')}}
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
                    @else
                        <h2>{{__('all.noResults')}}</h2>
                    @endif
                </div>

            </div>
            <!-- - end -->

        </div>
    </div>
</section>
<!-- event-section - end
================================================== -->
@endsection