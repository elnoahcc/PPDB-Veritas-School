<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat akun admin default
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'ADMIN',
            'no_hp' => '081234567890',
        ]);

        // Contoh akun pendaftar (opsional)
        User::create([
            'username' => 'pendaftar1',
            'password' => Hash::make('user123'),
            'role' => 'PENDAFTAR',
            'no_hp' => '089876543210',
        ]);
    }
}
