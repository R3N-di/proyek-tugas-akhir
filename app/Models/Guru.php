<?php

namespace App\Models;

use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Guru extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table= "guru";
    // protected $primaryKey="idguru";
    protected $fillable = [
        'idguru',
        'nip',
        'nama',
        'password',
        'password_no_hash',
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

}
