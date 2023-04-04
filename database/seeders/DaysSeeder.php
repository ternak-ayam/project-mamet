<?php

namespace Database\Seeders;

use App\Models\Days;
use Illuminate\Database\Seeder;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Days::create([
            'daysname' => 'Senin'
        ]);
        Days::create([
            'daysname' => 'Selasa'
        ]);
        Days::create([
            'daysname' => 'Rabu'
        ]);
        Days::create([
            'daysname' => 'Kamis'
        ]);
        Days::create([
            'daysname' => 'Jumat'
        ]);
        Days::create([
            'daysname' => 'Sabtu'
        ]);
        Days::create([
            'daysname' => 'Minggu'
        ]);
    }
}
