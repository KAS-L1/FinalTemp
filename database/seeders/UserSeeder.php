<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Clear the users table before seeding
        // DB::table('users')->truncate(); // Uncomment this line if you want to clear the table

        // Create specific users with predefined emails
        $specificUsers = [
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'superadmin@example.com',
                'password' => bcrypt('password'), // Default password
            ],
            [
                'first_name' => 'Admin',
                'last_name' => 'User ',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'), // Default password
            ],
        ];

        foreach ($specificUsers as $userData) {
            User::create($userData);
        }

        // Create additional random users
        User::factory()->count(18)->create(); // Adjust the count as needed
    }
}
