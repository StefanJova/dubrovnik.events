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
                            <h2 class="big-title">Additional <strong>info</strong></h2>
                        </div>
                        <!-- section-title - end -->

                        <!-- billing-form - start -->
                        <div class="billing-form form-wrapper">
                            {!! Form::open(['method'=>'POST','route' => [ 'host.storeDetails' ,app()->getLocale()]]) !!}
                            <div class="row">
                                <input type="hidden" name="owner_id" value="{{$host->id}}">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="text" name="opening" placeholder="Opening eg. 14:00">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="text" name="closing" placeholder="Closing eg. 20:00">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="number" name="capacity" placeholder="Capacity">
                                    </div>
                                </div>
                            </div> {{--row end--}}
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="text" name="lng" placeholder="Longitude">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="text" name="lat" placeholder="Latitude">
                                    </div>
                                </div>
                            </div>
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