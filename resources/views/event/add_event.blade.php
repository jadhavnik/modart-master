@extends('layouts.app')
@section('content')
    @include('common.errors')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{ Form::open( array('route'=>'store_event',
    'method'=>'POST',
    'class'=> 'form-horizontal',
    'enctype'=>'multipart/form-data',
    'autocomplete'=>'off', 'id'=>'timetable')) }}

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    @include('flash::message')
                    <label class="col-md-4 control-label fontBold">Enter Event Name
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'event_name', '', ['class'=>'form-control', 'id' => 'event_name',
                                                 "placeholder"=>"Event Name", "maxlength"=>255])}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold">Enter Event Description
                    </label>
                    <div class="col-md-8">
                         {{--{{Form::input('text', 'event_description', '', ['class'=>'form-control', 'id' => 'event_description',--}}
                                                 {{--"placeholder"=>"Event Description", "maxlength"=>255])}}--}}
                        {{ Form::textarea('event_description',"", ["cols"=>"63",'data-plugin'=>'summernote', 'id'=>"event_description",'class'=>"form-control",
                "placeholder"=>"Event Description"]) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold">Upload Event image
                    </label>
                    <div class="col-md-8">
                        <div class="input-group input-group-file">
                            <span class="input-group-btn">
                              <span class="btn btn-success btn-file">Upload Image
                                <i class="icon md-upload" aria-hidden="true"></i>
                                  <input type="file" name="event_image" file-model="event_image">
                              </span>
                            </span>
                        </div>
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
                        {{ Form::submit('Add Event Data', ['class'=>'btn btn-info waves-effect waves-light']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection