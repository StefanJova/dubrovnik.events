@extends('layouts.admin')
@section('styles')
        <style>
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            input[type=number] {
                -moz-appearance: textfield;
            }
        </style>
@endsection
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
                            <small class="sub-title">Create a new event</small>
                            <h2 class="big-title">Main <strong>Info</strong></h2>
                        </div>
                        <!-- section-title - end -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- billing-form - start -->
                        <div class="billing-form form-wrapper">
                            {!! Form::open(['method'=>'POST','route' => [ 'event.store' ,app()->getLocale()]]) !!}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-item">
                                        <select class="country-select" name="owner_id">
                                            <option selected disabled>Host</option>
                                            @foreach($hosts as $host)
                                            <option value="{{$host->id}}">{{$host->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-item">
                                        <select class="country-select" name="event_category_id">
                                            <option selected disabled>Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="text" name="location" placeholder="Location">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <label for="date_from">Date/from</label>
                                        <input id="date_from" type="date" name="date_from">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <label for="date_to">Date to</label>
                                        <input id="date_to" type="date" name="date_to">
                                    </div>
                                </div>
                                <br>
                            </div> {{--row end--}}
                            <br>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input id="time_from" type="text" name="time_from" placeholder="Time/from (format 00:00)">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input id="time_to" type="text" name="time_to" placeholder="Time to (format 00:00)">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input id="lng" type="text" name="lng" placeholder="Longitude">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input id="lat" type="text" name="lat" placeholder="Latitude">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        {{--<label for="desc">Description</label>--}}
                                        <textarea id="desc" name="desc" rows="5" placeholder="Description" style="background-color:#ffffff!important;"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-item">
                                        <select class="country-select" name="featured">
                                            <option selected disabled>Featured</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-item">
                                        <select class="country-select" name="accept_reservations">
                                            <option selected disabled>Accept reservations</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- form-item-group - end -->
                            <div class="text-center">
                                <button type="submit" class="custom-btn">
                                    Next
                                </button>
                            </div>
                            {{Form::close()}}
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