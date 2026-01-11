<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // PENTING: Jangan lupa import ini

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Akun Superadmin (Agar bisa login pertama kali)
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com', // Email Login
            'role' => 'superadmin',            // Role Penting
            'password' => Hash::make('password'), // Password: password
        ]);

        // 2. Buat Akun Dokter Dummy (Opsional, biar tidak capek bikin manual)
        User::create([
            'name' => 'Dr. Paldin',
            'email' => 'dokter@gmail.com',
            'role' => 'dokter',
            'password' => Hash::make('password'),
        ]);

        // 3. Buat Akun User/Admin Klinik Dummy (Opsional)
        User::create([
            'name' => 'Admin Klinik',
            'email' => 'admin@gmail.com',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);
    }
}
