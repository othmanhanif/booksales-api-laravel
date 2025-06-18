<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::create(['name' => 'Tere Liye']);
        Author::create(['name' => 'Andrea Hirata']);
        Author::create(['name' => 'Habiburrahman El Shirazy']);
        Author::create(['name' => 'Dee Lestari']);
        Author::create(['name' => 'Pramoedya Ananta Toer']);
    }
}