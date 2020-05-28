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
                                                        {!! Form::model($landmark,['method'=>'PATCH','route' => [ 'landmark.update' ,app()->getLocale(),$landmark->id]]) !!}
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="name" placeholder="Name" value="{{$landmark->name!=null?$landmark->name:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="location" placeholder="location" value="{{$landmark->location!=null?$landmark->location:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="lng" placeholder="longitude" value="{{$landmark->lng!=null?$landmark->lng:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <input type="text" name="lat" placeholder="latitude" value="{{$landmark->lat!=null?$landmark->lat:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <textarea name="desc_en" rows="5" placeholder="English Description" style="background-color:#ffffff!important;">{{$landmark->desc_en!=null?$landmark->desc_en:''}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                                <div class="form-item">
                                                                    <textarea name="desc_hr" rows="5" placeholder="Croatian Description" style="background-color:#ffffff!important;">{{$landmark->desc_hr!=null?$landmark->desc_hr:''}}</textarea>
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
                                                        {!! Form::open(['method'=>'DELETE','route'=>['landmark.destroyPhoto',app()->getLocale(),$photo->id],'class'=>'destroyPhotoForm-'.$photo->id]) !!}
                                                        <figure class="destroyPhotoBtn-{{$photo->id}} remove-image"><i class="fa fa-times"></i></figure>
                                                        {!! form::close() !!}
                                                        <img src="{{$photo->file}}">
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!--File upload-->
                                            {!! Form::open(['method'=>'POST','route'=>['landmark.storePhotos',app()->getLocale(),$landmark->id],'id'=>'my-awesome-dropzone', 'class'=>'dropzone']) !!}
                                            <input type="hidden" name="places_to_see_id" value="{{$landmark->id}}">
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