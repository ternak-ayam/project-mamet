<?php

namespace App\Exports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HistoryPesertaExport implements FromCollection,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pembelian::all();
    }
    public function map($row): array
    {
        return [
            $row->user->name,
            $row->user->role,
            $row->kelas->nama_kelas,
            $row->days->daysname,
            $row->times->jam_kelas,
            $row->created_at,
        ];
    }
    public function headings(): array
    {
        return ["Nama Peserta","Role ('User = Member', 'NonUser = NonMember')","Nama Kelas", "Hari Kelas","Jam Kelas","Tanggal Pembelian"];
    }
}
