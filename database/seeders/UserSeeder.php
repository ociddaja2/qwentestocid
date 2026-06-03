<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'nama_peminjam' => 'Ocid',
            'email' => 'ocid@gmail.com',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'RPL',
            'no_hp' => '081234567890',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        
        User::create([
            'nama_peminjam' => 'Ahmad Fauzan(user)',
            'email' => 'faujan@gmail.com',
            'kelas' => 'XI PPLG 1',
            'jurusan' => 'RPL',
            'no_hp' => '081234567890',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        User::create([
            'nama_peminjam' => 'Ricky Pratama(user)',
            'email' => 'riki@gmail.com',
            'kelas' => 'XII RPL 2',
            'jurusan' => 'RPL',
            'no_hp' => '081234567890',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        User::create([
            'nama_peminjam' => 'Dinda Putri(user)',
            'email' => 'daaa@gmail.com',
            'kelas' => 'XII RPL 2',
            'jurusan' => 'RPL',
            'no_hp' => '081234567890',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);
    }
}
