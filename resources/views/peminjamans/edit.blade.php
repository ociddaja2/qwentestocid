<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-indigo-900/50 flex items-center justify-center">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-white">Edit Peminjaman</h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-900 rounded-xl border border-gray-800 shadow-sm">
                <div class="p-6">
                    @if($errors->any())
                        <div class="mb-5 flex items-start gap-3 rounded-xl border border-red-800 bg-red-900/30 px-4 py-3 text-sm text-red-300">
                            <svg class="h-5 w-5 text-red-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <div>
                                <p class="font-semibold mb-1">Terdapat kesalahan:</p>
                                <ul class="list-disc list-inside space-y-0.5">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <p class="text-sm text-gray-400 mb-6">Perbarui data peminjaman berikut.</p>

                    <form action="{{ route('peminjamans.update', $peminjaman->id) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="id_alat" class="mb-1.5 block text-sm font-medium text-gray-300">Alat</label>
                                <select name="id_alat" id="id_alat" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-gray-200 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm" required>
                                    <option value="">Pilih Alat</option>
                                    @foreach($alats as $alat)
                                        <option value="{{ $alat->id_alat }}" {{ old('id_alat', $peminjaman->id_alat) == $alat->id_alat ? 'selected' : '' }}>
                                            {{ $alat->nama_alat }} (Stok: {{ $alat->stok }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="jumlah_pinjam" class="mb-1.5 block text-sm font-medium text-gray-300">Jumlah Pinjam</label>
                                <input type="number" name="jumlah_pinjam" id="jumlah_pinjam" min="1" value="{{ old('jumlah_pinjam', $peminjaman->jumlah_pinjam) }}" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-white focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="tanggal_pinjam" class="mb-1.5 block text-sm font-medium text-gray-300">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam) }}" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-white focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm" required>
                            </div>
                            <div>
                                <label for="tanggal_kembali" class="mb-1.5 block text-sm font-medium text-gray-300">Tanggal Kembali <span class="text-gray-500 font-normal">(opsional)</span></label>
                                <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-white focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm">
                            </div>
                        </div>

                        <div>
                            <label for="status" class="mb-1.5 block text-sm font-medium text-gray-300">Status</label>
                            <select name="status" id="status" class="w-full rounded-lg border-gray-700 bg-gray-800 py-2.5 px-3.5 text-sm text-gray-200 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 shadow-sm" required>
                                <option value="dipinjam" {{ old('status', $peminjaman->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                <option value="dikembalikan" {{ old('status', $peminjaman->status) == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-2">
                            <a href="{{ route('peminjamans.index') }}" class="inline-flex items-center rounded-lg bg-gray-800 px-4 py-2.5 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-700 hover:bg-gray-700 transition-all">
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
