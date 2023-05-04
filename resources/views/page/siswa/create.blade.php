@extends('layout.app')

@section('konten')
    <form action="/siswa" class="" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Tambah Siswa</h3>
        <div class="mb-3">
          <label for="nis" class="form-label">NIS</label>
          <input type="text" class="form-control" name="nis" id="nis" aria-describedby="helpId" placeholder="" value="{{ old('nis') }}">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="" value="{{ old('nama') }}">
        </div>
        <div class="mb-3">
          <label for="nis" class="form-label">Jenis Kelamin</label>
          <div class="d-flex gap-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="jk" value="L">
                <label class="form-check-label" for="jk">
                  Laki - Laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="jk" value="P">
                <label class="form-check-label" for="jk">
                  Perempuan
                </label>
              </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Gambar :</label>
          <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="helpId">
        </div>
        <div class="d-flex gap-3">
            <div class="mb-3">
              <label for="idkelas" class="form-label">Kelas :</label>
                    <select class="form-control" name="idkelas" id="idkelas">
                        @foreach ($dataKelas as $data)
                            <option value="{{ $data->kelas }}">{{ $data->kelas }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="mb-3">
                <label for="idjurusan" class="form-label">Jurusan :</label>
                    <select class="form-control" name="idjurusan" id="idjurusan">
                        @foreach ($dataJurusan as $data)
                            <option value="{{ $data->jurusan }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <a class="btn btn-secondary" href="{{ url('/siswa') }}" role="button"><< Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
