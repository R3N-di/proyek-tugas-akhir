@extends('layout.app')

@section('konten')
    <form action="/mengajar" method="post">
        @csrf
        <h3>Tambah Mengajar</h3>
        <div class="mb-3">
          <label for="idguru" class="form-label">Guru :</label>
          <select class="form-control" name="idguru" id="idguru">
            @foreach ($dataGuru as $data) 
                <option value="{{ $data->idguru }}">{{ $data->nama }} - {{ $data->idmapel }}</option>
            @endforeach
          </select>
        </div>
        <div class="d-flex gap-5"">
            <div class="mb-3">
                <label for="idkelas" class="form-label">Kelas :</label>
                <select class="form-control" name="idkelas" id="idkelas">
                    @foreach ($dataKelas as $data)
                        <option value="{{ $data->kelas }}">{{ $data->kelas }}</option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3">
                  <label for="idjurusan" class="form-label">Jurusan</label>
                  <select class="form-control" name="idjurusan" id="idjurusan">
                    @foreach ($dataJurusan as $data)
                        <option value="{{ $data->jurusan }}">{{ $data->nama }}</option>
                    @endforeach
                  </select>
              </div>
        </div>
        <div class="mb-3">
          <label for="hari">Pilih Hari</label>
          <select class="form-control" name="hari" id="hari">
            <option value="monday">Senin</option>
            <option value="tuesday">Selasa</option>
            <option value="wednesday">Rabu</option>
            <option value="thursday">Kamis</option>
            <option value="friday">jumat</option>
          </select>
        </div>
        <div class="d-flex gap-3">
            <div class="mb-3">
              <label for="masuk" class="form-label">Masuk :</label>
              <input class="form-control" type="time" id="masuk" name="masuk" value="{{ old('masuk') }}">
            </div>
            <div class="mb-3">
              <label for="selesai" class="form-label">Selesai :</label>
              <input class="form-control" type="time" id="selesai" name="selesai" value="{{ old('selesai') }}">
            </div>
        </div>
        <a class="btn btn-secondary" href="{{ url('/mengajar') }}" role="button"><< Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
