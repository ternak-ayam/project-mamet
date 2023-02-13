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
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'mamet',
            'email' => 'mamet@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'adi palguna',
            'email' => 'adipalguna@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}
