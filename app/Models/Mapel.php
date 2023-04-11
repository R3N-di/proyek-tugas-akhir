<?php

namespace App\Models;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = "mapel";
    protected $primaryKey="mapel";
    protected $fillable = [
        'mapel'
    ];

    public function guru(){
        return hasOne(Guru::class);
    }

    use HasFactory;
}
