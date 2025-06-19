<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil AuthorSeeder dan BookSeeder
        $this->call([
            AuthorSeeder::class,
            BookSeeder::class,
            AdminSeeder::class,
        ]);
    }
}