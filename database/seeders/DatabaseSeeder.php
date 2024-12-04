<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'email' => 'user1@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'email' => 'user2@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'email' => 'googleuser1@example.com',
            'google_id' => 'google-12345',
        ]);

        User::create([
            'email' => 'googleuser2@example.com',
            'google_id' => 'google-67890',
        ]);
    }
}
