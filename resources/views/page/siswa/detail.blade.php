@extends('layout.app')

@section('konten')
<div class="d-flex justify-content-center">
    <div >
        <img src="{{ url('gambar/' . $dataSiswa->gambar) }}" width="150px"> <br>
        <strong>Nama</strong> <br>
        <p>{{ $dataSiswa->nama }}</p>
        <strong>Siswa</strong> <br>
        <p>{{ $dataSiswa->idkelas }} - {{ $dataSiswa->idjurusan }}</p>
    </div>
    <div class="ps-4">
        <strong>NIS</strong> <br>
        <p>{{ $dataSiswa->nis }}</p>
        <strong>Password</strong> <br>
        <p>{{ $dataSiswa->password }}</p>
        <strong>Jenis Kelamin</strong> <br>
        <p>{{ $dataSiswa->jk == "P" ? "Perempuan" : "Laki-Laki" ; }}</p>
        <a class="btn btn-secondary" href="{{ url('siswa/') }}" role="button"><< Kembali</a>
    </div>
</div>

@endsection