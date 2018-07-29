@extends('layouts.app')
@section('content')
  <script src="{{ asset("global/js/validation.js")}}"></script>
    @include('common.errors')
    <div class="page-content padding-0 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-lg-12 col-xlg-9" id="recentAudits">
                <div class="widget widget-shadow table-row">
                    <div class="widget-header padding-20">
                        <h3 class="widget-header blue-grey-700">Time Tables</h3>
                    </div>
                    @if(count($getTimeTable) > 0)
                        <table class="table table-no-bordered">
                            <tbody>
                             <tr>
                               <th>No</th>
                                <th>Course</th>
                                <th colspan="2" style="text-align:left;">Action</th>
                                </tr>
                                  <?php
                                $i = 0;
                                ?>
                            @foreach($getTimeTable as $getData)
                                <tr><td>
                                            <?php
                                            $i = $i + 1;
                                            echo $i;
                                            ?>
                                        </td>
                                    <td>
                                        <div>
                                            {{ $getData->name }}
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{url('delete_time_table/'.$getData->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="save" class="btn btn-primary"  onclick="return ConfirmDelete();">
                                                <i class="fa fa-btn fa-trash">&nbsp Delete</i>
                                            </button>
                                            <a href="{{ url('/faculty_time_table',$getData->id)}}"
                                               class="btn btn-info" style="text-decoration:none" ><i class="fa fa-btn fa-eye"> View</i></a>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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