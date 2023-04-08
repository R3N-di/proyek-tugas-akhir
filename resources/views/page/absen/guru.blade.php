@extends('layout/app')

@section('konten')
<div class="d-flex justify-content-between">
    <div>
        <label for="idmapel" class="form-label">Mapel :</label>
        <select name="idmapel" id="idmapel">
            <option value="Coba">Coba</option>
            <option value="Coba2">Coba2</option>
        </select>
    </div>
    <div>
        <form class="d-flex" action="/absen" method="post">
            <input class="form-control" type="search" name="cari">
            <a class="btn btn-primary" href="#" role="button">Cari</a>
        </form>
    </div>
</div>
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
        <tr>
            <th scope="row">1</th>
        </tr>
    </tbody>
</table>
@endsection
