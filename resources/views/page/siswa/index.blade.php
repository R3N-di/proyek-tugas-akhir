@extends('layout.app')

@section('konten')
<a class="btn btn-success" href="{{ url('/siswa/create') }}" role="button">Tambah ++</a>
<div class="d-flex justify-content-between">
    <div class="mb-3">
        <form class="d-flex" action="" method="">
         <div class="mt-3">
            <label for="idmapel" class="form-label">Kelas :</label>
            <select class="form-control" name="idmapel" id="idmapel">
                <option value="Coba">Coba</option>
            </select>
         </div>
         <div class="ms-3 mt-3">
            <label for="idjurusan" class="form-label">Jurusan :</label>
            <select class="form-control" name="idjurusan" id="idmapel">
                <option value="Coba">Coba</option>
            </select>
         </div>
         <div>
            <a class="btn btn-primary btn-md mt-5 ms-2" href="#" role="button">Cari</a>
        </div>
        </form>
    </div>
    <div class="mt-5">
        <form class="d-flex" action="/siswa" method="get">
            <input type="text" class="form-control" name="cari" aria-describedby="helpId" placeholder="Cari siswa..." autocomplete="off">
            <input class="btn btn-primary" type="submit" value="Cari">
        </form>
    </div>
    <div>
        <a href="/siswa" class="btn btn-warning mt-5">Daftar Siswa</a>
    </div>
</div>

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

        @foreach ( $dataSiswa as $key => $data )
        <tr>
            <th scope="row">
                {{ $dataSiswa->firstitem() + $key }}
           </th>
            <td>{{$data->nis}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->jk}}</td>
            <td>{{$data->password_no_hash}}</td>
            <td>
                <div class="d-flex gap-2">
                <a class="btn btn-primary btn-sm" href="/siswa/{{ $data->idsiswa }}" role="button">Detail</a>
                <a class="btn btn-warning btn-sm" href="/siswa/{{ $data->idsiswa }}/edit" role="button">Edit</a>
                {{-- <a class="btn btn-danger btn-sm" href="/guru/{{ $data->id }}" role="button">delete</a>  --}}
                <form onsubmit="return confirm('Yakin Ingin Hapus Data?')" action="{{ url('siswa/'.$data->idsiswa) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{$dataSiswa -> links() }}
@endsection
