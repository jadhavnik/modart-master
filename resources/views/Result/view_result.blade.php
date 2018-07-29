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
    <div class="page-content padding-0 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-lg-12 col-xlg-9" id="recentAudits">
                <div class="widget widget-shadow table-row">
                    <div class="widget-header padding-20">
                        <h3 class="widget-header blue-grey-700">Add Result for {{ $test_name }}</h3>
                    </div>
                    @if(count($attendanceData) > 0)

                        <div class="widget-content bg-white table-responsive padding-20 padding-bottom-25">
                            <table class="table table-hover table-responsive table-striped" id="tblRecentAudits">
                                <tbody>
                                {{--<tr>{{ $test_name }}</tr>--}}
                                <tr>
                                    <th>No.</th>
                                    <th>Roll No</th>
                                    <th>Name</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                <?php
                                $i = 0;
                                ?>
                                @foreach($attendanceData as $getData)
                                    <tr>
                                        <td>
                                            <?php
                                            $i = $i + 1;
                                            echo $i;
                                            ?>
                                        </td>
                                        <td>
                                            {{ $getData->roll_no}}
                                        </td>
                                        <td>
                                            {{ $getData->name ." ".$getData->middle_name ."   ". $getData->last_name }}
                                        </td>
                                        <td>
                                            <a href="{{ url('add_result_record'. '/' .$getData->id . '/' . $test_name) }}" class="btn btn-info" style="text-decoration:none">Add Result</a>

                                            <a href="{{ url('student_no',$getData->id) }}" class="btn btn-info" style="text-decoration:none">Update Result</a>
                                        </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination right-align">
                            {{ $attendanceData->render() }}
                        </ul>

                    @else
                        <h4>
                            <center>No records to display</center>
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