<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Alat;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'alat'])->get();
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
            'id_user' => $request->id_user,
            'id_alat' => $request->id_alat,
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
}