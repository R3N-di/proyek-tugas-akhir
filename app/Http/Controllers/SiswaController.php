<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataSiswa=Siswa::paginate(5);
        return view('page.siswa.index')->with('dataSiswa',$dataSiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataKelas = Kelas::all();
        $dataJurusan = Jurusan::all();
        return view('page.siswa.create', compact('dataKelas','dataJurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric|size:18',
            'nama' => 'required|string',
            'jk' => 'required',
        ], [
            'nis.required' => 'NIS Harus Diisi',
            'nis.numeric' => 'NIS Harus Berupa Angka',
            'nip.size' => 'NIS Harus Memiliki 18 Angka',
            'nama.required' => 'Nama Harus Diisi',
            'nama.string' => 'Nama Harus Berbentuk Huruf',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
        ]);

        $data = [
            'id' => $request->id,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'password' => $request->password,
            'jk' => $request->jk,
            'idkelas' => $request->idkelas,
            'idjurusan' => $request->idjurusan

        ];

        // if($request->has('gambar'))

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view(page.siswa.edit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
