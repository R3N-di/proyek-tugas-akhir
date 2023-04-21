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
    protected $primaryKey="idmengajar";
    protected $fillable = [
        "idmengajar",
        "masuk",
        "selesai",
        "hari",
        "idkelas",
        "idjurusan",
        "idguru"
    ];

    public function scopeFilter($query, array $filters){
        $query->when($filters['cari'] ?? false, function ($query, $search){
            return $query->whereHas('guru', function($query) use ($search) {
                $query->where('nama','like', '%'.$search.'%');
            });
        });

        $query->when($filters['kelas'] ?? false, function ($query, $kelas){
            return $query->whereHas('kelas', function($query) use ($kelas) {
                $query->where('kelas', $kelas);
            });
        });

        $query->when($filters['jurusan'] ?? false, function ($query, $jurusan) {
            return $query->whereHas('jurusan', function($query) use ($jurusan){
                $query->where('jurusan', $jurusan);
            });
        });
        
    }

    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class,'idkelas');
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class,'idjurusan');
    }

    public function guru(){
        return $this->belongsTo(Guru::class, 'idguru');
    }

    public function absen(){
        return hasOne(Absen::class);
    }
    use HasFactory;
}
