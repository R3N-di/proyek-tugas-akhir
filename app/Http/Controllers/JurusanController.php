<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataJurusan = Jurusan::paginate(10);
        
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

        $jurusan = $_POST['jurusan'];
        $angkatan = $_POST['angkatan'];

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
            $row = mysqli_query($link, "SELECT * FROM jurusan WHERE kode_jurusan='$singkatan'");
            if(mysqli_num_rows($row) > 0){
                header("Location: admin/$halamanAsal?paramStatusAksi=gagalTambahJurusan");
                exit;
            }
            //!! CEK APAKAH SUDAH ADA DATA JURUSAN NYA ATAU BELOM
            
            $qry = "INSERT INTO jurusan VALUES ('$singkatan', '$awalKalimat')";
            mysqli_query($link, $qry);

            $query = "INSERT INTO $table VALUES (NULL, '$angkatan', '$singkatan')";
    
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataJurusan = Jurusan::where('jurusan', $id)->first();

        Jurusan::where('jurusan', $id)->delete();
        return redirect('/jurusan')->withInfo('Berhasil Menghapus Data');
    }
}
