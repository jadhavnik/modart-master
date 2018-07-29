@extends('layouts.app')
@section('scripts')
    <script src="{{ asset("https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js")}}"></script>
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{ Form::open( array('route'=>'send_attendance_admin',
    'method'=>'POST',
    'class'=> 'form-horizontal',
    'enctype'=>'multipart/form-data',
    'autocomplete'=>'off', 'id'=>'timetable')) }}
    <div class="col-md-12" ng-app=""  ng-init="showme=false">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('course_name') ? 'has-error' : '' }}">
                    @include('flash::message')
                    <label class="col-md-4 control-label fontBold">Select Course Name
                    </label>
                    <div class="col-md-8">
                    {{ Form::select('course_name', [
'' => 'Please Select',
'Fashion Design Degree Program' => 'Fashion Design Degree Program',
'Fashion Luxury Management Masters Program' => 'Fashion Luxury Management Masters Program',
'Diploma in Fashion Styling & Image Design' => 'Diploma in Fashion Styling & Image Design',
'International Institute Of Graphic Design' => 'International Institute Of Graphic Design',
'Short Term Courses in Fashion Design & Management' => 'Short Term Courses in Fashion Design & Management'],""
,['class'=>"form-control","id"=>'course_name']) }}
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
                    
                   {{--<select class="form-control" name="month" id="month">{{ old('month')}}--}}
    {{--<option value="">Select month</option>--}}
    {{--<option value="January">January</option>--}}
    {{--<option value="February">February</option>--}}
    {{--<option value="March1">March</option>--}}
    {{--<option value="April">April</option>--}}
    {{--<option value="May">May</option>--}}
    {{--<option value="June">June</option>--}}
    {{--<option value="July">July</option>--}}
    {{--<option value="August">August</option>--}}
    {{--<option value="September">September</option>--}}
    {{--<option value="October">October</option>--}}
    {{--<option value="November">November</option>--}}
    {{--<option value="December">December</option>--}}
{{--</select>--}}
                   {{ Form::select('month', [
'' => 'Select month',
'January' => 'January',
'February' => 'February',
'March' => 'March',
'April' => 'April',
'May' => 'May',
'June' => 'June',
'July' => 'July',
'August' => 'August',
'September' => 'September',
'October' => 'October',
'November' => 'November',
'December' => 'December'],"",["id"=>'month',"class"=>"form-control"]) }}
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
                                                 "placeholder"=>"Year", "maxlength"=>4])}}
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
                        {{ Form::submit('Send', ['class'=>'btn btn-info waves-effect waves-light','ng-click'=>'showme=true',"data-toggle"=>'modal','data-target'=>'#myModal']) }}
                         {{--<img src="{{URL::asset('/images/ajax-loader.gif')}}" style="width:100px; align-content:center;" height="100" ng-show="showme" >--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold">
                    </label>
                    <div class="col-md-8" >
                         {{--<label ng-show="showme" class="form-control"> Be patient, your email is being sent.--}}
{{--</label>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--<h4 class="modal-title">Modal Header</h4>--}}
                </div>
                <div class="modal-body">
                    <h4 style="text-align:center;">Be patient, your email is being sent.</h4>
                    <img src="http://rpg.drivethrustuff.com/shared_images/ajax-loader.gif" width="100" height="100" style=" position:absolute;left:50%; top:50%; margin-top:-25px;margin-left:-50px;" />
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                </div>
            </div>

        </div>
    </div>
    
    {{ Form::close() }}
@endsection