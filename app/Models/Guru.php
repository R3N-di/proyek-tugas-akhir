<?php

namespace App\Models;

use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    protected $table= "guru";
    protected $fillable = [
        'id',
        'nip',
        'nama',
        'password',
        'jk',
        'gambar',
        'idmapel',
    ];

    public function mapel(){
        return $this->belongsTo(Mapel::class, 'idmapel');
    }

    public function mengajar(){
        return hasMany(Mengajar::class);
    }
    use HasFactory;
}
