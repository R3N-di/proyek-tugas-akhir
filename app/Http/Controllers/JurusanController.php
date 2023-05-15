<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataJurusan = Jurusan::filter(request(['cari']))->paginate(5);

        return view('page.jurusan.index', [
            'dataJurusan' => $dataJurusan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jurusan' => 'required|string'
        ], [
            'jurusan.required' => 'jurusan harus di isi',
        ]);

        $jurusan = $request->jurusan;

        $awalKalimat = $jurusan;

            $jurusan = preg_replace("/dan/", "", $jurusan);

            for($i=0; $i<10; $i++){
                if(strpos($jurusan, "$i")){
                    $jumlahJurusan = $i;
                    $jurusan = preg_replace("/$i/", "", $jurusan);
                }
            }

            if(!isset($jumlahJurusan)){
                $jumlahJurusan = 1;
            }

            $kumpulanKalimat = explode(' ', $jurusan);
            $jumlahKalimat = count($kumpulanKalimat);

            for($j=0; $j<$jumlahKalimat ; $j++){
                $kumpulanKalimat[$j] = substr( $kumpulanKalimat[$j], 0, 1 );
            }

            $singkatan = implode("", $kumpulanKalimat);
            $singkatan .= "-" . $jumlahJurusan;

            $singkatan = strtoupper($singkatan);
            $awalKalimat = ucwords($awalKalimat);

            $awalKalimat = preg_replace("/$jumlahJurusan/", " $jumlahJurusan", $awalKalimat);

            // CEK APAKAH SUDAH ADA DATA JURUSAN NYA ATAU BELOM
            $cekJurusan = Jurusan::where('jurusan', $singkatan)->first();
            if(!is_null($cekJurusan)){
                return redirect('/jurusan')->withErrors('Sudah terdapat jurusan tersebut');
            }
            //!! CEK APAKAH SUDAH ADA DATA JURUSAN NYA ATAU BELOM

            // dd(!is_null($cekJurusan));

            $data = [
                'jurusan' => $singkatan,
                'nama' => $awalKalimat,
            ];

            Jurusan::create($data);
            return redirect('/jurusan')->withInfo('Berhasil Menambahkan ' . $awalKalimat);
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
        $dataJurusan = Jurusan::where('jurusan', $id)->first();

        return view('page.jurusan.edit', [
            'dataJurusan' => $dataJurusan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jurusan' => 'required|string'
        ], [
            'jurusan.required' => 'jurusan harus di isi',
        ]);

        $jurusan = $request->jurusan;

        $awalKalimat = $jurusan;

            $jurusan = preg_replace("/dan/", "", $jurusan);

            for($i=0; $i<10; $i++){
                if(strpos($jurusan, "$i")){
                    $jumlahJurusan = $i;
                    $jurusan = preg_replace("/$i/", "", $jurusan);
                }
            }

            if(!isset($jumlahJurusan)){
                $jumlahJurusan = 1;
            }

            $kumpulanKalimat = explode(' ', $jurusan);
            $jumlahKalimat = count($kumpulanKalimat);

            for($j=0; $j<$jumlahKalimat ; $j++){
                $kumpulanKalimat[$j] = substr( $kumpulanKalimat[$j], 0, 1 );
            }

            $singkatan = implode("", $kumpulanKalimat);
            $singkatan .= "-" . $jumlahJurusan;

            $singkatan = strtoupper($singkatan);
            $awalKalimat = ucwords($awalKalimat);

            $awalKalimat = preg_replace("/$jumlahJurusan/", " $jumlahJurusan", $awalKalimat);

            // CEK APAKAH SUDAH ADA DATA JURUSAN NYA ATAU BELOM
            $cekJurusan = Jurusan::where('jurusan', $singkatan)->first();
            if(!is_null($cekJurusan)){
                return redirect('/jurusan')->withErrors('Sudah terdapat jurusan tersebut');
            }
            //!! CEK APAKAH SUDAH ADA DATA JURUSAN NYA ATAU BELOM

            $data = [
                'jurusan' => $singkatan,
                'nama' => $awalKalimat,
            ];

            Jurusan::where('jurusan', $id)->update($data);
            return redirect('/jurusan')->withInfo('Berhasil Menambahkan ' . $awalKalimat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataJurusan = Jurusan::where('jurusan', $id)->first();

        $cekJurusan = Siswa::where('idjurusan', $id)->first();

        if(!is_null($cekJurusan)){
            return redirect('/jurusan')->withErrors('Tidak dapat menghapus Jurusan tersebut, Jurusan tersebut sudah dipakai oleh Siswa');
        }
        else{
            Jurusan::where('jurusan', $id)->delete();
            return redirect('/jurusan')->withInfo('Berhasil Menghapus Data');
        }

    }
}
