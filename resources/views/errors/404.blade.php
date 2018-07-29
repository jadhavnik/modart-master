@extends('layouts.app')
@section('content')

    <div class="col-md-12">

        <div class="row">
            <h3   style="margin-left: 253px;"> Looks like you're lost.Click here to  <a href="{{ url('home')}}" class="link btn-link">go back</a>
            </h3>
            <div class="col-md-6">
            </div>
        </div>
        {{--@include('flash::message')--}}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">

                    <div class="col-md-8">
                        <img  style="margin-left: 160px;" class="imgdemo"  src="{{URL::asset('/images/error/404.gif')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<div class="col-md-12">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-6">--}}
                {{--<div class="form-group clearfix">--}}

                    {{--<div class="col-md-8">--}}
                        {{--<img  style="margin-left: 160px;" class="imgdemo"  src="{{URL::asset('/images/error/404.gif')}}">--}}


                    {{--</div>--}}
                    {{--<h3>  </h3> --}}{{--alt="event" height="500" width="500" >--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection