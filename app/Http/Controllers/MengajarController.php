<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Jurusan;
use App\Models\Mengajar;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.mengajar.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataMapel = Mapel::all();
        $dataKelas = Kelas::all();
        $dataJurusan = Jurusan::all();
        $dataGuru = Guru::all();
        return view('page.mengajar.create', [
            'dataGuru' => $dataGuru,
            'dataMapel' => $dataMapel,
            'dataKelas' => $dataKelas,
            'dataJurusan' => $dataJurusan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $faker = Faker::create('id_ID');
        
        $request->validate([
            'masuk' => 'required',
            'selesai' => 'required'
        ], [
            'masuk.required' => 'Waktu Mulai harus di isi',
            'selesai.required' => 'Waktu Selesai harus di isi',
        ]);

        $data = [
            'idmengajar' => $faker->regexify('[A-Z]{11}'),
            'masuk' => $request->masuk,
            'selesai' => $request->selesai,
            'hari' => $request->hari,
            'idguru' => $request->idguru,
            'idjurusan' => $request->idjurusan,
            'idkelas' => $request->idkelas,
        ];

        Mengajar::insert($data);
        return redirect('/mengajar/')->withInfo('Berhasil Menambahkan Data Baru');
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
        //
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
