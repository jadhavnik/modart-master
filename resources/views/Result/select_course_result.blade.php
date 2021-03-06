@extends('layouts.app')
@section('content')
    {{--@include('common.errors')--}}
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{ Form::open( array('route'=>'send_course',
    'method'=>'POST',
    'class'=> 'form-horizontal',
    'enctype'=>'multipart/form-data',
    'autocomplete'=>'off', 'id'=>'timetable')) }}

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('course_name') ? 'has-error' : '' }}">
                    @include('flash::message')
                    <label class="col-md-4 control-label fontBold">Enter Course Name
                        {{--class="required asteriskRed">*</span>--}}
                    </label>
                    <div class="col-md-8">
                        <?php
                        $course =\App\Course::getCourse();
                        ?>

                        <select class="form-control" name="course_name">
                            <option value="">Select Course Name</option>
                            @foreach($course as $item)
                                <option value="{{$item->course_name}}">{{$item->course_name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('course_name'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('course_name') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('course_name') ? 'has-error' : '' }}">
                    @include('flash::message')
                    <label class="col-md-4 control-label fontBold">Enter Course Name
                        {{--class="required asteriskRed">*</span>--}}
                    </label>
                    <div class="col-md-8">
                            <select name="term_test" class="form-control">
                                <option value="Term Test 1">Term Test 1</option>
                                <option value="Term Test 2">Term Test 2</option>
                                <option value="Term Test 3">Term Test 3</option>
                                <option value="Term Test 4">Term Test 4</option>
                                <option value="Semester 1">Semester 1</option>
                                <option value="Semester 2">Semester 2</option>
                                <option value="Semester 3">Semester 3</option>
                                <option value="Semester 4">Semester 4</option>
                            </select>
                        @if($errors->has('course_name'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('course_name') }}
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
                        {{ Form::submit('Next', ['class'=>'btn btn-info waves-effect waves-light']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection