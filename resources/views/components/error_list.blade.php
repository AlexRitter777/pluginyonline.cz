@if ($errors->any())

    <div class="alert alert-danger rounded-1 form-errors">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
