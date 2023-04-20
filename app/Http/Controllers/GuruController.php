<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dataMapel = Mapel::all();

        // if(request('cari')){
        //     $dataGuru = Guru::where('nama', 'like', '%'.request('cari').'%')
        //                     ->orWhere('idmapel', 'like', '%'.request('cari').'%')
        //                     ->paginate(5)
        //                     ->withQueryString();
        //                 }
        // else{
        //     $dataGuru = Guru::paginate(5);
        // }

        $dataGuru = Guru::filter(request(['cari', 'mapel']))->paginate(5)->withQueryString();


        return view('page.guru.index', compact('dataGuru', 'dataMapel'));
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
        $hash = Hash::make($request->password);
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
            'idguru' => $faker->regexify('[A-Z]{11}'),
            'nip' => $request->nip,
            'nama' => $request->nama,
            'password' => $hash,
            'password_no_hash' => $faker->regexify('[A-Z]{10}'),
            'jk' => $request->jk,
            'idmapel' => $request->idmapel,
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
        $dataGuru = Guru::where('idguru', $id)->first();
        return view('page.guru.detail', [
            'dataGuru' => $dataGuru
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataGuru = Guru::where('idguru', $id)->first();
        $dataMapel = Mapel::all();

        return view('page.guru.edit', compact('dataGuru', 'dataMapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

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
            'idmapel.required' => 'Mapel harus diisi'
        ]);

        $data_gambar = Guru::where('idguru', $id)->first();
        $gambar_lama = $data_gambar->gambar;

      $data = [
        'nip' => $request->nip,
        'nama' => $request->nama,
        'jk' => $request->jk,
        'idmapel' =>$request->idmapel
    ];

        if($request->has('gambar')){
            $request->validate([
                'gambar' => 'mimes:png,jpg,jpeg'
            ], [
                'gambar.mimes' => 'Gambar harus ber-format : PNG | JPG | JPEG'
            ]);

            if($gambar_lama != "default_gambar.png"){
                File::delete(public_path('gambar/' . $gambar_lama));
            }

            $file_gambar = $request->file('gambar');
            $gambar_ekstensi = $file_gambar->extension();
            $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
            $file_gambar->move(public_path('gambar'), $gambar_nama);

            $data['gambar'] = $gambar_nama;
        }else{
            $data['gambar'] = $gambar_lama;
        }


        Guru::where('idguru', $id)->update($data);
        return redirect('/guru')->withinfo('Berhasil Mengubah Data');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataGuru = Guru::where('idguru', $id)->first();

        if($dataGuru->gambar != "default_gambar.png"){
            File::delete(public_path('gambar/') . $dataGuru->gambar);
        }

        Guru::where('idguru', $id)->delete();
        return redirect('/guru')->withInfo('Berhasil menghapus Data');
    }
}
