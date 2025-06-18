<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create(['title' => 'Hujan', 'author_id' => 1]); // Tere Liye
        Book::create(['title' => 'Laskar Pelangi', 'author_id' => 2]); // Andrea Hirata
        Book::create(['title' => 'Ayat-Ayat Cinta', 'author_id' => 3]); // Habiburrahman
        Book::create(['title' => 'Supernova', 'author_id' => 4]); // Dee Lestari
        Book::create(['title' => 'Bumi Manusia', 'author_id' => 5]); // Pramoedya
    }
}