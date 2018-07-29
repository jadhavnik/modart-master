@extends('layouts.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{ Form::open( array('route'=>'send_attendance_faculty',
    'method'=>'POST',
    'class'=> 'form-horizontal',
    'enctype'=>'multipart/form-data',
    'autocomplete'=>'off', 'id'=>'timetable')) }}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('course_name') ? 'has-error' : '' }}">
                    @include('flash::message')
                    <label class="col-md-4 control-label fontBold">Select Course Name
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
                    
                    
                       {{--{{ Form::select('course_name', [--}}
                              {{--'' => 'Please Select',--}}
                              {{--'Fashion Design Degree Program' => 'Fashion Design Degree Program',--}}
                                    {{--'Fashion Luxury Management Masters Program' => 'Fashion Luxury Management Masters Program',--}}
                                    {{--'Diploma in Fashion Styling & Image Design' => 'Diploma in Fashion Styling & Image Design',--}}
                                    {{--'International Institute Of Graphic Design' => 'International Institute Of Graphic Design',--}}
                                    {{--'Short Term Courses in Fashion Design & Management' => 'Short Term Courses in Fashion Design & Management']--}}
                                    {{--,['class'=>"form-control","id"=>'course_name']) }}--}}
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
                <div class="form-group {{ $errors->has('month') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Enter Month
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'month',old('month'), ['class'=>'form-control', 'id' => 'month',
                                                 "placeholder"=>"month", "maxlength"=>20])}}
                        @if($errors->has('month'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('month') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Enter Year
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'year', '', ['class'=>'form-control', 'id' => 'year',
                                                 "placeholder"=>"confirm password", "maxlength"=>4])}}
                        @if($errors->has('year'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('year') }}
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
                    </label>
                    <div class="col-md-8">
                        {{ Form::submit('Send', ['class'=>'btn btn-info waves-effect waves-light']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection