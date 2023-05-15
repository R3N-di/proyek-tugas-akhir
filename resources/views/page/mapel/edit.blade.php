@extends('layout.app')

@section('konten')
    <a class="btn btn-secondary" href="{{ url('mapel/') }}" role="button">
        << Kembali </a>
            <form action="/mapel/{{ $dataMapel->mapel }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h3>Edit Mapel</h3>
                <div class="mb-3">
                    <label for="mapel" class="form-label">Mapel :</label>
                    <input type="text" class="form-control" name="mapel" id="mapel" aria-describedby="helpId"
                        value="{{ $dataMapel->mapel }}">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        @endsection
