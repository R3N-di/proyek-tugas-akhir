@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <ul>
                <strong>Terjadi Kesalahan!</strong>
                <li>{{ $error }}</li>
            </ul>
        </div>
    @endforeach
@endif

@if (Session::get('info'))
    <div class="alert alert-success" role="alert">
        <strong>Info </strong>{{ Session::get('info') }}
    </div>
@endif
