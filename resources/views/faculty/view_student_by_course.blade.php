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
                        <h3 class="widget-header blue-grey-700">Students Records</h3>
                        </div>
                        <div class="col-sm-3">
                          @include('common.search',['url'=>'studentSearch'])
                    </div>
                    </div>
                    @if(count($getStudentData) > 0)

                        <div class="widget-content bg-white table-responsive padding-20 padding-bottom-25">
                            <table class="table table-hover table-responsive table-striped" id="tblRecentAudits">
                                <tbody>
                                <tr>
                                <th>No</th>
                                <th>Roll No</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th colspan="4" style="text-align:left;">Action</th>
                                </tr>
                                <?php
                                $i = 0;
                                ?>
                                @foreach($getStudentData as $getData)
                                    <tr>
                                        <td>
                                            <?php
                                            $i = $i + 1;
                                            echo $i;
                                            ?>
                                        </td>
                                        <td>
                                        {{ $getData->roll_no }}
                                        </td>
                                        <td>
                                            {{ $getData->name ." ".$getData->middle_name ."   ". $getData->last_name }}
                                        </td>
                                          <td>
                                            {{ $getData->course_name }}
                                        </td>
                                        <td>
                                            <form action="{{url('delete_student/'.$getData->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" id="save" class="btn btn-primary" onclick="return ConfirmDelete();">
                                                    <i class="fa fa-btn fa-trash">&nbsp Delete</i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ url('student_view',$getData->id) }}" class="btn btn-info" style="text-decoration:none"><i class="fa fa-btn fa-eye"> View</i></a>
                                        </td>
                                        <td>
                                            <a href="{{ url('update_student',$getData->id) }}" class="btn btn-warning" style="text-decoration:none">Update</a>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h4>
                            <center>No records to display</center>
                        </h4>
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