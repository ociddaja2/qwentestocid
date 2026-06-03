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
            'nama_alat' => 'Laptop Asus',
            'kategori_alat' => 'Laptop',
            'stok' => 10,
            'kondisi_alat' => 'Baik',
            'gambar' => 'laptop.jpg',
        ]);

        Alat::create([
            'nama_alat' => 'Mouse Logitech',
            'kategori_alat' => 'Aksesoris',
            'stok' => 15,
            'kondisi_alat' => 'Baik',
            'gambar' => 'proyektor.jpg',
        ]);

        Alat::create([
            'nama_alat' => 'Mekanikal Keyboard',
            'kategori_alat' => 'Aksesoris',
            'stok' => 5,
            'kondisi_alat' => 'Baik',
            'gambar' => 'proyektor.jpg',
        ]);
    }
}
