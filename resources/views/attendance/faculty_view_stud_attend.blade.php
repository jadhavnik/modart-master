@extends('layouts.app')
@section('heads')
    <link rel="stylesheet" href="{{ asset("global/vendor/chartist-js/chartist.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/aspieprogress/asPieProgress.css")}}">
    <link rel="stylesheet" href="{{ asset("css/team.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/datatables-bootstrap/dataTables.bootstrap.css")}}">
    <link rel="stylesheet" href="{{ asset("css/datatable.css")}}">
      <script src="{{ asset("global/js/validation.js")}}"></script>
@endsection
@section('content')
    @include('common.errors')
    <div class="page-content padding-0 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-lg-12 col-xlg-9" id="recentAudits">
                <div class="widget widget-shadow table-row">
                    <div class="widget-header padding-20">
                       <div class="col-sm-9">
                            <h3 class="widget-header blue-grey-700">Attendance Records</h3>
                        </div>
                        <div class="col-sm-3">
                            @include('common.search',['url'=>'attendanceSearch'])
                        </div>
                    </div>
                    @if(count($attendanceData) > 0)
                        <div class="widget-content bg-white table-responsive padding-20 padding-bottom-25">
                            <table class="table table-hover table-responsive table-striped" id="tblRecentAudits">
                                <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Roll No</th>
                                    <th>Name</th>
                                    <th>Course Name</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Attendance</th>
                                    <th colspan="2" style="text-align: center;">Actions</th>
                                    </tr>
                                <?php
                                $i = 0;
                                ?>
                                @foreach($attendanceData as $getData)
                                    <tr>
                                        <td>
                                            <?php
                                            $i=$i+1;
                                            echo $i;
                                            ?>
                                        </td>
                                        <td>
                                            {{ $getData->roll_no}}
                                        </td>
                                        <td>
                                            {{ $getData->name}}
                                        </td>
                                        <td>
                                            {{ $getData->course_name}}
                                        </td>
                                        <td>
                                            {{ $getData->month}}
                                        </td>
                                        <td>
                                            {{ $getData->year}}
                                        </td>
                                        <td>
                                            {{ $getData->attendance}}
                                        </td>
                                        <td>
                                            <form action="{{url('delete_attendance/'.$getData->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" id="save" class="btn btn-primary" onclick="return ConfirmDelete();">
                                                    <i class="fa fa-btn fa-trash"> Delete</i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ url('update_attendance',$getData->id) }}" class="btn btn-warning" style="text-decoration:none" ><i class="fa fa-btn fa-recycle"> Update</i></a>
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
                        <h4><center>No records to display</center></h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
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