@extends('layouts.template')
@section('page')
    <div class="page animsition" id="homeNav">
        <div class="page-header">
            <h1 class="page-title">@yield('title')</h1>
            @include('flash::message')
            <div class="page-header-actions">
                @yield('page-header-actions')
            </div>
        </div>
        <div class="page-content">
            <div class="panel">
                @if(isset($panel_title))
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$panel_title}}</h3>
                        <div class="panel-actions">
                            @yield('panel-actions')
                        </div>
                    </div>
                @endif

                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <p id="errorMessage" style="margin: 0" ></p>
@stop


