@extends('layout.app')

@section('konten')
    <form action="/siswa" class="" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Tambah Siswa</h3>
        <div class="mb-3">
          <label for="jurusan" class="form-label">Nama Jurusan</label>
          <input type="text" class="form-control" name="jurusan" id="jurusan" aria-describedby="helpId" placeholder="Masukan Jurusan...">
          <small id="helpId" class="form-text text-muted">Format Jurusan : Rekayasan Perangkat Lunak 2 -> RPL-2</small>
        </div>>
        <a class="btn btn-secondary" href="{{ url('/jurusan') }}" role="button"><< Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
