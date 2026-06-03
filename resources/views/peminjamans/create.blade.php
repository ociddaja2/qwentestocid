<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-indigo-900/50 flex items-center justify-center">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-white">Tambah Peminjaman</h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-900 rounded-xl border border-gray-800 shadow-sm">
                <div class="p-6">
                    <p class="text-sm text-gray-400 mb-6">Isi form dibawah untuk menambah data peminjaman baru.</p>

                    <form action="{{ route('peminjamans.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="id_alat" class="mb-1.5 block text-sm font-medium text-gray-300">Alat</label>
                                <select name="id_alat" id="id_alat" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-gray-200 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm" required>
                                    <option value="">Pilih Alat</option>
                                    @foreach($alats as $alat)
                                        <option value="{{ $alat->id_alat }}">{{ $alat->nama_alat }} (Stok: {{ $alat->stok }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="jumlah_pinjam" class="mb-1.5 block text-sm font-medium text-gray-300">Jumlah Pinjam</label>
                                <input type="number" name="jumlah_pinjam" id="jumlah_pinjam" min="1" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-white placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="tanggal_pinjam" class="mb-1.5 block text-sm font-medium text-gray-300">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-white focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm" required>
                            </div>
                            <div>
                                <label for="tanggal_kembali" class="mb-1.5 block text-sm font-medium text-gray-300">Tanggal Kembali <span class="text-gray-500 font-normal">(opsional)</span></label>
                                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-white focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm">
                            </div>
                        </div>

                        <div>
                            <label for="status" class="mb-1.5 block text-sm font-medium text-gray-300">Status</label>
                            <select name="status" id="status" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-gray-200 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm" required>
                                <option value="dipinjam">Dipinjam</option>
                                <option value="dikembalikan">Dikembalikan</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-2">
                            <a href="{{ route('peminjamans.index') }}" class="inline-flex items-center rounded-lg bg-gray-800 px-4 py-2.5 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-700 hover:bg-gray-700 transition-all">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
