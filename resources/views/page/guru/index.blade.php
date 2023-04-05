@extends('layout.app')

@section('konten')
<a class="btn btn-success" href="{{ url('/guru/create') }}" role="button">Tambah ++</a>
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
        <th scope="row">1</th>
        <td>{{$data->nip}}</td>
        <td>{{$data->nama}}</td>
        <td>{{$data->jk}}</td>
        <td>{{$data->password}}</td>
        <td>Detail || Edit || Pass || Delete</td>
      </tr>
      @endforeach
      <tr>
    </tbody>
  </table>
@endsection
