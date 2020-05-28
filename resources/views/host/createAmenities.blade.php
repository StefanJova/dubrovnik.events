@extends('layouts.admin')
@section('content')
        <!-- contact-section - start
		================================================== -->
<section id="booking-section" class="booking-section bg-gray-light sec-ptb-100 clearfix">
    <div class="container">
        <div class="row">
            <!-- booking-content-wrapper - start -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="booking-content-wrapper">
                    <!-- billing-info - start -->
                    <div class="billing-info mb-50">

                        <!-- section-title - start -->
                        <div class="section-title mb-30">
                            <small class="sub-title">Create a new host</small>
                            <h2 class="big-title">Amenities</h2>
                        </div>
                        <!-- section-title - end -->

                        <!-- billing-form - start -->
                        <div class="billing-form form-wrapper">
                            {!! Form::open(['method'=>'POST','route' => [ 'host.storeAmenities' ,app()->getLocale()]]) !!}
                            <div class="row">
                                <input type="hidden" name="owner_id" value="{{$host->id}}">
                                <style>
                                    .checkAmenities{
                                        display:inline!important;
                                        height: auto!important;
                                        width: auto!important;
                                        margin-right: 10px;
                                    }

                                </style>
                                @foreach($icons as $icon)
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input class="checkAmenities" type="checkbox" id="checkbox-{{$icon->id}}" name="{{$icon->col_name}}" value="1">
                                        <label for="checkbox-{{$icon->id}}">{{$icon->title}}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div> {{--row end--}}
                            {{--<!-- form-item-group - end -->--}}
                            <div class="text-center">
                                <button type="submit" class="custom-btn">
                                    Next
                                </button>
                            </div>
                            {{--{{Form::close()}}--}}
                        </div>
                        <!-- billing-form - end -->
                    </div>
                    <!-- billing-info - end -->
                </div>
            </div>
            <!-- booking-content-wrapper - end -->
        </div>
    </div>
</section>
<!-- contact-section - end
================================================== -->
@endsection