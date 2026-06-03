<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik umum
        $totalAlat = Alat::count();
        $totalPeminjaman = Peminjaman::count();
        $totalUser = User::where('role', 'user')->count();
        $sedangDipinjam = Peminjaman::where('status', 'dipinjam')->count();

        // Alat dengan stok rendah (stok <= 2)
        $alatStokRendah = Alat::where('stok', '<=', 2)->get();

        // Peminjaman terbaru (5 data)
        $peminjamanTerbaru = Peminjaman::with(['user', 'alat'])
            ->latest()
            ->take(5)
            ->get();

        // Kondisi alat (untuk pie/bar chart)
        $kondisiAlat = Alat::select('kondisi_alat', DB::raw('count(*) as total'))
            ->groupBy('kondisi_alat')
            ->get();

        // Peminjaman per bulan (6 bulan terakhir)
        $peminjamanPerBulan = Peminjaman::select(
                DB::raw('MONTH(tanggal_pinjam) as bulan'),
                DB::raw('YEAR(tanggal_pinjam) as tahun'),
                DB::raw('count(*) as total')
            )
            ->whereYear('tanggal_pinjam', now()->year)
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get();

        return view('dashboard', compact(
            'totalAlat',
            'totalPeminjaman',
            'totalUser',
            'sedangDipinjam',
            'alatStokRendah',
            'peminjamanTerbaru',
            'kondisiAlat',
            'peminjamanPerBulan'
        ));
    }
}