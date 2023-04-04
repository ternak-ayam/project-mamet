<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Seeder;

class TimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Time::create([
            'jam_kelas' => '08.00 - 10.00'
        ]);
        Time::create([
            'jam_kelas' => '10.00 - 12.00'
        ]);
        Time::create([
            'jam_kelas' => '12.00 - 14.00'
        ]);
        Time::create([
            'jam_kelas' => '14.00 - 16.00'
        ]);
        Time::create([
            'jam_kelas' => '09.00 - 11.00'
        ]);
        Time::create([
            'jam_kelas' => '11.00 - 13.00'
        ]);
        Time::create([
            'jam_kelas' => '13.00 - 15.00'
        ]);
    }
}
