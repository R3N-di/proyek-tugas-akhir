@extends('layout.app')

@section('konten')
    <form action="/mengajar/{{ $dataMengajar->idmengajar }}" method="post">
        @csrf
        @method('PUT')
        <h3>Edit Mengajar</h3>
        <div class="mb-3">
          <label for="idguru" class="form-label">Guru :</label>
          <select class="form-control" name="idguru" id="idguru">
            @foreach ($dataGuru as $data)
                <option value="{{ $data->idguru }}" {{ $data->idguru == $dataMengajar->idguru ? 'selected' : ' '; }}>{{ $data->nama }} - {{ $data->idmapel }}</option>
            @endforeach
          </select>
        </div>
        <div class="d-flex gap-5">
            <div class="mb-3">
                <label for="idkelas" class="form-label">Kelas :</label>
                <select class="form-control" name="idkelas" id="idkelas">
                    @foreach ($dataKelas as $data)
                        <option value="{{ $data->kelas }}"  {{ $data->kelas == $dataMengajar->idkelas ? 'selected' : ' '; }}>{{ $data->kelas }}</option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3">
                  <label for="idjurusan" class="form-label">Jurusan</label>
                  <select class="form-control" name="idjurusan" id="idjurusan">
                    @foreach ($dataJurusan as $data)
                        <option value="{{ $data->jurusan }}" {{ $data->jurusan == $dataMengajar->idjurusan ? 'selected' : ' '; }}>{{ $data->nama }}</option>
                    @endforeach
                  </select>
              </div>
        </div>
        <div class="mb-3">
          @php
            $day = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 'Minggu'];
          @endphp
          <label for="hari">Pilih Hari</label>
          <select class="form-control" name="hari" id="hari">
            @for ($i=0;$i<5;$i++) 
              <option value="{{ $day[$i] }}" {{ $day[$i] == $dataMengajar->hari ? 'selected' : ' '; }}>{{ $hari[$i] }}</option>
            @endfor
          </select>
        </div>
        <div class="d-flex gap-3">
            <div class="mb-3">
              <label for="masuk" class="form-label">Masuk :</label>
              <input class="form-control" type="time" id="masuk" name="masuk" value="{{ $dataMengajar->masuk }}">
            </div>
            <div class="mb-3">
              <label for="selesai" class="form-label">Selesai :</label>
              <input class="form-control" type="time" id="selesai" name="selesai" value="{{ $dataMengajar->selesai }}">
            </div>
        </div>
        <a class="btn btn-secondary" href="{{ url('/mengajar') }}" role="button"><< Kembali</a>
        <button type="submit" class="btn btn-warning">Edit</button>
    </form>
@endsection
