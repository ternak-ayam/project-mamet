<?php

namespace App\Exports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class PesertaExport implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
        public function collection()
        {
            // this is an example, not exactly like your database structure 
            return Pembelian::with(['user'])
            ->where('status_pembayaran', '1')
            ->groupBy('user_id')       
            ->get();
        }
    
        public function map($row): array
        {
    
            return [
                $row->id, 
                $row->user->name,
                $row->user->email,
                $row->user->nama_orangtua,
                $row->user->no_telp,
                $row->user->alamat,
            ];
        }
    
        public function headings(): array
        {
            return [
                'id',
                'nama peserta',
                'email',
                'nama orangtua',
                'no hp',
                'alamat',
            ];
        }
    }
