@extends('layouts.app')
@section('content')
    <div class="page animsition" style="margin-left: 0%;">
        <div class="page-content padding-30 container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xlg-9 col-lg-12">
                    <div class="row height-full"  data-plugin="matchHeight">
                        @include('common.errors')
                        @if(count($getEventData) > 0)
                            @foreach($getEventData as $getData)
                                <div class="col-xlg-4 col-lg-4 col-sm-4 col-xs-12">
                                    <div class="widget widget-shadow widget-completed-options">
                                        <div class="widget-content padding-30">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="counter text-center blue-grey-700">
                                                        <a href="{{ url('/event_description',$getData->id)}}" class="link btn-link">
                                                              <img  class="imgdemo"  src="{{URL::asset('/images/events/'.$getData->event_image)}}"
                                                                  alt="event" height="300" width="300" >
                                                            <div>
                                                                <h4 style="margin-top: 12px;"> {{ $getData->event_name }}</h4>
                                                                <br>Read More
                                                            </div>
                                                            <div>
                                                                <h5>  </h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h4>
                                <center>No records to display</center>
                            </h4>
                        @endif
                    </div>
                    <ul class="pagination right-align">
                        {{ $getEventData->render() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection