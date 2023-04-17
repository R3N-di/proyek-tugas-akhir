@extends('layout.app')

@section('konten')
<a class="btn btn-success" href="{{ url('/guru/create') }}" role="button">Tambah ++</a>

<div class="d-flex justify-content-between">
    <div>
        <form class="d-flex" action="/guru" method="get">
            <div class="mt-3 mb-3">
                <label for="idmapel" class="form-label">Mapel :</label>
                <select class="form-control" name="cari" id="idmapel">
                    @foreach ($dataMapel as $mapel)
                        <option value="{{$mapel->mapel}}">{{$mapel->mapel}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                    {{-- <a class="btn btn-primary btn-md ms-2 mt-5" href="cari" type="submit">Cari</a> --}}
                    <input class="btn btn-primary mt-5 ms-1" type="submit" value="Cari">
            </div>
        </form>
    </div>

    <div class="mt-5">
        <form class="d-flex" action="/guru" method="get">
            <input type="text" class="form-control" name="cari" aria-describedby="helpId" placeholder="Cari guru..." autocomplete="off">
            <input class="btn btn-primary" type="submit" value="Cari">
        </form>
    </div>
    <div>
        <a href="/guru" class="btn btn-warning mt-5">Daftar Guru</a>
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
      @foreach($dataGuru as $key => $data)
      <tr>
        <th scope="row">{{$dataGuru -> firstitem() + $key}}</th>
        <td>{{$data->nip}}</td>
        <td>{{$data->nama}}</td>
        <td>{{$data->jk}}</td>
        <td>{{$data->password_no_hash}}</td>
        <td>
            <div class="d-flex gap-2">
                <a class="btn btn-primary btn-sm" href="{{ url('guru/'.$data->idguru) }}" role="button">Detail</a>
                <a class="btn btn-warning btn-sm" href="/guru/{{ $data->idguru }}/edit" role="button">Edit</a>
            {{-- <a class="btn btn-danger btn-sm" href="/guru/{{ $data->id }}" role="button">delete</a>  --}}
            <form onsubmit="return confirm('Yakin Ingin Hapus Data?')" action="{{ url('guru/'.$data->idguru) }}" method="post">
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
  {{$dataGuru->links()}}
@endsection
