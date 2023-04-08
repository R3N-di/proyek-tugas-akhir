@extends('layout/app')

@section('konten')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Hari</th>
        <th scope="col">Masuk</th>
        <th scope="col">Selesai</th>
        <th scope="col">Guru</th>
        <th scope="col">Mapel</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ( $dataSiswa as $data )
        <tr>
            <th scope="row">1</th>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
