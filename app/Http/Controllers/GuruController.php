<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataGuru=Guru::paginate(5);
        return view('page.guru.index')->with('dataGuru',$dataGuru);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataMapel = Mapel::all();
        return view('page.guru.create', compact('dataMapel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $faker = Faker::create('id_ID');
        $request->validate([
            'nip' => 'required|integer|min_digits:18|unique:guru,nip',
            'nama' => 'required|string',
            'jk' => 'required',
            'idmapel' => 'required'
        ], [
            'nip.required' => 'NIP harus dimasukan',
            'nip.integer' => 'NIP harus berupa nomor',
            'nip.min_digits' => 'NIP harus memiliki 18 angka',
            'nip.unique' => 'NIP sudah pernah digunakan',
            'nama.required' => 'Nama harus dimasukan',
            'nama.string' => 'Nama harus berbentuk huruf',
            'jk.required' => 'Jenis Kelamin harus diisi',
            'idmapel' => 'Mapel harus diisi'
        ]);

        $data = [
            'id' => $faker->regexify('[A-Z]{11}'),
            'nip' => $request->nip,
            'nama' => $request->nama,
            'password' => $faker->regexify('[A-Z]{10}'),
            'jk' => $request->jk,
            'idmapel' => $request->idmapel
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

        Guru::create($data);
        return redirect('/guru')->withInfo('Berhasil Menambahkan ' . $request->nama);
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
        return view('page.guru.edit');
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
