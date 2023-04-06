@extends('layout.app')

@section('konten')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">NIS</th>
        <th scope="col">Nama</th>
        <th scope="col">JK</th>
        <th scope="col">Password</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ( $dataSiswa as $data )
        <tr>
            <th scope="row">1</th>
            <td>{{$data->nis}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->jk}}</td>
            <td>{{$data->password}}</td>
            <td>Detail || Edit || Pass || Delete</td>
        </tr>
        @endforeach
      <tr>
    </tbody>
  </table>
  {{$dataSiswa -> links() }}
@endsection
