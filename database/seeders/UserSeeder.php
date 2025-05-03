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
        User::factory()->create([
            'name' => 'Vital',
            'email' => 'vital@example.com',
        ]);

        User::factory()->create([
            'name' => 'Instructor',
            'email' => 'instructor@example.com',
            'role' => 'instructor',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        User::factory(10)->create();

        User::factory(10)->create([
            'role' => 'instructor',
        ]);
    }
}
