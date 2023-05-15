<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dataMapel = Mapel::paginate(5);
        $dataMapel = Mapel::filter(request(['cari']))->paginate(5)->withQueryString();
        return view('page.mapel.index', compact('dataMapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataMapel = Mapel::all();
        return view('page.mapel.create', compact('dataMapel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mapel' => 'required|string|unique:Mapel,mapel'
        ], [
            'mapel.required' => 'Mapel Harus Diisi',
            'mapel.unique' => 'Mapel Sudah pernah digunakan',
            'mapel.string' => 'Mapel Harus Berbentuk Huruf',
        ]);
        $data = [
            'mapel' => $request->mapel
        ];

        Mapel::create($data);
        return redirect('/mapel')->withInfo('Berhasil Menambahkan ' . $request->mapel);
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
    public function edit(string $mapel)
    {
        $dataMapel = Mapel::where('mapel', $mapel)->first();

        return view('page.mapel.edit', compact('dataMapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $mapel)
    {
        $request->validate([
            'mapel' => 'required|string|unique:Mapel,mapel',
        ], [
            'mapel.required' => 'Mapel Harus Diisi',
            'mapel.unique' => 'Mapel Sudah pernah digunakan',
            'mapel.string' => 'Mapel Harus Berbentuk Huruf',
        ]);
        $data = [
            'mapel' => $request->mapel

        ];

        Mapel::where('mapel', $mapel)->update($data);;
        return redirect('/mapel')->withinfo('Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $mapel)
    {
        $dataMapel = Mapel::where('mapel', $mapel)->first();

        $cekMapel = Guru::where('idmapel', $mapel)->first();

        if(!is_null($cekMapel)){
            return redirect('/mapel')->withErrors('Tidak dapat menghapus Mapel tersebut, Mapel tersebut sudah dipakai oleh Guru');
        }
        else{
            Mapel::where('mapel', $mapel)->delete();
            return redirect('/mapel')->withInfo('Berhasil Menghapus Data');
        }

    }
}
