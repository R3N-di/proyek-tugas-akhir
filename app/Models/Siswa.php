<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table="siswa";
    protected $primaryKey="idsiswa";
    // protected $guard = 'siswa';
    protected $fillable = [
        'idsiswa',
        'nis',
        'nama',
        'password',
        'password_no_hash',
        'jk',
        'gambar',
        'idkelas',
        'idjurusan',
    ];

    public function scopeFilter($query, array $filters){
        $query->when($filters['cari'] ?? false, function ($query, $search) {
            return $query->where('nama','like', '%'.$search.'%');
        });

        $query->when($filters['kelas'] ?? false, function ($query, $kelas) {
            return $query->whereHas('kelas', function($query) use ($kelas){
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
    
    public function kelas() {
        return $this->belongsTo(Kelas::class, 'idkelas');
    }
    public function jurusan() {
        return $this->belongsTo(Jurusan::class, 'idjurusan');
    }

    public function absen(){
        return $this->hasMany(Absen::class);
    }
}
