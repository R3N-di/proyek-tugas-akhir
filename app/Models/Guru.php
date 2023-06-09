<?php

namespace App\Models;

use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Guru extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table= "guru";
    protected $primaryKey="idguru";
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

    public function scopeFilter($query, array $filters){

        $query->when($filters['cari'] ?? false, function ($query, $search) {
            return $query->where('nama','like', '%'.$search.'%');
        });

        $query->when($filters['mapel'] ?? false, function ($query, $mapel) {
            return $query->whereHas('mapel', function($query) use ($mapel){
                $query->where('mapel', $mapel);
            });
        });
    }

    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }

    public function mapel(){
        return $this->belongsTo(Mapel::class, 'idmapel');
    }

    public function mengajar(){
        return hasOne(Mengajar::class);
    }

}
