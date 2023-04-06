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
            'nip' => 'required|integer|size:18',
            'nama' => 'required|string',
            'jk' => 'required',
            'mapel' => 'required'
        ], [
            'nip.required' => 'NIP harus dimasukan',
            'nip.integer' => 'NIP harus berupa nomor',
            'nip.size' => 'NIP harus memiliki 18 huruf',
            'nama.required' => 'Nama harus dimasukan',
            'nama.string' => 'Nama harus berbentuk huruf',
            'jk.required' => 'Jenis Kelamin harus diisi',
            'mapel' => 'Mapel harus diisi'
        ]);

        $data = [
            'id' => $faker->regexify('[A-Z]{11}'),
            'nip' => $request->nip,
            'nama' => $request->nama,
            'password' => $faker->regexify('[A-Z]{10}'),
            'jk' => $request->jk,
            'idmapel' => $request->mapel
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
