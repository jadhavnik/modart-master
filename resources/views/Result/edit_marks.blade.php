@extends('layouts.app')
@section('heads')
    <link rel="stylesheet" href="{{ asset("global/vendor/summernote/summernote.css") }}">
    <link rel="stylesheet" href="{{ asset("global/vendor/bootstrap-datepicker/bootstrap-datepicker.css") }}">
    <link rel="stylesheet" href="{{ asset("global/vendor/select2/select2.min.css") }}">
    <link rel="stylesheet" href="{{ asset("global/vendor/formvalidation/formValidation.css") }}">
    <link rel="stylesheet" href="{{ asset("global/vendor/icheck/icheck.css") }}">
@endsection
@section('content')
    {{--@include('common.errors')--}}
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{ Form::open(array('route'=>'update_marks',
    'method'=>'POST',
    'files'=> true,
    'class'=> 'form-horizontal',
    'autocomplete'=>'off', 'id'=>'profileForm')) }}

    <div class="col-md-12">

        <div class="row">
            <h2>Update Marks</h2>
            <div class="col-md-6">
            </div>
        </div>
        @include('flash::message')
        <div class="row">

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Subject
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text','subject',$subjectData->subject,['class'=>"form-control","id"=>'subject']) }}
                        @if($errors->has('subject'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('subject') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('faculty_name') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Faculty Name
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'faculty_name',$subjectData->faculty_name, ['class'=>"form-control","id"=>'faculty_name'])}}
                        @if($errors->has('faculty_name'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('faculty_name') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('marks') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold">Marks
                    </label>
                    <div class="col-md-8">
                        {{ Form::input('text', 'marks',$subjectData->marks, ['class'=>"form-control","id"=>'marks',"maxlength"=>3])}}
                        @if($errors->has('marks'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('marks') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('out_off') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" id="mobileAsterisk">Out Off
                    </label>
                    <div class="col-md-8">
                        {{Form::input('text', 'out_off',$subjectData->out_off,['class'=>'form-control',"id"=>'out_off',"maxlength"=>3])}}
                        @if($errors->has('out_off'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('out_off') }}
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
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="id" value="{{ $subjectData->id }}">
                        <input type="submit" value="update" class="btn btn-info waves-effect waves-light">
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
