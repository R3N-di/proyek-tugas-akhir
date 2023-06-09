@extends('layout/app')

@section('konten')
@php
    $hari = [
        'Monday' => 'Senin', 
        'Tuesday' => 'Selasa', 
        'Wednesday' => 'Rabu', 
        'Thursday' => 'Kamis', 
        'Friday' => "Jum'at",
        'Saturday' => 'Sabtu',
        'Sunday' => 'Minggu',
    ];
@endphp
<h4>{{ $hari[$dataTitle['hari']] }} </h4>
<div class="d-flex justify-content-between">
    <div>
        <form action="" method="get">
            <label for="kelas" class="form-label">Kelas :</label>
            <select name="kelas" id="kelas">
                @foreach ($dataKelas as $data)
                    <option value="{{ $data->kelas }}" {{ $dataTitle['kelas'] == $data->kelas ? 'selected' : '' ; }}>{{ $data->kelas }}</option>
                @endforeach
            </select>

            <label for="jurusan" class="form-label">Jurusan :</label>
            <select name="jurusan" id="jurusan">
                @foreach ($dataJurusan as $data)
                    <option value="{{ $data->jurusan }}" {{ $dataTitle['jurusan'] == $data->jurusan ? 'selected' : '' ; }}>{{ $data->nama }}</option>
                @endforeach
            </select>

            <label for="tanggal" class="form-label">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" value="{{ $dataTitle['tanggal'] }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
    <div>
        {{-- <a href="/guru" class="btn btn-warning mt-5">Daftar Guru</a> --}}
        {{-- <a href="/guru/cetak_pdf" class="btn btn-success mt-5">Cetak PDF</a> --}}
        <form action="/absenGuru/cetak_pdf" method="get">
            @if (request('kelas')) 
                <input type="hidden" name="kelas" value="{{ request('kelas') }}">
            @endif
            @if (request('jurusan')) 
                <input type="hidden" name="jurusan" value="{{ request('jurusan') }}">
            @endif
            @if (request('tanggal')) 
                <input type="hidden" name="tanggal" value="{{ request('tanggal') }}">
            @endif
                <input class="btn btn-success" type="submit" value="Cetak PDF">
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
      </tr>
    </thead>
    <tbody>
        @foreach ($dataSiswa as $data)
            <tr>
                <td>1</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->jk }}</td>
                <td>
                    @foreach ($dataAbsen as $data2)
                        {{-- {{ $data->idsiswa != $data2->idsiswa ? '' : $data2->status ; }} --}}
                        @if ($data->idsiswa == $data2->idsiswa)
                            <!-- Button trigger modal -->
                            <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data2->idsiswa }}">
                                {{ $data2->status }}
                            </button>
                        @else
                            
                        @endif
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $data2->idsiswa }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <label for="keterangan" class="form-label">Keterangan Izin</label>
                                <textarea class="form-control mb-3" name="keterangan" id="keterangan" rows="3" disabled>{{ $data2->keterangan }}</textarea>
                                <img src="{{ url('gambar/' . $data2->gambar) }}" class="img-fluid rounded-top" alt="Siswa Tidak Meyertakan gambar">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
