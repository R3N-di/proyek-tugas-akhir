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
    protected $fillable = [
        'jurusan',
        'nama',
    ];

    public function scopeFilter($query, array $filters){
        $query->when($filters['cari'] ?? false, function ($query, $search) {
            return $query->where('nama','like', '%'.$search.'%');
        });
    }

    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }

    public function siswa(){
        return hasOne(Siswa::class);
    }

    public function mengajar(){
        return hasOne(Mengajar::class);
    }
    use HasFactory;
}
