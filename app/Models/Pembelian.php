<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kelas_id',
        'days_id',
        'times_id',
        'bukti_pembayaran',
        'sertifikat'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function days(){
        return $this->belongsTo(Days::class);
    }
    public function times(){
        return $this->belongsTo(Time::class);
    }
}
