@extends('layout.app')

@section('konten')
    <div class="d-flex justify-content-center">
        <div >
            <img src="{{ url('gambar/' . $dataGuru->gambar) }}" width="150px"> <br>
            <strong>Nama</strong> <br>
            <p>{{ $dataGuru->nama }}</p>
            <strong>Guru</strong> <br>
            <p>{{ $dataGuru->idmapel }}</p>
        </div>
        <div class="ps-4">
            <strong>NIP</strong> <br>
            <p>{{ $dataGuru->nip }}</p>
            <strong>Password</strong> <br>
            <p>{{ $dataGuru->password }}</p>
            <strong>Jenis Kelamin</strong> <br>
            <p>{{ $dataGuru->jk == "P" ? "Perempuan" : "Laki-Laki" ; }}</p>
            <a class="btn btn-secondary" href="{{ url('guru/') }}" role="button"><< Kembali</a>
        </div>
    </div>
@endsection