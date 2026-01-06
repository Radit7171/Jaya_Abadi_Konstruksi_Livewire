<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create main user: Raditiya Bagas Santoso
        User::create([
            'name' => 'Raditiya Bagas Santoso',
            'email' => 'raditjal717@gmail.com',
            'password' => Hash::make('Radit717!2025'),
            'email_verified_at' => now(),
        ]);
    }
}
