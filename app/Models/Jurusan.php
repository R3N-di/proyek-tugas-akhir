<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table="jurusan";
    protected $fillabel = [
        'jurusan',
        'nama',
    ];

    public function siswa(){
        return hasOne(Siswa::class,'idjurusan');
    }
    use HasFactory;
}
