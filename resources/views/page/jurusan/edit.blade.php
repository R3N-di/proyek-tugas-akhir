@extends('layout.app')

@section('konten')
<a class="btn btn-secondary" href="{{ url('jurusan/') }}" role="button"><< Kembali</a>
    <form action="/jurusan/{{ $dataJurusan->jurusan }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h3>Edit Jurusan</h3>
        <div class="mb-3">
          <label for="jurusan" class="form-label">Nama Jurusan</label>
          <input type="text" class="form-control" name="jurusan" id="jurusan" aria-describedby="helpId" placeholder="Masukan Jurusan..." value="{{ $dataJurusan->nama }}">
          <small id="helpId" class="form-text text-muted">Format Jurusan : Rekayasan Perangkat Lunak 2 -> RPL-2</small>
        </div>
        <button type="submit" class="btn btn-warning">Edit</button>
    </form>
@endsection
