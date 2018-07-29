{{--@extends('layouts.app')--}}
@extends('layouts.login')
@section('head')
    <link rel="stylesheet" href="{{ asset("css/login-v3.css") }}">
@stop
@section('title', 'Login')
@section('class', 'page-login-v3')
@section('content')
    <div class="panel">
        {{--@include('flash::message')--}}
        <div class="panel-bodyx">
           {{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Login</div>--}}
                {{--<div class="panel-body">--}}

                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="brand">
                          <a href="http://modart.in/">   <img class="brand-img" style="height: 101px; margin-top: 4%; margin-left: 5%;" src="{{ asset("/images/logo.png") }}" alt="..." ></a>
                        </div>
                        <div class="form-group form-material floating {{ $errors->has('email') ? ' has-error' : '' }} {{ $errors->has('active') ? ' has-error' : '' }} ">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}"/>
                            <label class="floating-label">Username</label>
                              {{--@include('common.errors')--}}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            @if ($errors->has('active'))
                            <span class="help-block">
                            <strong style="color:#f96868;" >{{ $errors->first('active') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group form-material floating">
                            <input type="password" class="form-control" name="password"/>
                            <label class="floating-label">Password</label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group clearfix">
                            <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg pull-left">
                                <input type="checkbox" id="inputCheckbox" name="remember">
                                <label for="inputCheckbox">Remember me</label>
                            </div>
                            <a class="pull-right" href="{{ url('password/reset')}}">Forgot password?</a>
                            {{--<a class="pull-right" href="{{ url('pass/my')}}">Forgot password?</a>--}}
                           {{--<a class="pull-right" href="{{ url('/register') }}">Register</a>--}}
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
                    </form>
                </div>
            </div>
@endsection
@section('end_scripts')
    <script>
        (function (document, window, $) {
            'use strict';
            var Site = window.Site;
            $(document).ready(function () {
                Site.run();
            });
        })(document, window, jQuery);
    </script>
@stop