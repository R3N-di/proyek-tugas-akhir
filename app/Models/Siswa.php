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
    // protected $primaryKey="idsiswa";
    // protected $guard = 'siswa';
    protected $fillable = [
        'idsiswa',
        'nis',
        'nama',
        'password',
        'jk',
        'gambar',
        'idkelas',
        'idjurusan',
    ];
    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas');
    }
    public function jurusan() {
        return $this->belongsTo(Jurusan::class, 'jurusan');
    }

    public function absen(){
        return $this->hasMany(Absen::class);
    }
}
