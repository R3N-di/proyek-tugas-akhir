@extends('layout.app')

@section('konten')
    <form action="/guru" style="height: 2064px;" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Tambah Guru</h3>
        <div class="mb-3">
          <label for="nip" class="form-label">NIP</label>
          <input type="text" class="form-control" name="nip" id="nip" aria-describedby="helpId" placeholder="Masukan NIS..." value="{{ old('nip') }}">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="Masukan Nama..." value="{{ old('nama') }}">
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
              <label for="idmapel" class="form-label">Mapel :</label>
                    <select class="form-control" name="idmapel" id="idmapel">
                        @foreach ($dataMapel as $data)
                            <option value="{{ $data->mapel }}">{{ $data->mapel }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <a class="btn btn-secondary" href="{{ url('/guru') }}" role="button"><< Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <br>
        <br>
    </form>
@endsection
