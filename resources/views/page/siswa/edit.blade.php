@extends('layout.app')

@section('konten')
<a class="btn btn-secondary" href="{{ url('siswa/') }}" role="button"><< Kembali</a>
    <form action="/siswa/{{ $dataSiswa->idsiswa }}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
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
                <input class="form-check-input" type="radio" name="jk" id="L" value="{{$dataSiswa->jk == 'L' ? 'checked' : ''}}">
                <label class="form-check-label" for="L">
                  Laki - Laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="P" value="{{$dataSiswa->jk == 'P' ? 'checked' : ''}}">
                <label class="form-check-label" for="P">
                  Perempuan
                </label>
              </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Gambar :</label>
          <input type="file" class="form-control" name="gambar" id="gambar" value="{{$dataSiswa->gambar}}" aria-describedby="helpId">
        </div>
        <div class="d-flex gap-3">
            <div class="mb-3">
              <label for="idkelas" class="form-label">Kelas :</label>
                    <select name="idkelas" id="idkelas" value={{$dataSiswa->idkelas}}>
                        @foreach ($dataKelas as $data)
                            <option value="{{ $data->kelas }}">{{ $data->kelas }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="mb-3">
                <label for="idjurusan" class="form-label">Jurusan</label>
                    <select name="idjurusan" id="idjurusan" value={{$dataSiswa->idjurusan}}>
                        @foreach ($dataJurusan as $data)
                            <option value="{{ $data->jurusan }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
