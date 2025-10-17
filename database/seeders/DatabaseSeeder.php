<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // === Akun PANITIA (Admin) ===
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'ADMIN',
            'no_hp' => '081234567890',
        ]);

        // === Data untuk PENDAFTAR ===
        $agamaList = ['Kristen', 'Katolik', 'Islam', 'Hindu', 'Buddha', 'Konghucu'];
        $pekerjaanOrtu = ['Guru', 'Petani', 'PNS', 'Karyawan', 'Pedagang', 'Dokter', 'Wiraswasta'];

        for ($i = 1; $i <= 50; $i++) {
            $nama = mb_strimwidth($faker->name(), 0, 50); // max 50 char
            $username = strtolower(substr(str_replace(' ', '', $faker->firstName), 0, 10)) . $i;
            $nisn = $faker->unique()->numerify('00########');
            $tgl_lahir = $faker->dateTimeBetween('-18 years', '-10 years')->format('Y-m-d');
            $no_hp = '08' . $faker->numberBetween(1000000000, 9999999999);
            $no_hp_ortu = '08' . $faker->numberBetween(1000000000, 9999999999);
            $nama_ortu = mb_strimwidth($faker->firstName('male') . ' & ' . $faker->firstName('female'), 0, 50);
            $pekerjaan = mb_strimwidth($faker->randomElement($pekerjaanOrtu), 0, 50);

            User::create([
                'username' => $username,
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
                    'Juara 3 Lomba Futsal',
                    'Peserta Lomba Menyanyi',
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
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
