@extends('layout/app')

@section('konten')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">JK</th>
        <th scope="col">Status</th>
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
