@extends('layouts.app')
@section('content')

    {{--<link rel="stylesheet" href="{{ asset("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css")}}">--}}
    {{--<script src="{{ asset("https://code.jquery.com/jquery-3.2.1.min.js")}}"></script>--}}
    {{--<script src="{{ asset("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js")}}"></script>--}}
    {{--<script src="{{ asset("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js")}}"></script>--}}
    {{--<script src="{{ asset("//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js")}}"></script>--}}
    <script src="{{ asset("global/js/validation.js")}}"></script>

    <div class="page-content padding-0 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-lg-12 col-xlg-9" id="recentAudits">
                <div class="widget widget-shadow table-row">
                    <div class="widget-header padding-20">
                        <h3 class="widget-header blue-grey-700">Courses</h3>

                    </div>
                    @include('common.errors')
                    @if(count($getEventData) > 0)

                        <div class="widget-content bg-white table-responsive padding-20 padding-bottom-25">
                            <table class="table table-hover table-responsive table-striped" id="tblRecentAudits">
                                <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Course Name</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $i = 0;
                                ?>
                                @foreach($getEventData as $getData)
                                    <tr>
                                        <td>
                                          <?php
                                            $i = $i + 1;
                                            echo $i;
                                            ?>
                                        </td>
                                        <td>
                                            {{ $getData->course_name }}
                                        </td>
                                        <td>
                                            <form id="from1" action="{{url('delete_course/'.$getData->id)}}" method="POST" style="display:inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" id="save" class="btn btn-info" onclick="return ConfirmDelete();">
                                                    <i class="fa fa-btn fa-trash">&nbsp Delete</i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination right-align">
                            {{ $getEventData->render() }}
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

@endsection