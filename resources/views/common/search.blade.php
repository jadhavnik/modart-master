{{--<meta name="csrf-token" content="{{ csrf_token() }}"/>--}}
{!! Form::open(['method'=>'POST','url'=>$url, 'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
{{--<a href="{{ url($link.'/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>--}}

<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="search" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </span>
</div>
{!! Form::close() !!}