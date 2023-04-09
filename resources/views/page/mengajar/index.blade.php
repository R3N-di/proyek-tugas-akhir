@extends('layout/app')

@section('konten')
<div class="d-flex justify-content-between">
    <div>
        <form action="" method="">
            <label for="idmapel" class="form-label">Kelas :</label>
            <select name="idmapel" id="idmapel">
                <option value="Coba">Coba</option>
            </select>
            
            <label for="idmapel" class="form-label">Jurusan :</label>
            <select name="idmapel" id="idmapel">
                <option value="Coba">Coba</option>
            </select>
            <a class="btn btn-primary btn-sm" href="#" role="button">Cari</a>
        </form>
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
