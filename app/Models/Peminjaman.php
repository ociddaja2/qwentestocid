<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //
    protected $table = 'peminjamans';

    protected $fillable = [
        'nama_peminjam',
        'alat_id',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
