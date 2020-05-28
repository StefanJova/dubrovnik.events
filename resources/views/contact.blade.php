@extends('layouts.app')
@section('description')
    <title>Dubrovnik events</title>
    <meta name="description" content="Looking for places to go and see in Dubrovnik? Find all the best places and events in Dubrovnik, browse landmarks, restaurants, pubs, and much more.">
@endsection
@section('content')
<!-- contact-section - start
================================================== -->
<section id="contact-section" class="contact-section sec-ptb-100 clearfix">
    <div class="container">
        <!-- section-title - start -->
        <div class="section-title mb-50">
            <small class="sub-title">{{__('all.contactUs')}}</small>
            <h2 class="big-title">{{__('all.getInTouch')}} <strong>dubrovnik.events</strong></h2>
        </div>
        <!-- section-title - end -->
        <!-- contact-form - start -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="contact-form form-wrapper text-center">
            {!! Form::open(['method'=>'POST','route' =>['contact.send' ,'locale'=>app()->getLocale()]]) !!}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-item">
                            <input type="text" name="name" placeholder="{{__('all.yourName')}}" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-item">
                            <input type="email" name="email" placeholder="{{__('all.emailAddress')}}" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <textarea placeholder="{{__('all.message')}}" name="message" required></textarea>
                        <button type="submit" class="custom-btn">{{__('all.sendEmail')}}</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        <!-- contact-form - end -->
    </div>
</section>
<!-- contact-section - end
================================================== -->
@endsection