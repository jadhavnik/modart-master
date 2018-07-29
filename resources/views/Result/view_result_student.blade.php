@extends('layouts.app')

@section('heads')
    <link rel="stylesheet" href="{{ asset("global/vendor/chartist-js/chartist.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/aspieprogress/asPieProgress.css")}}">
    <link rel="stylesheet" href="{{ asset("css/team.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/datatables-bootstrap/dataTables.bootstrap.css")}}">
    <link rel="stylesheet" href="{{ asset("css/datatable.css")}}">
@endsection
@section('content')
    @include('common.errors')
    {{--<div class="page animsition">--}}
    {{ Form::open(array('route'=>'get_student_result',
                      'method'=>'POST',
                      )) }}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('term_test') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label fontBold" >
                        <h4>Please Select Test</h4>
                    </label>
                    <div class="col-md-8">
                        <select name="term_test" class="form-control">
                            <option value="">Please Select Test</option>
                            <option value="Term Test 1">Term Test 1</option>
                            <option value="Term Test 2">Term Test 2</option>
                            <option value="Term Test 3">Term Test 3</option>
                            <option value="Term Test 4">Term Test 4</option>
                            <option value="Semester 1">Semester 1</option>
                            <option value="Semester 2">Semester 2</option>
                            <option value="Semester 3">Semester 3</option>
                            <option value="Semester 4">Semester 4</option>
                        </select>
                        @if($errors->has('term_test'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('term_test') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group clearfix">
                    {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}


    <div class="page-content padding-0 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-lg-12 col-xlg-9">
                <div class="widget widget-shadow table-row">

                    @if(count($marksData) > 0)
                        <div class="widget-header padding-20">
                            <h3 class="widget-header blue-grey-700">Your Marks</h3>
                        </div>
                        <div class="widget-content bg-white table-responsive padding-20 padding-bottom-25">
                            <table class="table table-content" id="tblRecentAudits">
                                <tbody>
                                <tr>
                                    <th>Subject</th>
                                    <th>Faculty Name</th>
                                    <th>Marks</th>
                                    <th>Out off</th>
                                </tr>

                                @foreach($marksData as $getData)
                                    <tr>
                                        <td>
                                            {{ $getData->subject }}
                                        </td>
                                        <td>
                                            {{ $getData->faculty_name }}
                                        </td>
                                        <td>
                                            {{ $getData->marks }}
                                        </td>
                                        <td>
                                            {{ $getData->out_off}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h4>
                            {{--<center>No Result to display</center>--}}
                        </h4>
                    @endif

                </div>
            </div>

        </div>
    </div>
    {{--</div>--}}
@endsection
@section('scripts')
    <script src="{{ asset("global/vendor/datatables/jquery.dataTables.js")}}"></script>
    <script src="{{ asset("global/vendor/datatables-bootstrap/dataTables.bootstrap.js")}}"></script>
    <script src="{{ asset("global/js/components/datatables.min.js")}}"></script>
    <script src="{{ asset("global/vendor/chartist-js/chartist.min.js")}}"></script>
    <script src="{{ asset("global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js")}}"></script>
    <script src="{{ asset("global/vendor/aspieprogress/jquery-asPieProgress.js")}}"></script>
    <script src="{{ asset("global/js/components/aspieprogress.js")}}"></script>
    <script src="{{ asset("js/team.js")}}"></script>
@endsection