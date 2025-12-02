<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Nana Royhana',
            'email' => 'nana@example.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
