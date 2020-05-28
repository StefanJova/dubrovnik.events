@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
    <style>
        /*section {*/
        /*padding: 60px 0;*/
        /*}*/
        /*#tabs h6.section-title{*/
        /*color: #eee;*/
        /*}*/

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
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#detailsTab" role="tab" aria-controls="nav-profile" aria-selected="false">Details</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#socialTab" role="tab" aria-controls="nav-contact" aria-selected="false">Social Media</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#amenitiesTab" role="tab" aria-controls="nav-contact" aria-selected="false">Amenities</a>
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
                                                        {!! Form::model($host,['method'=>'PATCH','route' => [ 'host.update' ,app()->getLocale(),$host->id]]) !!}
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="name" placeholder="Name" value="{{$host->name!=null?$host->name:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="location" placeholder="location" value="{{$host->location!=null?$host->location:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="phone" placeholder="Phone" value="{{$host->phone!=null?$host->phone:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="email" name="email" placeholder="Email" value="{{$host->email!=null?$host->email:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <textarea name="desc" rows="5" placeholder="Description" style="background-color:#ffffff!important;">{{$host->desc!=null?$host->desc:''}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-item">
                                                                    <select class="country-select" name="accept_reservations">
                                                                        <option>Reservations</option>
                                                                        <option value="0" {{$host->accept_reservations==0?'selected':''}}>No</option>
                                                                        <option value="1" {{$host->accept_reservations==1?'selected':''}}>Yes</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-item">
                                                                    <select class="country-select" name="host_category_id">
                                                                        @foreach($categories as $category)
                                                                            <option value="{{$category->id}}" {{$host->host_category_id==$category->id?'selected':''}}>{{$category->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-item">
                                                                    <select class="country-select" name="featured">
                                                                        <option selected disabled>Featured</option>
                                                                        <option value="0" {{$host->featured==0?'selected':''}}>No</option>
                                                                        <option value="1" {{$host->featured==1?'selected':''}}>Yes</option>
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
                        {{--2nd tab--}}
                        <div class="tab-pane fade" id="detailsTab" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                                                        {!! Form::model($host,['method'=>'PATCH','route' => [ 'host.updateDetails' ,app()->getLocale(),$host->id]]) !!}                                                        <div class="row">
                                                            <input type="hidden" name="owner_id" value="{{$host->id}}">
                                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="opening" value="{{$hostDetails->opening!=null?$hostDetails->opening:''}}" placeholder="Opening eg. 14:00">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="closing" value="{{$hostDetails->closing!=null?$hostDetails->closing:''}}" placeholder="Closing eg. 20:00">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="number" name="capacity" value="{{$hostDetails->capacity!=null?$hostDetails->capacity:''}}" placeholder="Capacity">
                                                                </div>
                                                            </div>
                                                        </div> {{--row end--}}
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="lng" value="{{$hostDetails->lng!=null?$hostDetails->lng:''}}" placeholder="Longitude">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="lat" value="{{$hostDetails->lat!=null?$hostDetails->lat:''}}" placeholder="Latitude">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--<!-- form-item-group - end -->--}}
                                                        <div class="text-center">
                                                            <button type="submit" class="custom-btn">
                                                                Edit
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
                        </div>
                        {{--3rd tab--}}
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
                                                        {!! Form::model($host,['method'=>'PATCH','route' => [ 'host.updateSocial' ,app()->getLocale(),$host->id]]) !!}
                                                        <input type="hidden" name="owner_id" value="{{$host->id}}">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="instagram" value="{{$hostSocial->instagram!=null?$hostSocial->instagram:''}}" placeholder="Instagram url">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="facebook" value="{{$hostSocial->facebook!=null?$hostSocial->facebook:''}}" placeholder="Facebook url">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="twitter" value="{{$hostSocial->twitter!=null?$hostSocial->twitter:''}}" placeholder="Twitter url">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="tadvisor" value="{{$hostSocial->tadvisor!=null?$hostSocial->tadvisor:''}}" placeholder="TripAdvisor url">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="website" value="{{$hostSocial->website!=null?$hostSocial->website:''}}" placeholder="Website url">
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
                        {{--4rd tab--}}
                        <div class="tab-pane fade" id="amenitiesTab" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <section id="booking-section" class="booking-section bg-gray-light sec-ptb-100 clearfix">
                                <div class="container">
                                    <div class="row">
                                        <!-- booking-content-wrapper - start -->
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <style>
                                                .checkAmenities{
                                                    display:inline!important;
                                                    height: auto!important;
                                                    width: auto!important;
                                                    margin-right: 10px;
                                                }

                                            </style>
                                            <div class="booking-content-wrapper">
                                                <!-- billing-info - start -->
                                                <div class="billing-info mb-50">
                                                    <!-- billing-form - start -->
                                                    <div class="billing-form form-wrapper">
                                                        {!! Form::model($host,['method'=>'PATCH','route' => [ 'host.updateAmenities' ,app()->getLocale(),$host->id]]) !!}
                                                        <input type="hidden" name="owner_id" value="{{$host->id}}">
                                                        <div class="row">

                                                            @foreach($icons as $icon)
                                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                                    <div class="form-item">
                                                                        <script>
                                                                            $(document).ready(function(){
                                                                                $('#checkbox-{{$icon->id}}').click(function(){
                                                                                    if($(this).prop("checked") == true){
                                                                                        $("#checkbox-{{$icon->id}}").attr("checked", true);
                                                                                    }
                                                                                    else if($(this).prop("checked") == false){
                                                                                        $("#checkbox-{{$icon->id}}").attr("checked", false);
                                                                                    }
                                                                                });
                                                                            });
                                                                        </script>
                                                                        <input class="checkAmenities" type="checkbox" id="checkbox-{{$icon->id}}" name="{{$icon->col_name}}" value="1"
                                                                                {{$amenities[$icon->col_name]=='1'?'checked':''}}
                                                                        >
                                                                        <label for="checkbox-{{$icon->id}}">{{$icon->title}}</label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
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
                                                        {!! Form::open(['method'=>'DELETE','route'=>['host.destroyPhoto',app()->getLocale(),$photo->id],'class'=>'destroyPhotoForm-'.$photo->id]) !!}
                                                        <figure class="destroyPhotoBtn-{{$photo->id}} remove-image"><i class="fa fa-times"></i></figure>
                                                        {!! form::close() !!}
                                                        <img src="{{$photo->file}}">
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!--File upload-->
                                            {!! Form::open(['method'=>'POST','route'=>['host.storePhotos',app()->getLocale(),$host->id],'id'=>'my-awesome-dropzone', 'class'=>'dropzone']) !!}
                                            <input type="hidden" name="owner_id" value="{{$host->id}}">
                                            {!! Form::close() !!}
                                            {{--<style>--}}
                                                {{--.dz-max-files-reached {background-color: red}--}}
                                                {{--.dz-error-message{--}}
                                                    {{--display: none!important;--}}
                                                {{--}--}}
                                                {{--.dz-error-mark{--}}
                                                    {{--opacity: 0!important;--}}
                                                    {{--display: none!important;--}}

                                                {{--}--}}
                                                {{--.dz-success-mark{--}}
                                                    {{--opacity:1!important;--}}
                                                {{--}--}}
                                            {{--</style>--}}

                                            <hr>
                                            {{--<a href="{{route('realestate.update',['locale'=>app()->getLocale(),'realestate'=>$realestate->id])}}" class="btn btn-primary ts-btn-arrow btn-lg float-right">{{__('all.toRE')}}</a>--}}
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