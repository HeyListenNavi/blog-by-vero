<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()
            ->count(10)
            ->forIcon()
            ->hasComments(3)
            ->hasTags(3)
            ->hasPostImages(3)
            ->create();
    }
}
