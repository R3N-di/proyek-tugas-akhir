<?php

namespace App\Models;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = "mapel";
    protected $primaryKey = "mapel";
    protected $fillable = [
        'mapel'
    ];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['cari'] ?? false, function ($query, $search) {
            return $query->where('mapel', 'like', '%' . $search . '%');
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function guru()
    {
        return hasOne(Guru::class);
    }

    use HasFactory;
}
