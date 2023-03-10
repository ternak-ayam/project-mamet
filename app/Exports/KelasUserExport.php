<?php

namespace App\Exports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KelasUserExport implements FromCollection, WithMapping, WithHeadings
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
        return Pembelian::where('user_id', $this->id)->with('kelas', 'days', 'times')->get();
    }
    public function map($row): array
    {
        return [
            $row->kelas->nama_kelas,
            $row->kelas->deskripsi,
            $row->kelas->harga,
        ];
    }
    public function headings(): array
    {
        return ["Nama Kelas", "Deskripsi", "Harga"];
    }
}
