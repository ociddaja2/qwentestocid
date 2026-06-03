<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Alat;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Peminjaman::create([
            'id_user' => 1,
            'id_alat' => 1,
            'tanggal_pinjam' => '2024-06-01',
            'tanggal_kembali' => null,
            'jumlah_pinjam' => 1,
            'status' => 'dipinjam',
        ]);
    }
}
