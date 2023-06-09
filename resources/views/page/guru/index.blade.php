@extends('layout.app')

@section('konten')
<a class="btn btn-success" href="{{ url('/guru/create') }}" role="button">Tambah ++</a>

<div class="d-flex justify-content-between">
    <div>
        <form class="d-flex" action="/guru" method="get">
            @if (request('cari'))
                <input type="hidden" class="form-control" name="cari" value="{{ request('cari') }}">
            @endif
            <div class="mt-3 mb-3">
                <label for="idmapel" class="form-label">Mapel :</label>
                <select class="form-control" name="mapel" id="idmapel">
                    @foreach ($dataMapel as $mapel)
                        <option value="{{$mapel->mapel}}">{{$mapel->mapel}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                    {{-- <a class="btn btn-primary btn-md ms-2 mt-5" href="cari" type="submit">Cari</a> --}}
                    <input class="btn btn-primary mt-5 ms-1" type="submit" value="mapel">
            </div>
        </form>
    </div>

    <div class="mt-5">
        <form class="d-flex" action="/guru" method="get">
            @if (request('mapel')) 
                <input type="hidden" name="mapel" value="{{ request('mapel') }}">
            @endif
                <input type="text" class="form-control" name="cari" aria-describedby="helpId" placeholder="Cari guru..." autocomplete="off" value="{{ request('cari') }}">
                <input class="btn btn-primary" type="submit" value="Cari">
        </form>
    </div>
    <div>
        <a href="/guru" class="btn btn-warning mt-5">Daftar Guru</a>
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
