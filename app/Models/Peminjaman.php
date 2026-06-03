<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //
    protected $table = 'peminjamans';

    protected $fillable = [
        'id_user',
        'id_alat',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jumlah_pinjam',
        'status',
    ];

    public function alat()
    {
        return $this->belongsTo(Alat::class, 'id_alat', 'id_alat');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
 
}
