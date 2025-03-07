<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'user1@example.com',
            'nama' => 'User Satu'
        ]);

        User::create([
            'email' => 'user2@example.com',
            'nama' => 'User Dua'
        ]);
    }
}
