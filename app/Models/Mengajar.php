<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\Absen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    protected $table="mengajar";
    // protected $primaryKey="idmengajar";
    protected $fillable = [
        "idmengajar",
        "masuk",
        "selesai",
        "hari",
        "idkelas",
        "idjurusan",
        "idguru"
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class,'idkelas');
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class,'idjurusan');
    }

    public function guru(){
        return $this->belongsToMany(Guru::class,'idguru');
    }

    public function absen(){
        return hasOne(Absen::class);
    }
    use HasFactory;
}
