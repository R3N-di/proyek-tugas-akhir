@extends('layout.app')

@section('konten')
<a class="btn btn-success" href="{{ url('/siswa/create') }}" role="button">Tambah ++</a>
<div class="d-flex justify-content-between">
    <div class="mb-3">
        <form class="d-flex" action="" method="get">
            @if (request('cari'))
                <input type="hidden" class="form-control" name="cari" placeholder="Cari siswa..." value="{{ request('cari') }}">
            @endif
            <div class="mt-3">
                <label for="kelas" class="form-label">Kelas :</label>
                <select class="form-control" name="kelas" id="kelas">
                    @foreach ($dataKelas as $kelas)
                        <option value="{{$kelas->kelas}}">{{$kelas->kelas}}</option>
                    @endforeach
                </select>
            </div>
            <div class="ms-3 mt-3">
                <label for="jurusan" class="form-label">Jurusan :</label>
                <select class="form-control" name="jurusan" id="jurusan">
                    @foreach ($dataJurusan as $jurusan)
                        <option value="{{$jurusan->jurusan}}">{{$jurusan->jurusan}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input class="btn btn-primary mt-5 ms-1" type="submit" value="Cari">
            </div>
        </form>
    </div>
    <div class="mt-5">
        <form class="d-flex" action="/siswa" method="get">
        @if (request('jurusan'))
            <input type="hidden" class="form-control" name="kelas" value="{{ request('kelas') }}">
            <input type="hidden" class="form-control" name="jurusan" value="{{ request('jurusan') }}">
        @endif
            <input type="text" class="form-control" name="cari" placeholder="Cari siswa..." autocomplete="off">
            <input class="btn btn-primary" type="submit" value="Cari">
        </form>
    </div>
    <div>
        <a href="/siswa" class="btn btn-warning mt-5">Daftar Siswa</a>
        {{-- <a href="/guru/cetak_pdf" class="btn btn-success mt-5">Cetak PDF</a> --}}
        <form action="/siswa/cetak_pdf" method="get">
            @if (request('kelas')) 
                <input type="hidden" name="kelas" value="{{ request('kelas') }}">
            @endif
            @if (request('jurusan')) 
                <input type="hidden" name="jurusan" value="{{ request('jurusan') }}">
            @endif
            @if (request('cari'))
                <input type="hidden" class="form-control" name="cari" value="{{ request('cari') }}">
            @endif
                <input class="btn btn-success" type="submit" value="Cetak PDF">
        </form>
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
