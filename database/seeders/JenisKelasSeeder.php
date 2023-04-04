<?php

namespace Database\Seeders;

use App\Models\JenisKelas;
use Illuminate\Database\Seeder;

class JenisKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *->default('painting class','flower class','art and craft class')
     * @return void
     */
    public function run()
    {
        JenisKelas::create([
            'jenis_kelas' => 'Painting Class',
        ]);
        JenisKelas::create([
            'jenis_kelas' => 'Flower Class',
        ]);
        JenisKelas::create([
            'jenis_kelas' => 'Art and Craft Class',
        ]);
    }
}
