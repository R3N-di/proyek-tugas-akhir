<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $data = "mapel";
    protected $fillable = [
        'mapel'
    ];

    public function guru(){
        return hasOne(guru::class, 'mapel');
    }
    
    use HasFactory;
}
