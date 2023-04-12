<?php

namespace App\Models;

use App\Models\Mengajar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table="absen";
    // protected $primaryKey="idabsen";
    protected $fillable = [
        "idabsen",
        "idsiswa",
        "idmengajar",
        "status",
        "tanggal"
    ];

    public function Mengajar(){
        return $this->belongsTo(Mengajar::class,'idmengajar');
    }

    public function siswa(){
        return $this->belongsToMany(Mengajar::class, 'idsiswa');
    }

    use HasFactory;
}
