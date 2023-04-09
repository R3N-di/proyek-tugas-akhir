@extends('layout/app')

@section('konten')
<div class="d-flex justify-content-between">
    <div>
    <a class="btn btn-success" href="{{ url('/mengajar/create') }}" role="button">Tambah ++</a>
        <form action="" method="">
            <label for="idmapel" class="form-label">Kelas :</label>
            <select name="idmapel" id="idmapel">
                <option value="Coba">Coba</option>
            </select>
            
            <label for="idmapel" class="form-label">Jurusan :</label>
            <select name="idmapel" id="idmapel">
                <option value="Coba">Coba</option>
            </select>
            <a class="btn btn-primary btn-sm" href="#" role="button">Cari</a>
        </form>
    </div>
    <div>
        <form class="d-flex" action="/absen" method="post">
            <input class="form-control" type="search" name="cari">
            <a class="btn btn-primary" href="#" role="button">Cari</a>
        </form>
    </div>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Masuk</th>
        <th scope="col">Selesai</th>
        <th scope="col">Idkelas</th>
        <th scope="col">Idjurusan</th>
        <th scope="col">Idguru</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datamengajar as $data)
        <tr>
            <th scope="row">1</th>
            <th scope="row">{{ $data->masuk }}</th>
            <th scope="row">{{ $data->selesai }}</th>
            <th scope="row">{{ $data->idkelas }}</th>
            <th scope="row">{{ $data->idjurusan }}</th>
            <th scope="row">{{ $data->idguru }}</th>
            <td>
                <a class="btn btn-warning btn-sm" href="/mengajar/{{ $data->idmengajar }}/edit" role="button">Edit</a>
                {{-- <a class="btn btn-danger btn-sm" href="/mengajar/{{ $data->idmengajar }}" role="button">delete</a>  --}}
                <form onsubmit="return confirm('Yakin Ingin Hapus Data?')" action="{{ url('mengajar/'.$data->idmengajar) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
