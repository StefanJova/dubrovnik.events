@extends('layouts.admin')
@section('content')
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
                                <small class="sub-title">Create a new place to see</small>
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
                                    {!! Form::open(['method'=>'POST','route' => [ 'landmark.store' ,app()->getLocale()]]) !!}
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
                                                <input type="text" name="lng" placeholder="Longitude">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-item">
                                                <input type="text" name="lat" placeholder="Latitude">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-item">
                                                <textarea name="desc_en" rows="5" placeholder="English Description" style="background-color:#ffffff!important;"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-item">
                                                <textarea name="desc_hr" rows="5" placeholder="Croatian Description" style="background-color:#ffffff!important;"></textarea>
                                            </div>
                                        </div>
                                    </div> {{--row end--}}
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
