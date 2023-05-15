<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MengajarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route siswa
Route::get('/siswa/cetak_pdf', [SiswaController::class, 'cetak_pdf'])->middleware('isAdmin');
Route::resource('/siswa', SiswaController::class)->middleware('isAdmin');

//Route guru
Route::get('/guru/cetak_pdf', [GuruController::class, 'cetak_pdf'])->middleware('isAdmin');
Route::resource('/guru', GuruController::class)->middleware('isAdmin');

// Route Mengajar
Route::get('/mengajar/cetak_pdf', [MengajarController::class, 'cetak_pdf'])->middleware('isAdmin');
Route::resource('/mengajar', MengajarController::class)->middleware('isAdmin');

// Route Jurusan
Route::resource('/jurusan', JurusanController::class)->middleware('isAdmin');

// Route Mapel
Route::resource('/mapel', MapelController::class)->middleware('isAdmin');

// Route Absen
Route::get('/absen/siswa', [AbsenController::class, 'absen_siswa'])->middleware('isSiswa');
Route::post('/absen/siswa', [AbsenController::class, 'absen_siswa_input'])->middleware('isSiswa');

Route::get('/absenGuru/cetak_pdf', [AbsenController::class, 'cetak_pdf_guru'])->middleware('isGuru');
Route::get('/absen/guru', [AbsenController::class, 'absen_guru'])->middleware('isGuru');
Route::post('/absen/guru', [AbsenController::class, 'absen_guru'])->middleware('isGuru');

// Route Login
Route::get('login_admin/', [SessionController::class, 'login_admin'])->middleware('isLoginAdmin');
Route::get('login_siswa/', [SessionController::class, 'login_siswa'])->middleware('isLoginSiswa');
Route::get('login_guru/', [SessionController::class, 'login_guru'])->middleware('isLoginGuru');
Route::post('login/', [SessionController::class, 'login']);
Route::get('/logout', [SessionController::class, 'logout']);
Route::get('/beranda', [SessionController::class, 'beranda']);
