@extends('layouts.app')
@section('heads')
    <link rel="stylesheet" href="{{ asset("global/vendor/summernote/summernote.css") }}">
    <link rel="stylesheet" href="{{ asset("global/vendor/bootstrap-datepicker/bootstrap-datepicker.css") }}">
    <link rel="stylesheet" href="{{ asset("global/vendor/select2/select2.min.css") }}">
    <link rel="stylesheet" href="{{ asset("global/vendor/formvalidation/formValidation.css") }}">
    <link rel="stylesheet" href="{{ asset("global/vendor/icheck/icheck.css") }}">
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{ Form::open( array('route'=>'update_stud',
    'method'=>'POST',
    'class'=> 'form-horizontal',
    'enctype'=>'multipart/form-data',
    'autocomplete'=>'off', 'id'=>'profileForm')) }}
    <div class="col-md-12">
        <div class="row">
            <h2>Update Profile</h2>
            <div class="col-md-6">
            </div>
        </div>
        @include('flash::message')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">First Name<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text','first_name',$student->name, ['class'=>'form-control',
                                                "placeholder"=>"Firstname", "maxlength"=>255])}}
                        @if($errors->has('first_name'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('first_name') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('middle_name') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Middle Name<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'middle_name',$student->middle_name, ['class'=>'form-control',
                                                 "placeholder"=>"Middle Name", "maxlength"=>255])}}
                        @if($errors->has('middle_name'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('middle_name') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Last Name<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'last_name',$student->last_name, ['class'=>'form-control', 'id' => 'last_name',
                                                 "placeholder"=>"Lastname", "maxlength"=>255])}}
                        @if($errors->has('last_name'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('last_name') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Mobile No
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'mobile',$student->mobile,['class'=>"form-control",
                         "placeholder"=>"Mobile number", "id"=>'mobile', "maxLength"=> 10]) }}
                        @if($errors->has('mobile'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('mobile') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Email
                        <span class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'email',$student->email, ['class'=>"form-control",
                         "placeholder"=>"Email", "id"=>'email'])}}
                        @if($errors->has('email'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('email') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="dobAsterisk">Date of Birth
                        <span class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                            </span>
                            {{ Form::input('text', 'dob',$student->dob,['class'=>"form-control",
                                "placeholder"=>"Format: 1990-09-31", 'data-plugin'=>"datepicker",
                                "id"=>'dob']) }}
                        </div>
                        @if($errors->has('dob'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('dob') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="panAsterisk">Gender
                        <span class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                         {{--<select class="form-control" name="gender" id="gender">--}}
                            {{--<option value="">Select gender</option>--}}
                            {{--<option value="male">Male</option>--}}
                            {{--<option value="female">Female</option>--}}
                            {{--<option value="other">Other</option>--}}
                        {{--</select>--}}
                        <select class="form-control" name="gender" id="gender">
                            <option value="">Select gender</option>
                        <option value="male" {{ 'male' === $student->gender ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ 'female' === $student->gender ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ 'other' === $student->gender ? 'selected' : '' }}>Other</option>
                        </select>
                     {{--{{ Form::select('gender', [--}}
                  {{--'' => 'Select gender',--}}
                          {{--'male' => 'Male',--}}
                          {{--'female' => 'Female',--}}
                          {{--'other' => 'Other',--}}
                          {{--],['class'=>"form-control","id"=>'gender']) }}--}}
                        @if($errors->has('gender'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('gender') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Profile Picture
                    </label>
                    <div class="col-md-8">
                        <div class="input-group input-group-file">
                            @include('common.image_student', ['image'=> isset($student->profile_pic) ? $student->profile_pic : "", 'del'=>'del_logo', 'url'=>isset($student->profile_pic) ? $student->profile_pic : ""])
                            <span class="input-group-btn">
                              <span class="btn btn-success btn-file">Upload Photo
                                <i class="icon md-upload" aria-hidden="true"></i>
                                  {{ Form::input('file','picture',$student->profile_pic)}}
                              </span>
                            </span>
                        </div>
                        @if($errors->has('picture'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('picture') }}
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
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Course<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{--{{ Form::select('course_name',$student->course_name,['class'=>"form-control","id"=>'course_name',"disabled"=>"true"]) }}--}}
                        {{ Form::input('text','course_name',$student->course_name,['class'=>"form-control","id"=>'course_name',"disabled"=>"true"]) }}

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
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Status<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text','status',$student->status,['class'=>"form-control","id"=>'status',"disabled"=>"true"]) }}
                        @if($errors->has('status'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('status') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('academic_yr') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="panAsterisk">FY SY TY
                        <span class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'academic_yr',$student->academic_yr, ['class'=>'form-control', 'id' => 'academic_yr',
                         "placeholder"=>"academic year","maxLength"=> 255,"disabled"=>"true"])}}
                        @if($errors->has('academic_yr'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('academic_yr') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('batch_yr') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Batch Year<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'batch_yr',$student->batch_yr, ['class'=>'form-control', 'id' => 'batch_yr',
                                                 "placeholder"=>"Year","maxLength"=> 255,"disabled"=>"true"])}}
                        @if($errors->has('batch_yr'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('batch_yr') }}
                                </strong>
                            </span>
                        @endif
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
                <div class="form-group {{ $errors->has('p_first_name') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">First Name<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'p_first_name',$student->p_first_name, ['class'=>'form-control',
                                                "placeholder"=>"Firstname", "id"=>'p_first_name', "maxlength"=>255,"disabled"=>"true"])}}
                        @if($errors->has('p_first_name'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('p_first_name') }}
                                </strong>
                            </span>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('p_middle_name') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Middle Name<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'p_middle_name',$student->p_middle_name,['class'=>'form-control',
                                                 "placeholder"=>"Middlename", "id"=>'p_middle_name', "maxlength"=>255,"disabled"=>"true"])}}
                        @if($errors->has('p_middle_name'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('p_middle_name') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('p_last_name') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Last Name<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'p_last_name',$student->p_last_name, ['class'=>'form-control',
                                                "placeholder"=>"LastName","id"=>'p_last_name', "maxlength"=>255,"disabled"=>"true"])}}
                        @if($errors->has('p_last_name'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('p_last_name') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('p_mobile') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Mobile No
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'p_mobile',$student->p_mobile,['class'=>"form-control",
                         "placeholder"=>"Mobile number", "id"=>'p_mobile', "maxLength"=> 10,"disabled"=>"true"]) }}
                        @if($errors->has('p_mobile'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('p_mobile') }}
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
                    <label class="col-md-4 control-label fontBold">Email
                        <span class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'p_email',$student->p_email, ['class'=>"form-control",
                         "placeholder"=>"Email", "id"=>'p_email',"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Address<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                                                  <textarea name="address" disabled="true" class="form-control" rows="4" cols="40" id="address">{{$student->address }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold">Username
                        <span class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'username',$student->username, ['class'=>'form-control',
                        "placeholder"=>"Username", "id"=>'username', "maxlength"=>255])}}
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="id" value="{{ $student->id }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold">
                    </label>
                    <div class="col-md-8">
                        {{ Form::submit('Update Profile', array('class' => 'btn btn-info')) }}
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
