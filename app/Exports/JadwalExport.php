<?php

namespace App\Exports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;

class JadwalExport implements FromCollection, WithMapping
{
    public function collection()
    {
        // this is an example, not exactly like your database structure 
        return Pembelian::with(['user', 'kelas', 'days', 'times'])->where('status_pembayaran',1)->get();
    }

    public function map($row): array
    {

        return [
            $row->id, 
            $row->user->name,
            $row->kelas->nama_kelas,
            $row->days->daysname,
            $row->times->jam_kelas,
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'nama peserta',
            'nama kelas',
            'Hari',
            'Jam Kelas',
        ];
    }
}
