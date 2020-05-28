@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
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

        #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            /*color: #f3f3f3;*/
            background-color: transparent;
            border-color: transparent transparent #f3f3f3;
            border-bottom: 4px solid !important;
            font-size: 20px;
            font-weight: bold;
        }
        #tabs .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            /*color: #eee;*/
            font-size: 20px;
        }
    </style>
    @endsection
    @section('content')
            <!-- contact-section - start
		================================================== -->

    @if(count($errors)>0)
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="col-sm-4 offset-sm-4 alert alert-success alert-block" style="margin-top:50px; ">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <section id="tabs" style="margin-top:50px; ">
        <div class="container">
            <h6 class="section-title h1">Edit</h6>
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#mainTab" role="tab" aria-controls="nav-home" aria-selected="true">Main Info</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#socialTab" role="tab" aria-controls="nav-contact" aria-selected="false">Social Media</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#photosTab" role="tab" aria-controls="nav-contact" aria-selected="false">Photos</a>

                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        {{--1st tab--}}
                        <div class="tab-pane fade show active" id="mainTab" role="tabpanel" aria-labelledby="nav-home-tab">
                            <section id="booking-section" class="booking-section bg-gray-light sec-ptb-100 clearfix">
                                <div class="container">
                                    <div class="row">
                                        <!-- booking-content-wrapper - start -->
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="booking-content-wrapper">
                                                <!-- billing-info - start -->
                                                <div class="billing-info mb-50">
                                                    <!-- billing-form - start -->
                                                    <div class="billing-form form-wrapper">
                                                        {!! Form::model($event,['method'=>'PATCH','route' => [ 'event.update' ,app()->getLocale(),$event->id]]) !!}
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-item">
                                                                    <select class="country-select" name="owner_id">
                                                                        <option selected disabled>Host</option>
                                                                        @foreach($hosts as $host)
                                                                            <option value="{{$host->id}}" {{$event->owner_id==$host->id?'selected':''}}>{{$host->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-item">
                                                                    <select class="country-select" name="event_category_id">
                                                                        <option selected disabled>Category</option>
                                                                        @foreach($categories as $category)
                                                                            <option value="{{$category->id}}" {{$event->event_category_id==$category->id?'selected':''}}>{{$category->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="name" placeholder="Name" value="{{$event->name?$event->name:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="location" placeholder="Location" value="{{$event->location?$event->location:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <label for="date_from">Date/from</label>
                                                                    <input id="date_from" type="date" name="date_from" value="{{$event->date_from?$event->date_from:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <label for="date_to">Date to</label>
                                                                    <input id="date_to" type="date" name="date_to" value="{{$event->date_to?$event->date_to:''}}">
                                                                </div>
                                                            </div>
                                                            <br>
                                                        </div> {{--row end--}}
                                                        <br>
                                                        <div class="row" style="margin-top: 20px;">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input id="time_from" type="text" name="time_from" placeholder="Time/from (format 00:00)" value="{{$event->time_from?$event->time_from:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input id="time_to" type="text" name="time_to" placeholder="Time to (format 00:00)" value="{{$event->time_to?$event->time_to:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input id="lng" type="text" name="lng" placeholder="Longitude" value="{{$event->lng?$event->lng:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input id="lat" type="text" name="lat" placeholder="Latitude" value="{{$event->lat?$event->lat:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <textarea id="desc" name="desc" rows="5" placeholder="Description" style="background-color:#ffffff!important;">{{$event->desc?$event->desc:''}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-item">
                                                                    <select class="country-select" name="featured">
                                                                        <option selected disabled>Featured</option>
                                                                        <option value="0" {{$event->featured==0?'selected':''}}>No</option>
                                                                        <option value="1" {{$event->featured==1?'selected':''}}>Yes</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-item">
                                                                    <select class="country-select" name="accept_reservations">
                                                                        <option selected disabled>Accept reservations</option>
                                                                        <option value="0" {{$event->accept_reservations==0?'selected':''}}>No</option>
                                                                        <option value="1" {{$event->accept_reservations==1?'selected':''}}>Yes</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> {{--row end--}}
                                                                <!-- form-item-group - end -->
                                                        <div class="text-center">
                                                            <button type="submit" class="custom-btn">
                                                                Edit
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
                        </div>
                        {{--2rd tab--}}
                        <div class="tab-pane fade" id="socialTab" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <section id="booking-section" class="booking-section bg-gray-light sec-ptb-100 clearfix">
                                <div class="container">
                                    <div class="row">
                                        <!-- booking-content-wrapper - start -->
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="booking-content-wrapper">
                                                <!-- billing-info - start -->
                                                <div class="billing-info mb-50">
                                                    <!-- billing-form - start -->
                                                    <div class="billing-form form-wrapper">
                                                        {!! Form::model($event,['method'=>'PATCH','route' => [ 'event.updateSocial' ,app()->getLocale(),$event->id]]) !!}
                                                        <input type="hidden" name="owner_id" value="{{$event->id}}">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="instagram" value="{{$eventSocial->instagram!=null?$eventSocial->instagram:''}}" placeholder="Instagram url">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="facebook" value="{{$eventSocial->facebook!=null?$eventSocial->facebook:''}}" placeholder="Facebook url">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="twitter" value="{{$eventSocial->twitter!=null?$eventSocial->twitter:''}}" placeholder="Twitter url">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="tadvisor" value="{{$eventSocial->tadvisor!=null?$eventSocial->tadvisor:''}}" placeholder="TripAdvisor url">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="website" value="{{$eventSocial->website!=null?$eventSocial->website:''}}" placeholder="Website url">
                                                                </div>
                                                            </div>
                                                        </div> {{--row end--}}
                                                                <!-- form-item-group - end -->
                                                        <div class="text-center">
                                                            <button type="submit" class="custom-btn">
                                                                Edit
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
                        </div>
                        {{--5th tab--}}
                        <div class="tab-pane fade" id="photosTab" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <section id="submit-form3">
                                <div class="container">
                                    <div class="row">
                                        <div class="offset-lg-1 col-lg-10">
                                            <!--Uploaded images-->
                                            <div class="file-uploaded-images" style="margin: 0 auto;">
                                                <div class="row">
                                                    @foreach($photos as $photo)
                                                            <!--Image-->
                                                    <div class="image">
                                                        <script>
                                                            $(document).ready(function(){
                                                                $(".destroyPhotoBtn-{{$photo->id}}").click(function(){
                                                                    $(".destroyPhotoForm-{{$photo->id}}").submit();
                                                                });
                                                            });
                                                        </script>
                                                        {!! Form::open(['method'=>'DELETE','route'=>['event.destroyPhoto',app()->getLocale(),$photo->id],'class'=>'destroyPhotoForm-'.$photo->id]) !!}
                                                        <figure class="destroyPhotoBtn-{{$photo->id}} remove-image"><i class="fa fa-times"></i></figure>
                                                        {!! form::close() !!}
                                                        <img src="{{$photo->file}}">
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!--File upload-->
                                            {!! Form::open(['method'=>'POST','route'=>['event.storePhotos',app()->getLocale(),$event->id],'id'=>'my-awesome-dropzone', 'class'=>'dropzone']) !!}
                                            <input type="hidden" name="event_id" value="{{$event->id}}">
                                            {!! Form::close() !!}
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- contact-section - end
    ================================================== -->
@endsection

@section('scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection