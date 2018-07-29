@extends('layouts.app')
@section('content')
 <script src="{{ asset("global/js/validation.js")}}"></script>
    <div class="page-content padding-0 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-lg-12 col-xlg-9" id="recentAudits">
                <div class="widget widget-shadow table-row">
                    <div class="widget-header padding-20">
                        <h3 class="widget-header blue-grey-700">Events</h3>
                    </div>
                    @include('common.errors')
                    @if(count($getEventData) > 0)

                        <div class="widget-content bg-white table-responsive padding-20 padding-bottom-25">
                            <table class="table table-hover table-responsive table-striped" id="tblRecentAudits">
                                <tbody>
                                <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                                @foreach($getEventData as $getData)
                                    <tr style="height:100px">
                                        <td style="vertical-align: top;">  &nbsp<b>{{ $getData->event_name }}</b></td>
                                        <td  style="text-align:justify;"> {{ $getData->event_description }}</td>
                                          <td>
                                          {{--<td style="vertical-align: top;">--}}
                                            <a href="{{ asset('/images/events/'.$getData->event_image)}}"
                                               target="_blank"><img
                                                        src="{{ url('/images/events/'.$getData->event_image)}}"
                                                        alt="event" height="100" width="100"></a>
                                              </td>
                                        <td>
                                        {{--<td style="vertical-align: top;">--}}
                                            <form action="{{url('delete_events/'.$getData->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" id="save" class="btn btn-info"  onclick="return ConfirmDelete();">
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