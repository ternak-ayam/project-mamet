<?php

namespace App\Exports;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportNonUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('name','email','nama_orangtua','no_telp','alamat')->where('role', 'nonuser')->get();
    }
}
