<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Alat;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        // Memulai query dengan relasi untuk menghindari N+1 problem
        $query = Peminjaman::with(['user', 'alat']);

        // Filter berdasarkan status (Dipinjam / Dikembalikan)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan kategori alat menggunakan whereHas
        if ($request->filled('kategori')) {
            $query->whereHas('alat', function ($q) use ($request) {
                $q->where('kategori', $request->kategori);
            });
        }

        // Eksekusi query (bisa gunakan get() atau paginate())
        $peminjamans = $query->latest()->get();

        return view('peminjamans.index', compact('peminjamans'));
        }

        public function create()
        {
            $users = User::all();
            $alats = Alat::all();
            return view('peminjamans.create', compact('users', 'alats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_pinjam' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|string|in:dipinjam,dikembalikan',
        ]);

        $alat = Alat::findOrFail($request->id_alat);

        if ($request->jumlah_pinjam > $alat->stok) {
            return back()->withErrors(['jumlah_pinjam' => 'Jumlah pinjam melebihi stok yang tersedia.'])->withInput();
        }

        // Kurangi stok alat yang dipinjam
        $alat->decrement('stok', $request->jumlah_pinjam);

        Peminjaman::create([
            'id_user' => auth()->id(),
            'id_alat' => $request->id_alat,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
        ]);

        return redirect()->route('peminjamans.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $peminjaman = Peminjaman::with(['user', 'alat'])->findOrFail($id);
        return view('peminjamans.show', compact('peminjaman'));
    }

    public function edit(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $users = User::all();
        $alats = Alat::all();
        return view('peminjamans.edit', compact('peminjaman', 'users', 'alats'));
    }

    public function update(Request $request, string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_alat' => 'required|exists:alats,id_alat',
            'jumlah_pinjam' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|string|in:dipinjam,dikembalikan',
        ]);

        $alat = Alat::findOrFail($request->id_alat);

        if ($request->jumlah_pinjam > $alat->stok) {
            return back()->withErrors(['jumlah_pinjam' => 'Jumlah pinjam melebihi stok yang tersedia.'])->withInput();
        }

        $peminjaman->update([
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
        ]);

        return redirect()->route('peminjamans.index')->with('success', 'Data peminjaman berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjamans.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }

    public function exportPdf()
    {
        $peminjamans = Peminjaman::with(['user', 'alat'])->get();

        $pdf = Pdf::loadView('peminjamans.pdf', compact('peminjamans'))
                ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-peminjaman.pdf');
    }
}