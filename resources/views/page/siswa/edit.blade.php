@extends('layout.app')

@section('konten')
<a class="btn btn-secondary" href="{{ url()->previous() }}" role="button"><< Kembali</a>
    <form action="/siswa/{{$data->idsiswa}}" method="POST">
        @csrf @method('PUT')
        <h3>Edit Siswa</h3>
        <div class="mb-3">
          <label for="nis" class="form-label">NIS</label>
          <input type="text" class="form-control" name="nis" id="nis" aria-describedby="helpId" value="{{$dataSiswa->nis}}">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" value="{{$dataSiswa->nama}}">
        </div>
        <div class="mb-3">
          <label for="nis" class="form-label">Jenis Kelamin</label>
          <div class="d-flex gap-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="L" value="{{$dataSiswa->jk == L ? 'checked' == ''}}">
                <label class="form-check-label" for="L">
                  Laki - Laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="P" value="{{$dataSiswa->jk == P ? 'checked' == ''}}">
                <label class="form-check-label" for="P">
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
              <label for="kelas" class="form-label">Kelas :</label>
                    <select name="kelas" id="kelas">
                        <option value="10">X</option>
                        <option value="11">XI</option>
                        <option value="12">XII</option>
                        <option value="13">XIII</option>
                    </select>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                    <select name="jurusan" id="jurusan">
                        <option value="RPL1">Rekayasa Perangkat Lunak 1</option>
                        <option value="RPL2">Rekayasa Perangkat Lunak 2</option>
                        <option value="TKJ1">Teknik Komputer Jaringan 1</option>
                        <option value="TKJ2">Teknik Komputer Jaringan 2</option>
                        <option value="TKR1">Teknik Kendaraan Ringan 1</option>
                        <option value="TKR2">Teknik Kendaraan Ringan 2</option>
                        <option value="TKR3">Teknik Kendaraan Ringan 3</option>
                        <option value="TKR4">Teknik Kendaraan Ringan 4</option>
                        <option value="TOI1">Teknik Otomasi Industri 1</option>
                        <option value="TOI2">Teknik Otomasi Industri 2</option>
                    </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
