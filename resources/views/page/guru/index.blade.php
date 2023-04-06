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
        <td><a class="btn btn-primary btn-sm" href="/detail/{{ $data->id }}" role="button">Detail</a> 
            <a class="btn btn-warning btn-sm" href="/edit/{{ $data->id }}" role="button">Edit</a> 
            <a class="btn btn-danger btn-sm" href="/delete/{{ $data->id }}" role="button">delete</a> 
        </td>
      </tr>
      @endforeach
      <tr>
    </tbody>
  </table>
  {{$dataGuru->links()}}
@endsection
