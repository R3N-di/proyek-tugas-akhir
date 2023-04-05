@extends('layout.app')

@section('konten')
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
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>Detail || Edit || Pass || Delete</td>
      </tr>
      <tr>
    </tbody>
  </table>
@endsection
