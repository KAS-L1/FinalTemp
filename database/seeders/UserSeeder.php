<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // DB::table('users')->truncate(); // Clear the table before seeding
        User::factory()->count(20)->create();
    }
}
