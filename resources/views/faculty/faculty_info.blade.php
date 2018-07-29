@extends('layouts.app')
@section('heads')
    <link rel="stylesheet" href="{{ asset("global/vendor/summernote/summernote.css") }}">
    <link rel="stylesheet" href="{{ asset("global/vendor/bootstrap-datepicker/bootstrap-datepicker.css") }}">
    <link rel="stylesheet" href="{{ asset("global/vendor/select2/select2.min.css") }}">
    <link rel="stylesheet" href="{{ asset("global/vendor/formvalidation/formValidation.css") }}">
    <link rel="stylesheet" href="{{ asset("global/vendor/icheck/icheck.css") }}">
@endsection
@section('content')
    @include('common.errors')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{ Form::open(array('route'=>'update_faculty',
    'method'=>'POST',
    'files'=> true,
    'class'=> 'form-horizontal',
    'autocomplete'=>'off', 'id'=>'profileForm')) }}
    <div class="col-md-12">
        <div class="row">
            <h2>Faculty Details</h2>
            <div class="col-md-6">
            </div>
        </div>
        @include('flash::message')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold">
                    </label>
                    <div class="col-md-8">
                        <div class="input-group input-group-file">
                            @if($faculty->picture)
                                <img src="{{URL::asset('/images/faculty/'.$faculty->picture) }}" height="100"
                                     class="pull-left" style="margin:0 10px 10px 0">
                            @else
                                <img src="{{ asset("global/portraits/5.jpg") }}" alt="...">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Address
                    </label>
                    <div class="col-md-8">
                       {{--{{Form::input('text', 'address',$faculty->address, ['class'=>'form-control',"id"=>'address', "maxlength"=>255,"disabled"=>"true","rows"=>"3" ])}}--}}
                   <textarea name="address"   rows="4"  id="address"  class="form-control"  disabled="true" >{{$faculty->address }}</textarea>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">First Name
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'name',$faculty->name, ['class'=>'form-control',"maxlength"=>255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Last Name
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'last_name',$faculty->last_name, ['class'=>'form-control','id' => 'last_name',"maxlength"=>255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Mobile No
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'mobile',$faculty->mobile,['class'=>"form-control", "id"=>'mobile', "maxLength"=> 10,"disabled"=>"true"]) }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold">Email
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'email',$faculty->email, ['class'=>"form-control","id"=>'email',"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="dobAsterisk">Date of Birth
                    </label>
                    <div class="col-md-8">
                        <div class="input-group"><span class="input-group-addon">
                      <i class="icon wb-calendar" aria-hidden="true"></i>
                            </span>
                            {{ Form::input('text','dob',$faculty->dob,['class'=>"form-control","id"=>'dob',"disabled"=>"true"]) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="panAsterisk">Gender
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text','gender',$faculty->gender,['class'=>"form-control","id"=>'gender',"disabled"=>"true"]) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Course</label>
                    <div class="col-md-8">
                        {{Form::input('text', 'course_name',$faculty->course_name, ['class'=>'form-control',"id"=>'course_name', "maxlength"=>255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Status</label>
                    <div class="col-md-8">
                        {{Form::input('text', 'status',$faculty->status, ['class'=>'form-control',"id"=>'status', "maxlength"=>255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="panAsterisk">FY SY TY
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'academic_yr',$faculty->academic_yr, ['class'=>'form-control', 'id' => 'academic_yr',"maxLength"=> 255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Class
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'class_room',$faculty->class_room, ['class'=>'form-control', 'id' => 'class_room',"maxLength"=> 255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Role
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'role',$faculty->role,['class'=>'form-control', "id"=>'role', "maxlength"=>255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <div class="form-group">
                      <label class="col-md-4 control-label fontBold">
                    </label>
                        <div class="col-md-8">
                             {{--<div class="col-md-3 pull-right">--}}
                                @if(Auth::user()->role == "Admin")
                                    <a href="{{ url('/view_faculty') }}" class="btn btn-info"
                                       style="text-decoration:none">Back</a>
                                @endif
                                @if(Auth::user()->role == "Faculty")
                                    <a href="{{ url('/view_faculty') }}" class="btn btn-info"
                                       style="text-decoration:none">Back</a>
                                @endif
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection
@section('scripts')
    <script src="{{ asset("global/vendor/summernote/summernote.min.js")}}"></script>
    <script src="{{ asset("global/vendor/select2/select2.full.min.js") }}"></script>
    <script src="{{ asset("global/vendor/icheck/icheck.min.js")}}"></script>
    <script src="{{ asset("global/js/components/select2.js") }}"></script>
    <script src="{{ asset("global/vendor/bootstrap-datepicker/bootstrap-datepicker.js") }}"></script>
    <script src="{{ asset("global/js/components/input-group-file.js")}}"></script>
    <script src="{{ asset("global/js/components/icheck.js")}}"></script>
    <script src="{{ asset("global/vendor/formvalidation/formValidation.min.js")}}"></script>
    <script src="{{ asset("global/vendor/formvalidation/framework/bootstrap.min.js")}}"></script>
@endsection
