<?php

namespace App\Models;

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
    use HasFactory;
}
