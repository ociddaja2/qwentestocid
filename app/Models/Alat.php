<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    //
    protected $table = 'alats';

    protected $primaryKey = 'id_alat';

    protected $fillable = [
        'nama_alat',
        'kategori_alat',
        'stok',
        'kondisi_alat',
        'gambar',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
