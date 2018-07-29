@extends('layouts.app')
@section('content')


    @include('common.errors')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    @include('flash::message')
                    <div class="col-md-8">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <div class="col-md-8">
                        <img  class="imgaskhay"  src="{{URL::asset('/images/events/'.$event->event_image)}}">
                             {{--height="500" width="500" alt="event" >--}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <div class="col-md-8" style="padding-left: 36px;">
                        <h3>  {{ $event->event_name }}</h3>
                       <p style="text-align:justify;"> {{ $event->event_description }}<p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection