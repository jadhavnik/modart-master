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
    {{--<div class="page animsition">--}}
    <div class="page-content padding-0 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-lg-12 col-xlg-9" id="recentAudits">
                <div class="widget widget-shadow table-row">
                    <div class="widget-header padding-20">
                        <h3 class="widget-header blue-grey-700">Student Result Information</h3>
                    </div>
                    @if(count($subjects) > 0)

                        <div class="widget-content bg-white table-responsive padding-20 padding-bottom-25">
                            <table class="table table-content" id="tblRecentAudits">
                                <tbody>
                                <tr>
                                    <th>Subject</th>
                                    <th>Faculty Name</th>
                                    <th>Marks</th>
                                    <th>Out off</th>
                                    <th colspan="2">Action</th>
                                </tr>

                                @foreach($subjects as $getData)
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
                                        <td>
                                            <a href="{{ url('update_data',$getData->id) }}" class="btn btn-info" style="text-decoration:none">Update Record</a>


                                            <form id="from1" action="{{url('delete_marks/'.$getData->id)}}" method="POST" style="display:inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" id="save" class="btn btn-info" onclick="return ConfirmDelete();">
                                                    <i class="fa fa-btn fa-trash">&nbsp Delete Record</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h4>
                            <center>No result to display</center>
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