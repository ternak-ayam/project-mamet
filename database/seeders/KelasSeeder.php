<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'nama_kelas' => 'Kelas Pertama',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam laudantium, beatae omnis quod iure similique delectus voluptas quas incidunt quidem iste, natus aperiam ratione saepe itaque nihil sint officiis! Quisquam?',
            'harga' => '500000',
            'gambar_kelas' => '-'
        ]);
        Kelas::create([
            'nama_kelas' => 'Kelas Kedua',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam laudantium, beatae omnis quod iure similique delectus voluptas quas incidunt quidem iste, natus aperiam ratione saepe itaque nihil sint officiis! Quisquam?',
            'harga' => '600000',
            'gambar_kelas' => '-'
        ]);
        Kelas::create([
            'nama_kelas' => 'Kelas Ketiga',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam laudantium, beatae omnis quod iure similique delectus voluptas quas incidunt quidem iste, natus aperiam ratione saepe itaque nihil sint officiis! Quisquam?',
            'harga' => '700000',
            'gambar_kelas' => '-'
        ]);
        Kelas::create([
            'nama_kelas' => 'Kelas Keempat',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam laudantium, beatae omnis quod iure similique delectus voluptas quas incidunt quidem iste, natus aperiam ratione saepe itaque nihil sint officiis! Quisquam?',
            'harga' => '650000',
            'gambar_kelas' => '-'
        ]);
    }
}
