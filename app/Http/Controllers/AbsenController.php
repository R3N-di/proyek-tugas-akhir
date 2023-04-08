<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function absen_siswa(){
        return view('page.absen.siswa');
    }

    public function absen_guru(){
        return view('page.absen.guru');
    }
}
