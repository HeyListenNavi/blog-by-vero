<?php

namespace Database\Seeders;

use App\Models\Sketch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SketchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sketch::factory()
            ->count(10)
            ->create();
    }
}
