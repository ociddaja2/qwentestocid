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
            'email' => 'ocid@email.com',
            'kelas' => 'XII RPL 1',
            'jurusan' => 'RPL',
            'no_hp' => '081234567890',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);  
    }
}
