@extends('layout/app')

@section('konten')
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
                'Monday' => 'Senin',
                'Tuesday' => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday' => 'Kamis',
                'Friday' => "Jum'at",
                'Saturday' => 'Sabtu',
                'Sunday' => 'Minggu',
            ];
        @endphp
        @foreach ($dataMengajar as $data)
            <tr>
                <td scope="row">1</td>
                <td scope="row">{{ $hari[$data->hari] }}</td>
                <td scope="row">{{ $data->guru->idmapel }}</td>
                <td scope="row">{{ $data->guru->nama }}</td>
                <td scope="row">{{ $data->masuk }}</td>
                <td scope="row">{{ $data->selesai }}</td>
                <td scope="row">
                    <div class="d-flex gap-1">
                        <form action="" method="POST">
                            @csrf
                            <input type="text" class="form-control" name="status" id="status" value="hadir" hidden>
                            <input type="text" class="form-control" name="masuk" id="masuk" value="{{ $data->masuk }}" hidden>
                            <input type="text" class="form-control" name="selesai" id="selesai" value="{{ $data->selesai }}" hidden>
                            <input type="time" class="form-control" name="absen" id="absen" value="{{ date('H:i:s') }}" hidden>
                            <input type="text" class="form-control" name="idmengajar" id="idmengajar" value="{{ $data->idmengajar }}" hidden>
                            <input type="text" class="form-control" name="idguru" id="idguru" value="{{ $data->idguru }}" hidden>
                            <button class="btn btn-success btn-sm" type="submit">Absen</button>
                        </form>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#izin">
                            Izin
                        </button>
                    </div>
                    
                </td>
                <!-- Modal -->
                <div class="modal fade" id="izin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
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
                                        <input type="text" class="form-control" name="masuk" id="masuk" value="{{ $data->masuk }}" hidden>
                                        <input type="text" class="form-control" name="selesai" id="selesai" value="{{ $data->selesai }}" hidden>
                                        <input type="time" class="form-control" name="absen" id="absen" value="{{ date('H:i:s') }}" hidden>
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
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-warning">Izin</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection
