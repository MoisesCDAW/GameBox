<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Videogame;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            UserSeeder::class,
        ]);

        Videogame::factory(10)->create();
        Comment::factory(10)->create();
    }
}
