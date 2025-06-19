<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@mail.com'], // Cek berdasarkan email
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ]
        );
    }
}