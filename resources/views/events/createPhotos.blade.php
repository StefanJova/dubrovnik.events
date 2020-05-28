@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
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
                                <small class="sub-title">Create a new host</small>
                                <h2 class="big-title">Add <strong>Photos</strong></h2>
                            </div>
                            <!-- section-title - end -->

                            <!-- billing-form - start -->
                            <div class="billing-form form-wrapper">
                                {!! Form::open(['method'=>'POST','route' => [ 'event.storePhotos' ,app()->getLocale()], 'class'=>'dropzone']) !!}
                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                {!! Form::close() !!}
                                <a href="{{route('event.success',app()->getLocale())}}" class="cutom-btn"><button class="custom-btn">Done!</button></a>

                            </div>
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

@section('scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection