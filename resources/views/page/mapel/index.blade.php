@extends('layout.app')

@section('konten')
    <a class="btn btn-success" href="{{ url('/mapel/create') }}" role="button">Tambah ++</a>

    <div class="d-flex justify-content-between">
        <div>
            <form class="d-flex" action="/mapel" method="get">
                @if (request('cari'))
                    <input type="hidden" class="form-control" name="cari" value="{{ request('cari') }}">
                @endif
            </form>
        </div>


        <div class="mt-5">
            <form class="d-flex" action="/mapel" method="get">
                @if (request('mapel'))
                    <input type="hidden" name="mapel" value="{{ request('mapel') }}">
                @endif
                <input type="text" class="form-control" name="cari" aria-describedby="helpId"
                    placeholder="Cari mapel..." autocomplete="off" value="{{ request('cari') }}">
                <input class="btn btn-primary" type="submit" value="Cari">
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mapel</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataMapel as $key => $data)
                <tr>
                    <th scope="row">
                        {{ $dataMapel->firstitem() + $key }}</th>
                    <td>{{ $data->mapel }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a class="btn btn-warning btn-sm" href="mapel/{{ $data->mapel }}/edit" role="button">Edit</a>
                            <form onsubmit="return confirm('Yakin Ingin Hapus Data?')"
                                action="{{ url('mapel/' . $data->mapel) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dataMapel->links() }}
@endsection
