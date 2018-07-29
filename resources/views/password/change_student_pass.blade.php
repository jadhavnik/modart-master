@extends('layouts.app')
@section('content')
    {{--@include('common.errors')--}}
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{ Form::open( array('route'=>'confirm_pass_stud',
    'method'=>'POST',
    'class'=> 'form-horizontal',
    'enctype'=>'multipart/form-data',
    'autocomplete'=>'off', 'id'=>'password')) }}

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('old_pass') ? 'has-error' : '' }}">
                    @include('flash::message')
                    <label class="col-md-4 control-label fontBold">Enter Old Password
                        {{--class="required asteriskRed">*</span>--}}
                    </label>
                    <div class="col-md-8">
                        {{Form::input('password', 'old_pass', '', ['class'=>'form-control', 'id' => 'old_pass',
                                                 "placeholder"=>"old password", "maxlength"=>255])}}

                        @if($errors->has('old_pass'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('old_pass') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Enter New Password
                        {{--class="required asteriskRed">*</span>--}}
                    </label>
                    <div class="col-md-8">
                        {{Form::input('password', 'new_password', '', ['class'=>'form-control', 'id' => 'new_password',
                                                 "placeholder"=>"new password", "maxlength"=>255])}}

                        @if($errors->has('new_password'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('new_password') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('con_password') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Confirm Password
                        {{--class="required asteriskRed">*</span>--}}
                    </label>
                    <div class="col-md-8">
                        {{Form::input('password', 'con_password', '', ['class'=>'form-control', 'id' => 'con_password',
                                                 "placeholder"=>"confirm password", "maxlength"=>255])}}

                        @if($errors->has('con_password'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('con_password') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold">
                        {{--class="required asteriskRed">*</span>--}}
                    </label>

                    <div class="col-md-8">
                        <input name="_method" type="hidden" value="PUT">
                        {{ Form::submit('Change Password', ['class'=>'btn btn-info waves-effect waves-light']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection