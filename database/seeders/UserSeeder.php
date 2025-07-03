<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'nik' => '1234567890123456',
            'nokk' => '1234567890123456',
            'alamat' => 'Admin Address',
            'foto' => null,
            'jenis_kelamin' => 'L',
            'fotocopy_kk' => null,
            'fotocopy_ktp' => null,
            'tempat_lahir' => 'Admin City',
            'tanggal_lahir' => '1980-01-01',
            'agama' => 'Islam',
            'pekerjaan' => 'Administrator'
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'nik' => '6543210987654321',
            'nokk' => '6543210987654321',
            'alamat' => 'User Address',
            'foto' => null,
            'jenis_kelamin' => 'P',
            'fotocopy_kk' => null,
            'fotocopy_ktp' => null,
            'tempat_lahir' => 'User City',
            'tanggal_lahir' => '1990-01-01',
            'agama' => 'Kristen',
            'pekerjaan' => 'User'
        ]);
        $user->assignRole('user');
    }
}
