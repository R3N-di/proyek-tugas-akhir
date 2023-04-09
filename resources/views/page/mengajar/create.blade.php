@extends('layout.app')

@section('konten')
<a class="btn btn-secondary" href="{{ url('/siswa') }}" role="button"><< Kembali</a>
    <form action="/mengajar" method="post">
        @csrf
        <h3>Tambah Mengajar</h3>
        <div class="mb-3">
          <label for="idguru" class="form-label">Guru :</label>
          <select name="idguru" id="idguru">
            @foreach ($dataGuru as $data) 
                <option value="{{ $data->idguru }}">{{ $data->nama }} - {{ $data->idmapel }}</option>
            @endforeach
          </select>
        </div>
        <div class="d-flex gap-5"">
            <div class="mb-3">
                <label for="idkelas" class="form-label">Kelas :</label>
                <select name="idkelas" id="idkelas">
                    @foreach ($dataKelas as $data)
                        <option value="{{ $data->kelas }}">{{ $data->kelas }}</option>
                    @endforeach
                </select>
              </div>
              <div class="mb-3">
                  <label for="idjurusan" class="form-label">Jurusan</label>
                  <select name="idjurusan" id="idjurusan">
                    @foreach ($dataJurusan as $data)
                        <option value="{{ $data->jurusan }}">{{ $data->nama }}</option>
                    @endforeach
                  </select>
              </div>
        </div>
        <div class="mb-3">
          <label for="hari">Pilih Hari</label>
          <select name="hari" id="hari">
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
              <input type="time" id="masuk" name="masuk">
            </div>
            <div class="mb-3">
              <label for="selesai" class="form-label">Selesai :</label>
              <input type="time" id="selesai" name="selesai">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
