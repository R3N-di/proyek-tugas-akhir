<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dataMapel = Mapel::all();
        // $dataMapel = Mapel::filter(request(['cari', 'mapel']))->paginate(5)->withQueryString();

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
            'mapel' => 'required|string',
        ], [
            'mapel.required' => 'Mapel Harus Diisi',
            'mapel.string' => 'Mapel Harus Berbentuk Huruf',
        ]);
        $data = [
            'mapel' => $request->mapel

        ];
        // if($request->has('gambar')){
        //     $request->validate([
        //         'gambar' => 'mimes:png,jpg,jpeg'
        //     ], [
        //         'gambar.mimes' => 'Gambar harus ber-format : PNG | JPG | JPEG'
        //     ]);
        //     $file_gambar = $request->file('gambar');
        //     $gambar_ekstensi = $file_gambar->extension();
        //     $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
        //     $file_gambar->move(public_path('gambar'), $gambar_nama);

        //     $data['gambar'] = $gambar_nama;
        // }
        // else{
        //     $data['gambar'] = "default_gambar.png";
        // }

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
