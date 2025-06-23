<?php

namespace Database\Seeders;

// database/seeders/UserSeeder.php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@mail.com',
            'password' => Hash::make('customer123'),
            'role' => 'customer'
        ]);
    }
}