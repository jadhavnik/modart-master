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
    {{ Form::open(array('route'=>'save_attendance',
    'method'=>'POST',
    'files'=> true,
    'class'=> 'form-horizontal',
    'autocomplete'=>'off', 'id'=>'profileForm')) }}
    <div class="col-md-12">
        <div class="row">
            <h2>Update Attendence</h2>
            <div class="col-md-6">
            </div>
        </div>
        @include('flash::message')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Roll No
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text','roll_no',$student->roll_no,['class'=>"form-control","id"=>'roll_no',"disabled"=>"true"]) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group clearfix">
                    <label class="col-md-4 control-label fontBold">Name
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'name',$student->name, ['class'=>"form-control","id"=>'name',"disabled"=>"true"])}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('month') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Month
                    </label>
                    <div class="col-md-8">
                    <select class="form-control" name="month" id="month">
    <option value="">Select Month</option>
    <option value="January" {{ 'January' === $student->month ? 'selected' : '' }}>January</option>
    <option value="February" {{ 'February' === $student->month ? 'selected' : '' }}>February</option>
    <option value="March" {{ 'March' === $student->month ? 'selected' : '' }}>March</option>
    <option value="April" {{ 'April' === $student->month ? 'selected' : '' }}>April</option>
    <option value="May" {{ 'May' === $student->month ? 'selected' : '' }}>May</option>
    <option value="June" {{ 'June' === $student->month ? 'selected' : '' }}>June</option>
    <option value="July" {{ 'July' === $student->month ? 'selected' : '' }}>July</option>
    <option value="other" {{ 'August' === $student->month ? 'selected' : '' }}>August</option>
    <option value="August" {{ 'September' === $student->month ? 'selected' : '' }}>September</option>
    <option value="October" {{ 'October' === $student->month ? 'selected' : '' }}>October</option>
    <option value="November" {{ 'November' === $student->month ? 'selected' : '' }}>November</option>
    <option value="December" {{ 'December' === $student->month ? 'selected' : '' }}>December</option>
</select>
                    
                    {{--{{ Form::select('month', [--}}
{{--'' => 'Select month',--}}
{{--'January' => 'January',--}}
{{--'February' => 'February',--}}
{{--'March' => 'March',--}}
{{--'April' => 'April',--}}
{{--'May' => 'May',--}}
{{--'June' => 'June',--}}
{{--'July' => 'July',--}}
{{--'August' => 'August',--}}
{{--'September' => 'September',--}}
{{--'October' => 'October',--}}
{{--'November' => 'November',--}}
{{--'December' => 'December'],"",["id"=>'month',"class"=>"form-control"]) }}--}}
    
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
                <div class="form-group {{ $errors->has('attendance') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Attendance
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'attendance',$student->attendance,['class'=>'form-control',"id"=>'attendance', "maxlength"=>3])}}
                        @if($errors->has('attendance'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('attendance') }}
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
                      <label class="col-md-4 control-label fontBold">
                    </label>
                        <div class="col-md-8">
                            <div class="col-md-3 pull-left">
                                <input name="_method" type="hidden" value="PUT">
                                <input type="hidden" name="id" value="{{ $student->id }}">
                                <input type="submit" value="update" class="btn btn-info waves-effect waves-light">
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