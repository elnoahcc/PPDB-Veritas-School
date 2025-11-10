<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // === 3 Admin ===
        $adminData = [
            ['username' => 'admin', 'email' => 'admin@example.com', 'no_hp' => '081234567890'],
            ['username' => 'panitia1', 'email' => 'panitia1@example.com', 'no_hp' => '081234567891'],
            ['username' => 'panitia2', 'email' => 'panitia2@example.com', 'no_hp' => '081234567892'],
        ];

        foreach ($adminData as $data) {
            $user = User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make('admin123'),
                'role' => 'ADMIN',
                'no_hp' => $data['no_hp'],
            ]);

            // Tambahkan ke tabel admin
            Admin::create([
                'user_id' => $user->id,
                'nama_panitia' => ucfirst($data['username']),
            ]);
        }

        // === 1 Pendaftar Dummy ===
        $agamaList = ['Kristen', 'Katolik', 'Islam', 'Hindu', 'Buddha', 'Konghucu'];
        $pekerjaanOrtu = ['Guru', 'Petani', 'PNS', 'Karyawan', 'Pedagang', 'Dokter', 'Wiraswasta'];

        $nama = $faker->name();
        $username = strtolower(str_replace(' ', '', $faker->firstName())) . rand(10,99);
        $nisn = $faker->unique()->numerify('00########');
        $tgl_lahir = $faker->dateTimeBetween('-18 years', '-10 years')->format('Y-m-d');
        $no_hp = '08' . $faker->numberBetween(1000000000, 9999999999);
        $no_hp_ortu = '08' . $faker->numberBetween(1000000000, 9999999999);
        $nama_ortu = $faker->firstName('male') . ' & ' . $faker->firstName('female');
        $pekerjaan = $faker->randomElement($pekerjaanOrtu);

        User::create([
            'username' => $username,
            'email' => $username . '@gmail.com',
            'password' => Hash::make('user123'),
            'role' => 'PENDAFTAR',
            'no_hp' => $no_hp,
            'nisn_pendaftar' => $nisn,
            'nama_pendaftar' => $nama,
            'tanggallahir_pendaftar' => $tgl_lahir,
            'alamat_pendaftar' => $faker->address(),
            'agama' => $faker->randomElement($agamaList),
            'prestasi' => $faker->randomElement([
                'Juara 1 Lomba Cerdas Cermat',
                'Juara 2 Olimpiade Matematika',
                'Finalis Lomba Sains Sekolah',
                '-'
            ]),
            'nama_ortu' => $nama_ortu,
            'pekerjaan_ortu' => $pekerjaan,
            'no_hp_ortu' => $no_hp_ortu,
            'alamat_ortu' => $faker->address(),
            'nilai_smt1' => $faker->randomFloat(2, 70, 100),
            'nilai_smt2' => $faker->randomFloat(2, 70, 100),
            'nilai_smt3' => $faker->randomFloat(2, 70, 100),
            'nilai_smt4' => $faker->randomFloat(2, 70, 100),
            'nilai_smt5' => $faker->randomFloat(2, 70, 100),
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
