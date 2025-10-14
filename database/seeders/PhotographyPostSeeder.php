<?php

namespace Database\Seeders;

use App\Models\PhotographyPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotographyPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhotographyPost::factory()
            ->count(10)
            ->create();
    }
}
