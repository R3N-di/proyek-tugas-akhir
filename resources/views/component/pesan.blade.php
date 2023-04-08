@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            <strong>Terjadi Kesalahan!</strong>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::get('info'))
    <div class="alert alert-success" role="alert">
        <strong>Info </strong>{{ Session::get('info') }}
    </div>
@endif
