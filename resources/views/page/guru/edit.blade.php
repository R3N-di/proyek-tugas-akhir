@extends('layout.app')

@section('konten')
<a class="btn btn-secondary" href="{{ url('guru/')}}" role="button"> << Kembali</a>
    <form action="/guru/{{ $dataGuru->idguru }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h3>Edit Guru</h3>
        <div class="mb-3">
          <label for="nip" class="form-label">NIP</label>
          <input type="text" class="form-control" name="nip" id="nip" aria-describedby="helpId" placeholder="" value="{{ $dataGuru->nip }}">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="" value="{{ $dataGuru->nama }}">
        </div>
        <div class="mb-3">
          <label for="nip" class="form-label">Jenis Kelamin</label>
          <div class="d-flex gap-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="L" value="L" {{ $dataGuru->jk == 'L' ? 'checked' : '' }}>
                <label class="form-check-label" for="L">
                  Laki - Laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="P" value="P" {{ $dataGuru->jk == 'P' ? 'checked' : '' }}>
                <label class="form-check-label" for="P" >
                  Perempuan
                </label>
              </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Gambar :</label>
          <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="helpId" value="{{$dataGuru->gambar}}">
        </div>
        <div class="d-flex gap-3">
            <div class="mb-3">
              <label for="idmapel" class="form-label">Mapel :</label>
                    <select class="form-control" name="idmapel" id="idmapel">
                        @foreach ( $dataMapel as $mapel )
                            <option value="{{$mapel->mapel}}">{{$mapel->mapel}}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
