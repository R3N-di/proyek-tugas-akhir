<?php

namespace App\Models;

use App\Models\Mengajar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table="absen";
    protected $fillable = [
        "id",
        "idsiswa",
        "idmengajar",
        "status",
        "tanggal"
    ];

    public function Mengajar(){
        return $this->belongsTo(Mengajar::class,'id');
    }
    use HasFactory;
}
