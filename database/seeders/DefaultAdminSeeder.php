<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Env;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory([
            'name' => Env('ADMIN_NAME'),
            'email' => Env('ADMIN_EMAIL'),
            'password' => Env('ADMIN_PASSWORD'),
        ])
            ->setAdminRole()
            ->create();
    }
}
