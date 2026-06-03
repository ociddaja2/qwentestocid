<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-indigo-900/50 flex items-center justify-center">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-white">Tambah Alat</h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-900 rounded-xl border border-gray-800 shadow-sm">
                <div class="p-6">
                    <p class="text-sm text-gray-400 mb-6">Isi form dibawah untuk menambah inventaris alat baru.</p>

                    <form action="{{ route('alats.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="nama_alat" class="mb-1.5 block text-sm font-medium text-gray-300">Nama Alat</label>
                                <input type="text" name="nama_alat" id="nama_alat" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-white placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm" required>
                            </div>
                            <div>
                                <label for="stok" class="mb-1.5 block text-sm font-medium text-gray-300">Stok</label>
                                <input type="number" name="stok" id="stok" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-white placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="kategori_alat" class="mb-1.5 block text-sm font-medium text-gray-300">Kategori Alat</label>
                                <select name="kategori_alat" id="kategori_alat" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-gray-200 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm" required>
                                    <option value="">Pilih kategori</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="Aksesoris">Aksesoris</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="kondisi_alat" class="mb-1.5 block text-sm font-medium text-gray-300">Kondisi Alat</label>
                                <select name="kondisi_alat" id="kondisi_alat" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-gray-200 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm" required>
                                    <option value="">Pilih kondisi</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak Ringan">Rusak Ringan</option>
                                    <option value="Rusak Berat">Rusak Berat</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-300">Gambar Alat</label>
                            <div class="mt-1 flex items-center gap-4">
                                <label class="inline-flex items-center gap-2 rounded-lg bg-gray-800 px-4 py-2.5 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-700 hover:bg-gray-700 cursor-pointer transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Pilih Gambar
                                    <input type="file" name="gambar" class="hidden">
                                </label>
                                <span id="fileName" class="text-xs text-gray-500">Belum ada file dipilih</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-2">
                            <a href="{{ route('alats.index') }}" class="inline-flex items-center rounded-lg bg-gray-800 px-4 py-2.5 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-700 hover:bg-gray-700 transition-all">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const fileInput = document.querySelector('input[type="file"]');
        const fileName = document.getElementById('fileName');
        fileInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            fileName.textContent = file ? file.name : 'Belum ada file dipilih';
        });
    </script>
</x-app-layout>
