@extends('layouts.admin')
@section('content')
    <section id="error-section" class="error-section sec-ptb-100 bg-gray-light clearfix" >
        <div class="container">
            <div class="row justify-content-center">

                <!-- error-content - start -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="icon">
                        <i class="far fa-smile"></i>
                    </div>
                </div>
                <!-- error-content - end -->
                <!-- error-content - start -->
                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 75px;">
                    <div class="error-content">
                        <h3>Event created!</h3>
                        <a href="/en" class="custom-btn">go back to home</a>
                    </div>
                </div>
                <!-- error-content - end -->

            </div>
        </div>
    </section>
@endsection