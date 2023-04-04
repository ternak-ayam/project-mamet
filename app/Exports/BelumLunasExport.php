<?php

namespace App\Exports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
class BelumLunasExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pembelian::where('status_pembayaran', 0)->with(['user','kelas','days','times'])->select('user_id','kelas_id','days_id','times_id','status_pembayaran')->get();
         
    }
    public function map($row): array
    {
        return [
            $row->user->name,
            $row->user->email,
            $row->user->no_telp,
            $row->user->role,
            $row->kelas->nama_kelas,
            $row->days->daysname,
            $row->times->jam_kelas
        ];
    }
    public function headings(): array
    {
        return ["Nama Peserta", "Email Peserta","Nomor Telepon","Role ('user = member', 'nonuser = nonmember')","Nama Kelas", "Hari Kelas","Jam Kelas"];
    }
}
