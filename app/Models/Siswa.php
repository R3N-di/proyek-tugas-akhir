<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table="siswa";
    protected $fillable = [
        'id',
        'nis',
        'nama',
        'password',
        'jk',
        'gambar',
        'idkelas',
        'idjurusan',
    ];
    public function kelas () {
        return $this->belongsTo(Kelas::class, 'kelas');
    }
    public function jurusan() {
        return $this->belongsTo(Jurusan::class, 'jurusan');
    }
    use HasFactory;
}
