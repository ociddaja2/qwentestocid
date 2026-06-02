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
        'jumlah',
        'deskripsi',
        'gambar',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
