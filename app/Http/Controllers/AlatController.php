<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alat;
use Illuminate\Support\Facades\Storage;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $alat = Alat::all();
            return view('alats.index', compact('alat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('alats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_alat' => 'required|string|max:50',
            'kategori_alat' => 'required|string|max:50',
            'stok' => 'required|integer',
            'kondisi_alat' => 'required|string|in:Baik,Rusak Ringan,Rusak Berat',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $path = null;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('alats', 'public');
        }

        Alat::create([
            'nama_alat' => $request->nama_alat,
            'kategori_alat' => $request->kategori_alat,
            'stok' => $request->stok,
            'kondisi_alat' => $request->kondisi_alat,
            'gambar' => $path,
        ]);

        return redirect()->route('alats.index')->with('success', 'Alat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_alat)
    {
        //
        $alat = Alat::findOrFail($id_alat);

        return view('alats.edit', compact('alat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_alat)
    {
        //
        // dd($request->all());

        $alat = Alat::findOrFail($id_alat);

        $request->validate([
            'nama_alat' => 'required|string|max:50',
            'kategori_alat' => 'required|string|max:50',
            'stok' => 'required|integer',
            'kondisi_alat' => 'required|string|in:Baik,Rusak Ringan,Rusak Berat',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $path = $alat->gambar;

        if ($request->hasFile('gambar')) {

            if ($alat->gambar && Storage::disk('public')->exists($alat->gambar)) {
                Storage::disk('public')->delete($alat->gambar);
            }

            $path = $request->file('gambar')->store('alats', 'public');
        }

        $alat->update([
            'nama_alat' => $request->nama_alat,
            'kategori_alat' => $request->kategori_alat,
            'stok' => $request->stok,
            'kondisi_alat' => $request->kondisi_alat,
            'gambar' => $path,
            
        ]);

        return redirect()->route('alats.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_alat)
    {
        //
    $alat = Alat::findOrFail($id_alat);

    if ($alat->gambar && Storage::disk('public')->exists($alat->gambar)) {
        Storage::disk('public')->delete($alat->gambar);
    }

    $alat->delete();

    return redirect()->route('alats.index')->with('success', 'Alat berhasil dihapus!');
    }
}
