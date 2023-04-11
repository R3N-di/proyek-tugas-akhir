<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\Mengajar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table="jurusan";
    protected $primaryKey="jurusan";
    protected $fillabel = [
        'jurusan',
        'nama',
    ];

    public function siswa(){
        return hasOne(Siswa::class);
    }

    public function mengajar(){
        return hasOne(Mengajar::class);
    }
    use HasFactory;
}
