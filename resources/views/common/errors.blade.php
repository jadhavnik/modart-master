@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@else
    <div class="alert alert-danger" style="display: none" id="divError">
        <ul id="listErrors">
        </ul>
    </div>
@endif