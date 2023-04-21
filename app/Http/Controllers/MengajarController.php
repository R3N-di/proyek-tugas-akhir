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
        $dataKelas = Kelas::all();
        $dataJurusan = Jurusan::all();

        // $datamengajar=Mengajar::all();
        // if(request('cari')){
        //     $dataMengajar = Mengajar::where('idjurusan', 'like', '%'.request('cari').'%')->paginate(5);
        // }
        // else{
        //     $dataMengajar = Mengajar::paginate(5);
        // }

        $dataMengajar = Mengajar::filter(request(['cari', 'kelas', 'jurusan']))->paginate(5)->withQueryString();
        
        return view('page.mengajar.index', [
            'dataMengajar' => $dataMengajar,
            'dataKelas' => $dataKelas,
            'dataJurusan' => $dataJurusan,
        ]);
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
            'masuk' => 'required|date_format:H:i',
            'selesai' => 'required|date_format:H:i|after:masuk'
        ], [
            'masuk.required' => 'Waktu Mulai harus di isi',
            'selesai.required' => 'Waktu Selesai harus di isi',
            'selesai.after' => 'Waktu Selesai harus lebih dari Waktu Masuk',
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
        $dataMengajar = Mengajar::where('idmengajar', $id)->first();
        $dataMapel = Mapel::all();
        $dataKelas = Kelas::all();
        $dataJurusan = Jurusan::all();
        $dataGuru = Guru::all();
        return view('page.mengajar.edit', [
            'dataGuru' => $dataGuru,
            'dataMapel' => $dataMapel,
            'dataKelas' => $dataKelas,
            'dataJurusan' => $dataJurusan,
            'dataMengajar' => $dataMengajar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'selesai' => 'after:masuk'
        ], [
            'selesai.after' => 'Waktu Selesai harus lebih dari Waktu Masuk',
        ]);

        $data = [
            'masuk' => $request->masuk,
            'selesai' => $request->selesai,
            'hari' => $request->hari,
            'idguru' => $request->idguru,
            'idjurusan' => $request->idjurusan,
            'idkelas' => $request->idkelas,
        ];

        Mengajar::where('idmengajar', $id)->update($data);
        return redirect('/mengajar/')->withInfo('Berhasil Mengedit Data Baru');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataMengajar = Mengajar::where('idmengajar', $id)->first();

        Mengajar::where('idmengajar', $id)->delete();
        return redirect('/mengajar')->withInfo('Berhasil Menghapus Data');
    }
}
