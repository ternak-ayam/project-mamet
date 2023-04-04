<?php

namespace App\Exports;

use App\Models\Pembelian;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PesertaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
        public function collection()
        {
            // this is an example, not exactly like your database structure 
            return User::select('name','email','nama_orangtua','no_telp','alamat','role')->where('role','!=','adminweb')->get();
        }
    
    
        public function headings(): array
        {
            return ["Nama Peserta", "Email Peserta","Nama Orang Tua", "Nomor Telepon","Alamat","Role ('User = Member', 'NonUser = NonMember')"];
        }
    }
