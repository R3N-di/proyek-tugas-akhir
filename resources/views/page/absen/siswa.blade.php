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
        <th scope="col">Hari</th>
        <th scope="col">Mapel</th>
        <th scope="col">Guru</th>
        <th scope="col">Masuk</th>
        <th scope="col">Selesai</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @php
            $hari = [
                'monday' => 'Senin', 
                'tuesday' => 'Selasa', 
                'wednesday' => 'Rabu', 
                'thursday' => 'Kamis', 
                'friday' => 'Jumat'
            ];
        @endphp
        @foreach ($dataMengajar as $data)
            <tr>
                <th scope="row">1</th>
                <th scope="row">{{ $hari[$data->hari] }}</th>
                <th scope="row">{{ $data->guru->idmapel }}</th>
                <th scope="row">{{ $data->guru->nama }}</th>
                <th scope="row">{{ $data->masuk }}</th>
                <th scope="row">{{ $data->selesai }}</th>
                <th scope="row">
                    <div class="d-flex gap-1">
                        <form action="" method="POST">
                            @csrf
                            <input type="text" class="form-control" name="status" id="status" value="hadir" hidden>
                            <input type="text" class="form-control" name="idmengajar" id="idmengajar" value="{{ $data->idmengajar }}" hidden>
                            <input type="text" class="form-control" name="idguru" id="idguru" value="{{ $data->idguru }}" hidden>
                            <button class="btn btn-success btn-sm" type="submit">Absen</button>
                        </form>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Izin
                        </button>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form Izin</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                      <input type="text" class="form-control" name="status" id="status" value="Izin" hidden>
                                      <input type="text" class="form-control" name="idmengajar" id="idmengajar" value="{{ $data->idmengajar }}" hidden>
                                      <input type="text" class="form-control" name="idguru" id="idguru" value="{{ $data->idguru }}" hidden>

                                      <label for="keterangan" class="form-label">Keterangan Izin</label>
                                      <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                                      <div class="mb-3">
                                        <label for="gambar" class="form-label">Sertakan Gambar (boleh tidak di isi kecuali sakit)</label>
                                        <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="fileHelpId">
                                        <div id="fileHelpId" class="form-text">Keterangan izin/sakit kembali ditentukan oleh guru masing masing Mapel</div>
                                      </div>
                                    </div>
                                </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning">Izin</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </th>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection
