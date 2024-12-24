<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        // Example users to assign roles (use actual user IDs or UUIDs from your database)
        $usersWithRoles = [
            [
                'email' => 'superadmin@example.com', // Replace with actual Super-Admin email
                'role' => 'Super-Admin',
            ],
            [
                'email' => 'admin@example.com', // Replace with actual Admin email
                'role' => 'Admin',
            ],
        ];

        foreach ($usersWithRoles as $userData) {
            // Find the user by email
            $user = User::where('email', $userData['email'])->first();

            if ($user) {
                // Assign the role to the user
                $user->assignRole($userData['role']);
                $this->command->info("Role {$userData['role']} assigned to user {$user->email}");
            } else {
                $this->command->warn("User with email {$userData['email']} not found.");
            }
        }
    }
}
