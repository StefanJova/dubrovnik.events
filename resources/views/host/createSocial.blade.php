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
                            <h2 class="big-title">Social <strong>Media</strong></h2>
                        </div>
                        <!-- section-title - end -->

                        <!-- billing-form - start -->
                        <div class="billing-form form-wrapper">
                            {!! Form::open(['method'=>'POST','route' => [ 'host.storeSocial' ,app()->getLocale()]]) !!}
                            <input type="hidden" name="owner_id" value="{{$host->id}}">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="text" name="instagram" placeholder="Instagram url">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="text" name="facebook" placeholder="Facebook url">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="text" name="twitter" placeholder="Twitter url">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="text" name="tadvisor" placeholder="TripAdvisor url">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-item">
                                        <input type="text" name="website" placeholder="Website url">
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