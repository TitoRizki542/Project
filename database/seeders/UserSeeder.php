<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Tito Rizki Purnomo',
            'email' => 'titorizki1@gmail.com',
            'username' => 'tito',
            'password' => Hash::make('12341234'),
            'jenis_kelamin' => 'laki laki',
            'alamat' => 'Candirejo',
            'nomor_hp' => ' 085728006071',
        ]);

        User::create([
            'nama' => 'Imam Saputra',
            'email' => 'imam1@gmail.com',
            'username' => 'imam',
            'password' => Hash::make('12341234'),
            'jenis_kelamin' => 'laki laki',
            'alamat' => 'Bandongan',
            'nomor_hp' => ' 098877776666',
        ]);

        User::create([
            'nama' => 'Irfan Rasyid',
            'email' => 'irfan1@gmail.com',
            'username' => 'irfan',
            'password' => Hash::make('12341234'),
            'jenis_kelamin' => 'laki laki',
            'alamat' => 'Kota Magelang',
            'nomor_hp' => '097665654343',
        ]);

        User::create([
            'nama' => 'Raden Kartika Satya',
            'email' => 'kartika1@gmail.com',
            'username' => 'Kartika',
            'password' => Hash::make('12341234'),
            'jenis_kelamin' => 'laki laki',
            'alamat' => 'Kota Magelang',
            'nomor_hp' => ' 087122223333',
        ]);

        User::create([
            'nama' => 'Bana Khusnan',
            'email' => 'Bana1@gmail.com',
            'username' => 'bana',
            'password' => Hash::make('12341234'),
            'jenis_kelamin' => 'laki laki',
            'alamat' => 'Muntilan',
            'nomor_hp' => ' 087122229999',
        ]);
    }
}
