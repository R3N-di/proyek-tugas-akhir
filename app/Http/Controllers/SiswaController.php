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
        $faker = Faker::create('id_ID');
        $request->validate([
            'nis' => 'required|numeric|size:8',
            'nama' => 'required|string',
            'jk' => 'required',
        ], [
            'nis.required' => 'NIS Harus Diisi',
            'nis.numeric' => 'NIS Harus Berupa Angka',
            'nis.size' => 'NIS Harus Memiliki 8 Angka',
            'nama.required' => 'Nama Harus Diisi',
            'nama.string' => 'Nama Harus Berbentuk Huruf',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
        ]);

        $data = [
            'idsiswa' => $faker->regexify('[A-Z]{11}'),
            'nis' => $request->nis,
            'nama' => $request->nama,
            'password' => $faker->regexify('[A-Z]{10}'),
            'jk' => $request->jk,
            'idkelas' => $request->idkelas,
            'idjurusan' => $request->idjurusan

        ];
        if($request->has('gambar')){
            $request->validate([
                'gambar' => 'mimes:png,jpg,jpeg'
            ], [
                'gambar.mimes' => 'Gambar harus ber-format : PNG | JPG | JPEG'
            ]);

            $file_gambar = $request->file('gambar');
            $gambar_ekstensi = $file_gambar->extension();
            $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
            $file_gambar->move(public_path('gambar'), $gambar_nama);

            $data['gambar'] = $gambar_nama;
        }
        else{
            $data['gambar'] = "default_gambar.png";
        }

        Siswa::create($data);
        return redirect('/siswa')->withInfo('Berhasil Menambahkan ' . $request->nama);
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
    public function edit(string $idsiswa)
    {
        $dataSiswa  = Siswa::findOrFail($idsiswa);
        return view('page.siswa.edit', compact('dataSiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idsiswa)
    {
        $dataSiswa = Siswa::findOrFail($idsiswa);

        $request->validate([
            'nis'=> 'required|numeric|size:8',
            'nama' => 'required',
            'jk'=> 'required',
            'idkelas' => 'required',
            'idjurusan' => 'required'

        ],
        [
            'nis.required' => 'Nisa Harus Diisi',
            'nis.numeric' => 'Nis Harus Berupa Angka',
            'nis.size' => 'Nis Harus 8 Angka',
            'nama.required' => 'Nama Harus Diisi',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
            'idjurusan.required' => 'Jurusan Harus Diisi',
            'idkelas.required' => 'Kelas Harus Diisi',

        ]

        );

        $data = [
            'idsiswa' => $request->idsiswa,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'password' => $request->password,
            'jk' => $request->jk,
            'idkelas' => $request->idkelas,
            'idjurusan' => $request->idjurusan

        ];

        $dataSiswa -> update($data);
        return redirect('/siswa');

        // Siswa::where('idsiswa', $idsiswa)->update($data);
        // return redirect('/siswa')->with('success', 'Berhasil mengubah data');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
