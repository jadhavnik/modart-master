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
    {{ Form::open(array('route'=>'save_faculty',
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
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">First Name<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'name',old('name'), ['class'=>'form-control',
                                                "placeholder"=>"Firstname", "maxlength"=>255,"id"=>"name"])}}
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
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Last Name<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'last_name', old('last_name'), ['class'=>'form-control', 'id' => 'last_name',
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
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Mobile No<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'mobile',old('mobile'),['class'=>"form-control",
                         "placeholder"=>"Mobile number", "id"=>'mobile',"maxlength"=>10]) }}
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
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Email
                        <span class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'email',old('email'), ['class'=>"form-control",
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
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="dobAsterisk">Date of Birth
                        <span class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">

                        {{ Form::input('text','dob',old('dob'),['class'=>"form-control",
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
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="panAsterisk">Gender
                        <span class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{ Form::select('gender', [
			'' => 'Select gender',
			'male' => 'Male',
			'female' => 'Female',
			'other' => 'Other',
			],"",['class'=>"form-control","id"=>'gender']) }}
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
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Profile Picture
                    </label>
                    <div class="col-md-8">
                        <div class="input-group input-group-file">
                            {{--      <input type="text" class="form-control" placeholder="Select Profile Picture">--}}
                            <span class="input-group-btn">
                              <span class="btn btn-success btn-file">Upload image jpeg
                                <i class="icon md-upload" aria-hidden="true"></i>
                                  {{ Form::input('file','picture','',["id"=>'picture'])}}
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
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Address<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        <textarea name="address" value="{{old('address')}}" rows="4" cols="40" class="form-control"
                                  id="address">{{old('address')}}</textarea>
                        @if($errors->has('address'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('address') }}
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
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Status<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{--<select class="form-control" name="status" id="status">--}}
   			 {{--<option value="">Select Status</option>--}}
  			 {{--<option value="1">Active</option>--}}
   			 {{--<option value="0">Female</option>--}}
			{{--</select>--}}
                     
                     {{ Form::select('status', [
				'' => 'Select Status',
				'1' => 'Active',
				'0' => 'Inactive'],"",['class'=>"form-control","id"=>'status']) }}
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
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'academic_yr',old('academic_yr'), ['class'=>'form-control', 'id' => 'academic_yr',
                         "placeholder"=>"First Year","maxLength"=> 255])}}
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
                <div class="form-group {{ $errors->has('class_room') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Class<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'class_room',old('class_room'), ['class'=>'form-control', 'id' => 'class_room',
                                                 "placeholder"=>"2017-2018","maxLength"=> 255])}}

                        @if($errors->has('class_room'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('class_room') }}
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
                    <div class="form-group">
                        <label class="col-md-4 control-label fontBold" id="panAsterisk">
                        </label>
                        <div class="col-md-8">
                        </div>
                    </div>
                </div>
            </div><br><br>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <div class="form-group">
                        <label class="col-md-4 control-label fontBold" id="panAsterisk">
                        </label>
                        <div class="col-md-8">
                            <div class="col-md-5 pull-right">
                                <input type="submit" value="Add Faculty Details"
                                       class="btn btn-info waves-effect waves-light" id="btnSubmit">
                        </div>
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
    <script src="{{ asset("https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js") }}"></script>
@endsection