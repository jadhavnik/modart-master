@extends('layouts.app')
@section('content')

    <div class="page-content padding-0 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-lg-12 col-xlg-9" id="recentAudits">
                <div class="widget widget-shadow table-row">

                    @include('common.errors')

                    @if(count($data) > 0)
                        <div class="widget-header padding-20">
                            <h3 class="widget-header blue-grey-700">Time Table</h3>

                        </div>
                    <div class="widget-content bg-white table-responsive padding-20 padding-bottom-25">
                        <table class="table table-hover table-responsive table-striped" id="tblRecentAudits">
                            <tbody>
                            @foreach($data as $k => $v)
                            <tr>
                                @foreach ($v as $key => $value)

                                    <td>
                                        {{ $v[$key] }}
                                   </td>

                                @endforeach
                            </tr>

                        @endforeach
                            </tbody>
                        </table>

                        @else

                                <h4>
                                    <center>No Time Table to display</center>
                                </h4>
                        {{--<ul class="pagination right-align">--}}
                            {{--{{ $data->render() }}--}}
                        {{--</ul>--}}
                        {{--@else--}}
                            {{--<h4><center>No records to display</center></h4>--}}
                        @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection



{{--<div class="widget-content bg-white table-responsive padding-20 padding-bottom-25">--}}
{{--<table class="table table-hover table-responsive table-striped" id="tblRecentAudits">--}}
{{--<tbody>--}}
{{--@foreach($getEventData as $getData)--}}
{{--<tr>--}}
{{--<td>--}}
{{--<div>--}}
{{--{{ $getData->event_name }}--}}
{{--</div>--}}
{{--</td>--}}
{{--<td>--}}
{{--<div>--}}
{{--{{ $getData->event_description }}--}}
{{--</div>--}}
{{--</td>--}}
{{--<td>--}}
{{--<form action="{{url('delete_events/'.$getData->id)}}" method="POST">--}}
{{--{{ csrf_field() }}--}}
{{--{{ method_field('DELETE') }}--}}
{{--<button type="submit" id="save" class="btn btn-primary">--}}
{{--<i class="fa fa-btn fa-trash">&nbsp Delete</i>--}}
{{--</button>--}}
{{--<a href="{{ url('/time_table/edit_time_table',$getData->id)}}" class="btn btn-primary">Edit Task</a>--}}

{{--</form>--}}
{{--</td>--}}
{{--<td>--}}
{{--<a href="{{URL::asset('/images/events/'.$getData->event_image)}}"--}}
{{--target="_blank"><img--}}
{{--src="{{URL::asset('/images/events/'.$getData->event_image)}}"--}}
{{--alt="time table" height="100" width="100"></a>--}}
{{--height="600" width="500"></a>--}}
{{--</td>--}}
{{--</tr>--}}
{{--@endforeach--}}
{{--</tbody>--}}
{{--</table>--}}
{{--</div>--}}

{{--<ul class="pagination right-align">--}}
{{--{{ $getEventData->render() }}--}}
{{--<li class="paginate_button">--}}
{{--{{   $getEventData->previousPageUrl() }}--}}
{{--</li>--}}
{{--<li  class="paginate_button">--}}
{{--{{ $getEventData->currentPage()  }}--}}
{{--</li>--}}
{{--<li  class="paginate_button">--}}
{{--{{    $getEventData->nextPageUrl() }}--}}
{{--</li>--}}
{{--</ul>--}}

{{--@else--}}
{{--<h4>--}}
{{--<center>No records to display</center>--}}
{{--</h4>--}}
{{--@endif--}}









{{--@extends('layouts.app')--}}
{{--@section('content')--}}
    {{--@include('common.errors')--}}
    {{--<div class="page-content padding-0 container-fluid">--}}
        {{--<div class="row" data-plugin="matchHeight" data-by-row="true">--}}
            {{--<div class="col-lg-12 col-xlg-9" id="recentAudits">--}}
                {{--<div class="widget widget-shadow table-row">--}}
                    {{--<div class="widget-header padding-20">--}}
                        {{--<h3 class="widget-header blue-grey-700">Time Tables</h3>--}}
                    {{--</div>--}}

                    {{--@if(count($getTimeTable) > 0)--}}

    {{--<table class="table table-no-bordered">--}}
        {{--<tbody>--}}
        {{--@foreach($getTimeTable as $getData)--}}
            {{--<tr>--}}
                {{--<td>--}}
                    {{--<div>--}}
                        {{--{{ $getData->name }}--}}
                    {{--</div>--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--<form action="{{url('delete_time_table/'.$getData->id)}}" method="POST">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--{{ method_field('DELETE') }}--}}
                        {{--<button type="submit" id="save" class="btn btn-primary">--}}
                            {{--<i class="fa fa-btn fa-trash">&nbsp Delete</i>--}}
                        {{--</button>--}}
                        {{--<a href="{{ url('/time_table/edit_time_table',$getData->id)}}" class="btn btn-primary">Edit Task</a>--}}

                    {{--</form>--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--<a href="{{URL::asset('/images/'.$getData->time_table)}}" target="_blank"><img src="{{URL::asset('/images/'.$getData->time_table)}}" alt="time table" height="100" width="100"></a>--}}
                                                                                                   {{--height="600" width="500"></a>--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
    {{--</table>--}}
                    {{--@else--}}
                        {{--<h4><center>No records to display</center></h4>--}}
                    {{--@endif--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}