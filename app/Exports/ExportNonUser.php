<?php

namespace App\Exports;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportNonUser implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('name','email','nama_orangtua','no_telp','alamat')->where('role', 'nonuser')->get();
    }
    public function headings(): array
    {
        return ["Nama Peserta", "Email Peserta","Nama Orang Tua", "Nomor Telepon","Alamat"];
    }
}
