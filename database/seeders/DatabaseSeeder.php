<?php

namespace Database\Seeders;

use App\Models\User;
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
            CommentSeeder::class,
            IconSeeder::class,
            PhotographyPostSeeder::class,
            PostSeeder::class,
            TagSeeder::class,
            ThoughtSeeder::class,
        ]);
    }
}
