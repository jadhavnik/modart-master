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
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">First Name<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'name',$faculty->name, ['class'=>'form-control',
                                                "placeholder"=>"Firstname", "maxlength"=>255])}}
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
                        {{Form::input('text', 'last_name',$faculty->last_name, ['class'=>'form-control', 'id' => 'last_name',
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
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Mobile No
                        <span class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'mobile',$faculty->mobile,['class'=>"form-control",
                         "placeholder"=>"Mobile number", "id"=>'mobile', "maxLength"=>10]) }}
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
                        {{ Form::input('text', 'email',$faculty->email, ['class'=>"form-control",
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
                       
                            {{ Form::input('text','dob',$faculty->dob,['class'=>"form-control",
                                "placeholder"=>"1990-09-31", 'data-plugin'=>"datepicker",
                                "id"=>'dob']) }}
                      
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
                        <option value="male" {{ 'male' === $faculty->gender ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ 'female' === $faculty->gender ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ 'other' === $faculty->gender ? 'selected' : '' }}>Other</option>
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
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Profile Picture
                    </label>
                    <div class="col-md-8">
                        <div class="input-group input-group-file">
                            @include('common.image', ['image'=> isset($faculty->picture) ? $faculty->picture : "", 'del'=>'del_logo', 'url'=>isset($faculty->picture) ? $faculty->picture : ""])
                            {{--<input type="text" class="form-control" placeholder="Select Profile Picture">--}}
                            <span class="input-group-btn">
                              <span class="btn btn-success btn-file">Upload Photo
                                <i class="icon md-upload" aria-hidden="true"></i>
                                  {{ Form::input('file','picture',$faculty->picture)}}
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
                        <textarea name="address" class="form-control" rows="4" cols="40" id="address">{{$faculty->address }}</textarea>
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
                                     {{--<option value="{{$item->course_name}}">{{$item->course_name}}</option>--}}
                                    <option value="{{$item->course_name}}" {{ $item->course_name === $faculty->course_name ? 'selected' : '' }}>{{$item->course_name}}</option>
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
  <select class="form-control" name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="1" {{ '1' === $faculty->status ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ '0' === $faculty->status ? 'selected' : '' }}>Inactive</option>
                        </select>
                     {{--{{ Form::select('status', [--}}
                       {{--'' => 'Select Status',--}}
                             {{--'1' => 'Active',--}}
                             {{--'0' => 'Inactive'],['class'=>"form-control","id"=>'status']) }}--}}
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
                    <label class="col-md-4 control-label fontBold" id="panAsterisk">FY SY TY</label>
                    <div class="col-md-8">
                        {{Form::input('text', 'academic_yr',$faculty->academic_yr, ['class'=>'form-control', 'id' => 'academic_yr',
                         "placeholder"=>"academic year","maxLength"=> 255])}}

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
                        {{Form::input('text', 'class_room',$faculty->class_room, ['class'=>'form-control', 'id' => 'class_room',
                                                 "placeholder"=>"class_room","maxLength"=> 255])}}

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
                <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Role<span
                                class="required asteriskRed">*</span>
                    </label>
                    <div class="col-md-8">
                     <select class="form-control" name="role" id="role">
                        <option value="">Select Role</option>
                        <option value="STD" {{ 'STD' === $faculty->role? 'selected' : '' }} >Student</option>
                        <option value="Faculty" {{ 'Faculty' === $faculty->role? 'selected' : '' }}>Faculty</option>
                        </select>
                        {{--{{ Form::select('role', [	--}}
                            {{--''=>'Select role',--}}
                            {{--'student' => 'Student',--}}
                            {{--'faculty' => 'Faculty'],"",['class'=>"form-control","id"=>'role']) }}--}}
                        @if($errors->has('role'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('role') }}
                                </strong>
                            </span>
                        @endif
                       </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <div class="form-group">
                      <label class="col-md-4 control-label fontBold" id="panAsterisk">
                        </label>
                        <div class="col-md-8">
                          <div class="col-md-5 pull-left">
                                <input name="_method" type="hidden" value="PUT">
                                <input type="hidden" name="id" value="{{ $faculty->id }}">
                                <input type="submit" value="Update Faculty" class="btn btn-info waves-effect waves-light">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-md-6">
            <div class="form-group clearfix">
                <label class="col-md-4 control-label fontBold" id="mobileAsterisk"></label>
                <div class="col-md-8">
                   </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group clearfix">
                <div class="form-group">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">
                    </label>
                    <div class="col-md-8">
                        <div class="col-md-3 pull-left">
                            @if(Auth::user()->role == "Admin")
                                <a href="{{ url('/view_faculty') }}" class="btn btn-info"
                                   style="text-decoration:none">Go Back</a>
                            @endif
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
@endsection