<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absen;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Mengajar;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function absen_siswa(){
        $idsiswa = Auth::guard('siswa')->user()->idsiswa;

        //Mengambil hari
        $date = date('Y-m-d');
        $day = Carbon::parse($date)->format('l');

        // Mengambil data siswa
        $dataSiswa = Siswa::where([
                        ['idsiswa', '=', $idsiswa],
                        ])
                        ->first();

        // Mengambil data mengajar
        $dataMengajar = Mengajar::where([
                        ['hari', '=', $day],
                        ['idkelas', '=', $dataSiswa->idkelas],
                        ['idjurusan', '=', $dataSiswa->idjurusan],
                        ])
                        ->get();

        return view('page.absen.siswa', [
            'dataMengajar' => $dataMengajar,
        ]);
    }

    public function absen_siswa_input(Request $request){
        $faker = Faker::create('id_ID');

        $request->validate([
            'absen' => 'after:masuk|before:selesai'
        ], [
            'absen.after' => 'Belom Masuk Waktu Absen Mata Pelajaran',
            'absen.before' => 'Belom Masuk Waktu Absen Mata Pelajaran',
        ]);

        $data = [
            'idabsen' => $faker->regexify('[A-Z]{11}'),
            'status' => $request->status,
            'tanggal' => date('Y-m-d'),
            'idmengajar' => $request->idmengajar,
            'idsiswa' => 'XESBWDTOHRG',
            'idguru' => $request->idguru
        ];

        // Cek input Keterangan
        if($request->has('keterangan')){
            $request->validate([
                'keterangan' => 'required'
            ], [
                'keterangan.required' => 'Isi Keterangan bila ingin Izin'
            ]);

            $data['keterangan'] = $request->keterangan;
        }
        else{
            $data['keterangan'] = NULL;
        }

        // Cek input gambar
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
            $data['gambar'] = NULL;
        }

        Absen::insert($data);
        return redirect('absen/siswa')->withInfo('Berhasil Menambahkan Data Absen');

    }

    public function absen_guru(Request $request){
        $dataGuru = Auth::guard('guru')->user();

        $idguru = $dataGuru->idguru;

        if($request->has('tanggal')){
            $date = $request->tanggal;
            $jurusan = $request->jurusan;
            $kelas = $request->kelas;
        }
        else{
            $dataMengajar2 = Mengajar::where([
                ['idguru', '=', $idguru],
            ])
            ->first();

            $date = date('Y-m-d');

            if($dataMengajar2 == NULL){
                redirect('beranda/')->withErrors('Tidak dapat Login, Guru tersebut tidak memiliki jadwal mengajar');
            }

            $jurusan = $dataMengajar2->idjurusan;
            $kelas = $dataMengajar2->idkelas;
        }

        //Mengambil hari
        $day = Carbon::parse($date)->format('l');

        $dataMengajar = Mengajar::where([
                        ['hari', '=', $day],
                        ['idkelas', '=', $kelas],
                        ['idjurusan', '=', $jurusan],
                        ['idguru', '=', $idguru],
                    ])
                    ->first();

        $dataKelas = Kelas::all();
        $dataJurusan = Jurusan::all();

        $dataTitle = [
            'kelas' => $kelas,
            'jurusan' => $jurusan,
            'tanggal' => $date,
            'hari' => $day,
        ];


        $dataSiswa = Siswa::where([
                        ['idkelas', '=', $kelas],
                        ['idjurusan', '=', $jurusan],
                    ])
                    ->get()
                    ->sortBy('nama');

        $dataAbsen = Absen::where([
                        ['tanggal', '=', $date],
                        ['idguru', '=', $dataGuru->idguru],
                        ['tanggal', '=', $date],
                    ])
                    ->get();

        return view('page.absen.guru', [
            'dataSiswa' => $dataSiswa,
            'dataAbsen' => $dataAbsen,
            'dataJurusan' => $dataJurusan,
            'dataKelas' => $dataKelas,
            'dataTitle' => $dataTitle,
        ]);
    }
}
