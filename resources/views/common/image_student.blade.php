@if(isset($onlyImage))
    @if($image)
        <img src="{{ $url }}" alt="profile-picture">
    @else
        <img src="{{ asset("global/portraits/5.jpg") }}" alt="...">
    @endif
@else
    @if($image)
        <div class="clearfix">
           
                <img src="{{ url('/images/student/'.$url) }}" height="80"
                     class="pull-left" style="margin:0 10px 10px 0"> &nbsp; {{-- basename($image ) --}}
        </div>
         <div class="clearfix">
        <div class="checkbox-custom checkbox-success">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="{{ $del }}" id="logo-delete-check" type="checkbox" value="1"> <label>Delete</label>
        </div>
        </div>
    @endif
@endif
