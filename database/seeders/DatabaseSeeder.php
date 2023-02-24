<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Arsyad',
            'email' => 'Arsyad@gmail.com',
            'nama_ayah' => 'Marzuki Arsyad',
            'nama_ibu' => 'Asyanti',
            'no_telp' => '085682685256',
            'alamat' => 'Jalan pegangsaan timur no 87',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'mamet',
            'email' => 'mamet@gmail.com',
            'nama_ayah' => 'Syaipudin Sukron',
            'nama_ibu' => 'Susanti',
            'no_telp' => '081565452631',
            'alamat' => 'Jalan anyer selatan no 1',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'ahmad',
            'email' => 'ahmad@gmail.com',
            'nama_ayah' => 'Jaenal',
            'nama_ibu' => 'Lailatul',
            'no_telp' => '085682685256',
            'alamat' => 'Jalan pegangsaan timur no 87',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'role' => 'topmanajemen',
        ]);
        User::create([
            'name' => 'adi palguna',
            'email' => 'adipalguna@gmail.com',
            'nama_ayah' => 'Komang Tamba',
            'nama_ibu' => 'Made Surtini',
            'no_telp' => '085682685256',
            'alamat' => 'Jalan pegangsaan timur no 87',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
