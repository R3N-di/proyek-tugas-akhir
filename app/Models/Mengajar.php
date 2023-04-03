<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    protected $table="mengajar";
    protected $fillable = [
        "id",
        "masuk",
        "selesai",
        "hari",
        "idkelas"
    ];
    use HasFactory;
}
