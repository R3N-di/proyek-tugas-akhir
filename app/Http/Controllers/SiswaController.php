<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dataSiswa=Siswa::paginate(5);
        // $pagination = 5;
        // return view('page.siswa.index')->with('dataSiswa',$dataSiswa)->with('i', ($request->input('page', 1)-1)*$pagination);

        if(request('cari')){
            $dataSiswa = Siswa::where('nama', 'like', '%'.request('cari').'%')->paginate(5);
        }
        else{
            $dataSiswa = Siswa::paginate(5);
        }

        return view('page.siswa.index', [
            'dataSiswa' => $dataSiswa
        ]);
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
            'nis' => 'required|integer|min_digits:8|unique:siswa,nis',
            'nama' => 'required|string',
            'jk' => 'required',
        ], [
            'nis.required' => 'NIS Harus Diisi',
            'nis.integer' => 'NIS Harus Berupa Angka',
            'nis.min_digits' => 'NIS Harus Memiliki 8 Angka',
            'nis.unique' => 'NIS Sudah pernah digunakan',
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
        $dataSiswa = Siswa::where('idsiswa', $id)->first();
        return view('page.siswa.detail', [
            'dataSiswa' => $dataSiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idsiswa)
    {
        $dataSiswa  = Siswa::where('idsiswa', $idsiswa)->first();
        $dataKelas = Kelas::all();
        $dataJurusan = Jurusan::all();

        return view('page.siswa.edit', compact('dataSiswa', 'dataKelas', 'dataJurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $idsiswa)
    {

        $dataSiswa = Siswa::where('idsiswa',$idsiswa);

        $request->validate([
            'nis'=> 'required|numeric|min_digits:8',
            'nama' => 'required',
            'jk'=> 'required',
            'idkelas' => 'required',
            'idjurusan' => 'required'

        ],
        [
            'nis.required' => 'Nisa Harus Diisi',
            'nis.numeric' => 'Nis Harus Berupa Angka',
            'nis.min_digits' => 'Nis Harus 8 Angka',
            'nama.required' => 'Nama Harus Diisi',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
            'idjurusan.required' => 'Jurusan Harus Diisi',
            'idkelas.required' => 'Kelas Harus Diisi',

        ]);

        $data = [
            // 'idsiswa' => $request->idsiswa,
            'nis' => $request->nis,
            'nama' => $request->nama,
            // 'password' => $request->password,
            'jk' => $request->jk,
            'idkelas' => $request->idkelas,
            'idjurusan' => $request->idjurusan

        ];

        if($request->has('gambar')){
            if($dataSiswa->gambar != "default_gambar.png"){
                File::delete(public_path('gambar/') . $dataSiswa->gambar);
            }
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

        $dataSiswa->update($data);
        return redirect('/siswa')->withinfo('Berhasil Mengubah Data');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataSiswa = Siswa::where('idsiswa', $id)->first();

        if($dataSiswa->gambar != "default_gambar.png"){
            File::delete(public_path('gambar/') . $dataSiswa->gambar);
        }

        Siswa::where('idsiswa', $id)->delete();
        return redirect('/siswa')->withInfo('Berhasil Menghapus Data');
    }
}
