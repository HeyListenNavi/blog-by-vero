<?php

namespace Database\Seeders;

use App\Models\Thought;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThoughtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Thought::factory()
            ->count(10)
            ->create();
    }
}
