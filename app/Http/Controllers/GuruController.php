<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=guru::all();
        return view('page.guru.index')->with('data',$data);
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
            'nip' => $request->nip,
            'nama' => $request->nama,
        ];
        
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
