@extends('layouts.app')
@section('content')
    <div class="page-content padding-0 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-lg-12 col-xlg-9" id="recentAudits">
                <div class="widget widget-shadow table-row">
                    <div class="widget-header padding-20">
                        <h3 class="widget-header blue-grey-700">Time Table</h3>
                    </div>
                    @include('common.errors')
                    @if(count($data) > 0)
                        @foreach($data as $k => $v)
                            <div>
                                @foreach ($v as $key => $value)
                                    {{ $value }}
                                @endforeach
                            </div>
                        @endforeach
                    @else
                        <h4>
                            <center>No Time Table to display</center>
                        </h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection