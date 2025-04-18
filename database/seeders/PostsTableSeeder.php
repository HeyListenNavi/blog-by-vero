<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'My First Blog Post',
                'content' => 'This is the content of my first post.',
                'date' => Carbon::parse('2025-04-17'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Reflections on Coding',
                'content' => 'Sometimes I wonder why semicolons betray me.',
                'date' => Carbon::parse('2025-04-16'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
