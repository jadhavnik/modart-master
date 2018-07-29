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
  <script src="{{ asset("global/js/validation.js")}}"></script>
    @include('common.errors')
    
    <div class="page-content padding-0 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-lg-12 col-xlg-9" id="recentAudits">
                <div class="widget widget-shadow table-row">
                    <div class="widget-header padding-20">
                      <div class="col-sm-9">
                                <h3 class="widget-header blue-grey-700">Faculty Records</h3>
                            </div>
                            <div class="col-sm-3">
                                @include('common.search',['url'=>'facultySearch'])
                            </div>
                    </div>
                    @if(count($facultyData) > 0)
                        <div class="widget-content bg-white table-responsive padding-20 padding-bottom-25">
                            <table class="table table-hover table-responsive table-striped" id="tblRecentAudits">
                                <tbody>
                                <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th colspan="4" style="text-align:left;">Action</th>
                                </tr>
                                <?php
                                $i = 0;
                                ?>
                                @foreach($facultyData as $getData)
                                    <tr>
                                        <td>
                                            <?php
                                            $i=$i+1;
                                            echo $i;
                                            ?>
                                        </td>
                                        <td>
                                            {{ $getData->name ."   ". $getData->last_name }}
                                        </td>
                                         <td>
                                            {{ $getData->course_name }}
                                        </td>
                                        <td>
                                            <form action="{{url('delete_faculty/'.$getData->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" id="save" class="btn btn-primary"  onclick="return ConfirmDelete();">
                                                    <i class="fa fa-btn fa-trash"> Delete</i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ url('faculty_view',$getData->id) }}" class="btn btn-info" style="text-decoration:none" ><i class="fa fa-btn fa-eye"> View</i></a>
                                        </td>
                                        <td>
                                            <a href="{{ url('update_faculty',$getData->id) }}" class="btn btn-warning" style="text-decoration:none" ><i class="fa fa-btn fa-recycle"> Update</i></a>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination right-align">
                            {{ $facultyData->render() }}
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