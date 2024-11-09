<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => 'nabil',
            'name' => 'Nabil User',
            'username' => 'Nabil User',
            'email' => 'nabil@example.com',
            'kloter' => 'MANDIRI 31 NOVEMBER - 7 DESEMBER',
            'password' => Hash::make('$2y$10$kZaFdJys1IGvVPx9HWFWxeiGnxaul9IQ5kEOF6LZeKt4R3Ccep/4e'), // Replace with desired password
        ]);
    }
}
