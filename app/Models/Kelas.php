<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = [
        'kelas'
    ];

    public function siswa(){
        return hasOne(Siswa::class, 'idkelas');
    }
}
