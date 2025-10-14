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
            SketchSeeder::class,
            SiteSeeder::class,
            ThoughtSeeder::class,
            IconSeeder::class,
            PostSeeder::class,
            PhotographyPostSeeder::class,
            PostImageSeeder::class,
            PhotographySeeder::class,
            UserSeeder::class,
            CommentSeeder::class,
            DefaultAdminSeeder::class,
        ]);
    }
}
