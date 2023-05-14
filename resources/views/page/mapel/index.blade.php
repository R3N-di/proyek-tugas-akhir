@extends('layout.app')

@section('konten')
    <a class="btn btn-success" href="{{ url('/mapel/create') }}" role="button">Tambah ++</a>

    <div class="d-flex justify-content-between">
        <div>
            <form class="d-flex" action="/mapel" method="get">
                @if (request('cari'))
                    <input type="hidden" class="form-control" name="cari" value="{{ request('cari') }}">
                @endif
                <div class="mt-3 mb-3">
                    <label for="idmapel" class="form-label">Mapel :</label>
                    <select class="form-control" name="mapel" id="idmapel">
                        @foreach ($dataMapel as $mapel)
                            <option value="{{ $mapel->mapel }}">{{ $mapel->mapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input class="btn btn-primary mt-5 ms-1" type="submit" value="Cari">
                </div>
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
        <div>
            <a href="/mapel" class="btn btn-warning mt-5">Daftar Mapel</a>
            {{-- <a href="/guru/cetak_pdf" class="btn btn-success mt-5">Cetak PDF</a> --}}
            <form action="/guru/cetak_pdf" method="get">
                @if (request('mapel'))
                    <input type="hidden" name="mapel" value="{{ request('mapel') }}">
                @endif
                @if (request('cari'))
                    <input type="hidden" class="form-control" name="cari" value="{{ request('cari') }}">
                @endif
                <input class="btn btn-success" type="submit" value="Cetak PDF">
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
            @foreach ($dataMapel as $data)
                <tr>
                    {{-- <th scope="row">{{ $dataMapel->firstitem() + $key }}</th> --}}
                    <td>{{ $data->mapel }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a class="btn btn-warning btn-sm" href="/mapel/{{ $data->mapel }}/edit" role="button">Edit</a>
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
    {{-- {{ $dataMapel->links() }} --}}
@endsection
