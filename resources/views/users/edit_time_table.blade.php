@extends('layouts.app')
@section('content')
    @include('common.errors')


    <form action="{{ url('/update_time_table') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <!-- Task Name -->
        <input name="_method" type="hidden" value="PUT">
        <input type="hidden" name="task_id" value="{{ $data->id }}">
        <div class="form-group">
            <div class="col-sm-6">

                <input type="text" name="name" id="task_name" class="form-control" value="{{ $data->name }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-6">

                <input type="file" name="time_table" file-model="time_table">

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    </i>Update Time Table
                </button>
            </div>
        </div>
    </form>

@endsection