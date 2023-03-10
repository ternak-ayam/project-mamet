<?php

namespace App\Exports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JenisKelasExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $id;

    function __construct($id)
    {
        $this->id = $id;
        // dd($id);
    }
    public function collection()
    {
        return Pembelian::where('kelas_id', $this->id)->with(['user', 'kelas', 'days', 'times'])->select('user_id', 'kelas_id', 'days_id', 'times_id')->get();
    }
    public function map($row): array
    {
        return [
            $row->kelas->nama_kelas,
            $row->days->daysname,
            $row->times->jam_kelas,
            $row->user->name,
            $row->user->nama_orangtua,
            $row->user->alamat,
            $row->user->no_telp,
            $row->user->email,
        ];
    }
    public function headings(): array
    {
        return ["Nama Kelas", "Hari Kelas", "Jam Kelas", "Nama Peserta","Nama Orang Tua","Tempat Tinggal", "Nomor Telepon", "Email"];
    }
}
