<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kelas',
        'deskripsi',
        'harga',
        'gambar_kelas',
    ];
    public function pembelian(){
        return $this->hasMany(Pembelian::class);
    }
}
