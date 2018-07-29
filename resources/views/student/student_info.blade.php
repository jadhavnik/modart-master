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
    {{ Form::open( array('route'=>'update_student',
    'method'=>'POST',
    'class'=> 'form-horizontal',
    'enctype'=>'multipart/form-data',
    'autocomplete'=>'off', 'id'=>'profileForm')) }}
    <div class="col-md-12">
        <div class="row">
            <h2>Students Details</h2>
            <div class="col-md-6">
            </div>
        </div>
        @include('flash::message')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">First Name
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text','name',$student->name, ['class'=>'form-control',"maxlength"=>255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Middle Name
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'middle_name',$student->middle_name, ['class'=>'form-control',"maxlength"=>255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Last Name
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'last_name',$student->last_name, ['class'=>'form-control', 'id' => 'last_name',"maxlength"=>255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Mobile No
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'mobile',$student->mobile,['class'=>"form-control","id"=>'mobile', "maxLength"=> 10,"disabled"=>"true"]) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold">Email
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'email',$student->email, ['class'=>"form-control","id"=>'email',"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="dobAsterisk">Date of Birth
                    </label>
                    <div class="col-md-8">
                        <div class="input-group"><span class="input-group-addon">
                      <i class="icon wb-calendar" aria-hidden="true"></i>
                            </span>
                            {{ Form::input('text', 'dob',$student->dob,['class'=>"form-control","id"=>'dob',"disabled"=>"true"]) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold">Profile Picture
                    </label>
                    <div class="col-md-8">
                        <div class="input-group input-group-file">
                            @if($student->profile_pic)
                                <img src="{{URL::asset('/images/student/'.$student->profile_pic) }}" height="100"
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
                    <label class="col-md-4 control-label fontBold">Address
                    </label>
                    <div class="col-md-8">
                      <textarea name="address" cols="40" rows="4" id="address"  class="form-control"  disabled="true" >{{$student->address }}</textarea>
                       {{--{{Form::input('textarea', 'address',$student->address, ['class'=>'form-control','rows' =>3  "cols"=>"40" "id"=>'address', "maxlength"=>255,"disabled"=>"true"])}}--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Course
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'course_name',$student->course_name,['class'=>"form-control","id"=>'course_name',"disabled"=>"true"]) }}
                    </div>
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold"> Gender
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'gender',$student->gender,['class'=>"form-control","id"=>'gender',"disabled"=>"true"]) }}
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
                        {{Form::input('text', 'academic_yr',$student->academic_yr, ['class'=>'form-control', 'id' => 'academic_yr',"maxLength"=> 255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Batch Year
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'batch_yr',$student->batch_yr, ['class'=>'form-control', 'id' => 'batch_yr',"maxLength"=> 255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h2>Parents Details</h2>
            <div class="col-md-6">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">First Name
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'p_first_name',$student->p_first_name, ['class'=>'form-control',"id"=>'p_first_name', "maxlength"=>255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Middle Name
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'p_middle_name',$student->p_middle_name,['class'=>'form-control',"id"=>'p_middle_name', "maxlength"=>255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Last Name
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'p_last_name',$student->p_last_name, ['class'=>'form-control',"id"=>'p_last_name', "maxlength"=>255,"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Mobile No
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'p_mobile',$student->p_mobile,['class'=>"form-control", "id"=>'p_mobile', "maxLength"=> 10,"disabled"=>"true"]) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold">Email
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'p_email',$student->p_email, ['class'=>"form-control", "id"=>'p_email',"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
           <div class="col-md-6">
                <div class="form-group clearfix">
                 <label class="col-md-4 control-label fontBold">
                    </label>
                     
                    <div class="col-md-8">
                    
                        @if(Auth::user()->role == "Admin")
                            <a href="{{ url('/view_student') }}" class="btn btn-info" style="text-decoration:none">Back</a>
                        @endif
                        @if(Auth::user()->role == "Faculty")
                            <a href="{{ url('/student_data') }}" class="btn btn-info" style="text-decoration:none">Back</a>
                        @endif
                   
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
