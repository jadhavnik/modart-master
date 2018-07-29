@extends('layouts.app')
@section('content')
     <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{ Form::open( array('route'=>'time_table',
    'method'=>'POST',
    'class'=> 'form-horizontal',
    'enctype'=>'multipart/form-data',
    'autocomplete'=>'off', 'id'=>'timetable')) }}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Select course Name
                    </label>
                    <div class="col-md-8">
                     <?php
                        $course =\App\Course::getCourse();
                        ?>
                    
                         <select class="form-control" name="name">
                            <option value="">Select Course Name</option>
                            @foreach($course as $item)
                                <option value="{{$item->course_name}}">{{$item->course_name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('name'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('name') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('time_table') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Upload Time Table
                    </label>
                    <div class="col-md-8">
                        <div class="input-group input-group-file">
                            <span class="input-group-btn">
                              <span class="btn btn-success btn-file">Upload CSV file
                                <i class="icon md-upload" aria-hidden="true"></i>
                                  <input type="file" name="time_table" file-model="time_table">
                              </span>
                            </span>
                              <a  href="{{ url('/download') }}" class="btn btn-info pull-right"><i class="icon fa-download"> </i> Download Sample CSV File</a>
                        </div>
                        @if($errors->has('time_table'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('time_table') }}
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
                        {{ Form::submit('Add Time Table', ['class'=>'btn btn-info waves-effect waves-light']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <div class="col-md-8">
                      </div>
                </div>
            </div>
        </div>

    </div>
    {{ Form::close() }}
@endsection