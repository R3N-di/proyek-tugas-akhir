<?php

namespace App\Models;

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
    use HasFactory;
}
