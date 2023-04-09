@extends('layout.app')

@section('konten')
<a class="btn btn-success" href="{{ url('/guru/create') }}" role="button">Tambah ++</a>

<div class="d-flex justify-content-between">
    <div>
        <form action="" method="">
            <label for="idmapel" class="form-label">Mapel :</label>
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
        <th scope="col">NIP</th>
        <th scope="col">Nama</th>
        <th scope="col">JK</th>
        <th scope="col">Password</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($dataGuru as $data)
      <tr>
        <th scope="row">{{++$i}}</th>
        <td>{{$data->nip}}</td>
        <td>{{$data->nama}}</td>
        <td>{{$data->jk}}</td>
        <td>{{$data->password}}</td>
        <td>
            <a class="btn btn-primary btn-sm" href="{{ url('guru/'.$data->idguru) }}" role="button">Detail</a>
            <a class="btn btn-warning btn-sm" href="/guru/{{ $data->idguru }}/edit" role="button">Edit</a>
            {{-- <a class="btn btn-danger btn-sm" href="/guru/{{ $data->id }}" role="button">delete</a>  --}}
            <form onsubmit="return confirm('Yakin Ingin Hapus Data?')" action="{{ url('guru/'.$data->idguru) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$dataGuru->links()}}
@endsection
