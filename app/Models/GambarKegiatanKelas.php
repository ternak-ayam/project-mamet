<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarKegiatanKelas extends Model
{
    use HasFactory;
    protected $fillable = [
       ' _token',
       'gambar',
       'jenis_kelas_id'
    ];
    public function nama_kelas(){
        return $this->belongsTo(JenisKelas::class,'jenis_kelas_id','id');
    }
}
