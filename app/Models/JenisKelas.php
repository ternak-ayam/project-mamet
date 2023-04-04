<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'jenis_kelas'
    ];
    public function images(){
        return $this->hasMany(GambarKegiatanKelas::class);
    }
}
