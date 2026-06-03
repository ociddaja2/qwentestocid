<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-indigo-900/50 flex items-center justify-center">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-white">Edit Alat</h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-900 rounded-xl border border-gray-800 shadow-sm">
                <div class="p-6">
                    <p class="text-sm text-gray-400 mb-6">Perbarui informasi inventaris alat berikut.</p>

                    <form action="{{ route('alats.update', $alat->id_alat) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="nama_alat" class="mb-1.5 block text-sm font-medium text-gray-300">Nama Alat</label>
                                <input type="text" name="nama_alat" value="{{ old('nama_alat', $alat->nama_alat) }}" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-white placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm">
                            </div>
                            <div>
                                <label for="stok" class="mb-1.5 block text-sm font-medium text-gray-300">Stok</label>
                                <input type="number" name="stok" value="{{ old('stok', $alat->stok) }}" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-white placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="kategori_alat" class="mb-1.5 block text-sm font-medium text-gray-300">Kategori Alat</label>
                                <select name="kategori_alat" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-gray-200 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm">
                                    <option value="">Pilih kategori</option>
                                    <option value="Laptop" {{ old('Laptop', $alat->kategori_alat) == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                                    <option value="Aksesoris" {{ old('Aksesoris', $alat->kategori_alat) == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                                    <option value="Lainnya" {{ old('kategori_alat', $alat->kategori_alat) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="kondisi_alat" class="mb-1.5 block text-sm font-medium text-gray-300">Kondisi Alat</label>
                                <select name="kondisi_alat" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-gray-200 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm">
                                    <option value="">Pilih kondisi</option>
                                    <option value="Baik" {{ old('kondisi_alat', $alat->kondisi_alat) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Rusak Ringan" {{ old('kondisi_alat', $alat->kondisi_alat) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                    <option value="Rusak Berat" {{ old('kondisi_alat', $alat->kondisi_alat) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-300">Gambar Saat Ini</label>
                            <div class="mt-2 mb-4">
                                @if($alat->gambar)
                                    <img src="{{ asset('storage/' . $alat->gambar) }}" alt="Gambar Sekarang" class="w-28 h-28 object-cover rounded-lg ring-1 ring-gray-700">
                                @else
                                    <p class="text-sm text-gray-500 italic">Belum ada gambar.</p>
                                @endif
                            </div>

                            <label class="mb-1.5 block text-sm font-medium text-gray-300">Ganti Gambar Baru</label>
                            <label class="inline-flex items-center gap-2 rounded-lg bg-gray-800 px-4 py-2.5 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-700 hover:bg-gray-700 cursor-pointer transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Pilih Gambar Baru
                                <input type="file" name="gambar" class="hidden">
                            </label>
                            <p class="mt-2 text-xs text-gray-500">Kosongkan jika tidak ingin mengubah gambar.</p>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-2">
                            <a href="{{ route('alats.index') }}" class="inline-flex items-center rounded-lg bg-gray-800 px-4 py-2.5 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-700 hover:bg-gray-700 transition-all">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Perbarui
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
