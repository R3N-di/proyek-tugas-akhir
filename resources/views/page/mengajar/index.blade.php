@extends('layout/app')

@section('konten')
<div class="d-flex justify-content-between">
    <div>
    <a class="btn btn-success" href="{{ url('/mengajar/create') }}" role="button">Tambah ++</a>
        <form class="d-flex" action="" method="">
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
                <a class="btn btn-primary mt-5 ms-1" href="#" role="button">Cari</a>
            </div>
        </form>
    </div>
    <div>
        <form class="d-flex" action="/mengajar" method="get">
            @if (request('jurusan'))
                <input type="hidden" class="form-control" name="kelas" value="{{ request('kelas') }}">
                <input type="hidden" class="form-control" name="jurusan" value="{{ request('jurusan') }}">
            @endif
            <input type="text" class="form-control" name="cari" aria-describedby="helpId" placeholder="cari jam pelajaran..." autocomplete="off">
            <input class="btn btn-primary" type="submit" value="Cari">
        </form>
    </div>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Masuk</th>
        <th scope="col">Selesai</th>
        <th scope="col">Hari</th>
        <th scope="col">Kelas</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Guru</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @php
            $hari = [
                'Monday' => 'Senin',
                'Tuesday' => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday' => 'Kamis',
                'Friday' => 'Jumat',
                'Saturday' => "Jum'at",
                'Sunday' => 'Minggu',
            ];
        @endphp
        @foreach($dataMengajar as $key => $data)
        <tr>
            <td scope="row">
                {{ $dataMengajar->firstitem() + $key }}
            </td>
            <td scope="row">{{ $data->masuk }}</td>
            <td scope="row">{{ $data->selesai }}</td>
            <td scope="row">{{ $hari[$data->hari] }}</td>
            <td scope="row">{{ $data->idkelas }}</td>
            <td scope="row">{{ $data->idjurusan }}</td>
            {{-- <td>{{ json_decode(json_encode(App\Models\Guru::where('idguru', $data->idguru)->get()->first()['nama']),true)}}</td> --}}
            <td scope="row">{{ $data->guru->nama }}</td>
            <td>
                <a class="btn btn-warning btn-sm" href="/mengajar/{{ $data->idmengajar }}/edit" role="button">Edit</a>
                {{-- <a class="btn btn-danger btn-sm" href="/mengajar/{{ $data->idmengajar }}" role="button">delete</a>  --}}
                <form onsubmit="return confirm('Yakin Ingin Hapus Data?')" action="{{ url('mengajar/'.$data->idmengajar) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
