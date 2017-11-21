@if (Session::has('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fa fa-check-circle" aria-hidden="true"></i> SUCCESS:</strong> {{ Session::get('success') }}
        <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif

@if (count($errors) > 0)

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fa fa-times-circle" aria-hidden="true"></i> ERROR:</strong>
        <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif