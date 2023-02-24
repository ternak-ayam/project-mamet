<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nonusers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'nama_ayah',
        'nama_ibu',
        'no_telp',
        'alamat',
        'role',
        'email_verified_at'
    ];

}
