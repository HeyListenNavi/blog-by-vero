<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IconsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('icons')->insert([
            'name' => 'music-disc',
            'icon' => 'icons/music-disc.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
