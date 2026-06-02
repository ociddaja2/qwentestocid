<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alat;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Alat::create([
            'nama_alat' => 'Laptop',
            'jumlah' => 10,
            'deskripsi' => 'Laptop untuk keperluan presentasi dan pekerjaan kantor.',
            'gambar' => 'laptop.jpg',
        ]);
    }
}
