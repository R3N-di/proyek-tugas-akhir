@extends('layout.app')

@section('konten')
<a class="btn btn-secondary" href="#" role="button"><< Kembali</a>
    <form action="">
        <h3>Tambah Siswa</h3>
        <div class="mb-3">
          <label for="nis" class="form-label">NIS</label>
          <input type="text" class="form-control" name="nis" id="nis" aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
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
              <label for="kelas" class="form-label">Kelas :</label>
                    <select name="kelas" id="kelas">
                        <option value="volvo">XI</option>
                        <option value="saab">Saab</option>
                        <option value="opel">Opel</option>
                        <option value="audi">Audi</option>
                    </select>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                    <select name="jurusan" id="jurusan">
                        <option value="volvo">RPL2</option>
                        <option value="saab">Saab</option>
                        <option value="opel">Opel</option>
                        <option value="audi">Audi</option>
                    </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
