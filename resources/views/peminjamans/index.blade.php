<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-900/50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-white">Data Peminjaman</h2>
            </div>
            <div class="flex gap-2">
            <a href="{{ route('peminjamans.export-pdf') }}"
               class="inline-flex items-center gap-2 rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-950 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0v-6m0 6h6m-6 0H6"/>
                </svg>
                Export PDF
            </a>
            <a href="{{ route('peminjamans.create') }}"
               class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-950 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Peminjaman
            </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Flash Message --}}
            @if(session('success'))
                <div class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-800 bg-emerald-900/30 px-4 py-3 text-sm text-emerald-300 shadow-sm">
                    <svg class="h-5 w-5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                    <button type="button" class="ml-auto text-emerald-400 hover:text-emerald-300 transition" onclick="this.parentElement.remove()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @endif

            <form method="GET" action="{{ route('peminjamans.index') }}" class="mb-6 flex flex-wrap items-end gap-3">
                <div class="flex-1 min-w-[180px]">
                    <label for="status" class="mb-1.5 block text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</label>
                    <select name="status" id="status" class="w-full rounded-lg border-gray-700 bg-gray-900 py-2.5 pl-3 pr-10 text-sm text-gray-200 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500">
                        <option value="">Semua Status</option>
                        <option value="Dikembalikan" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        <option value="Dipinjam" {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    </select>
                </div>

                <div class="flex-1 min-w-[180px]">
                    <label for="kategori" class="mb-1.5 block text-xs font-semibold text-gray-400 uppercase tracking-wider">Kategori Alat</label>
                    <select name="kategori" id="kategori" class="w-full rounded-lg border-gray-700 bg-gray-900 py-2.5 pl-3 pr-10 text-sm text-gray-200 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500">
                        <option value="">Semua Kategori</option>
                        <option value="laptop" {{ request('kategori') == 'laptop' ? 'selected' : '' }}>Laptop</option>
                        <option value="aksesoris" {{ request('kategori') == 'aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                        <option value="lainnya" {{ request('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-950 transition-all">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                        </svg>
                        Filter
                    </button>
                    <a href="{{ route('peminjamans.index') }}" class="inline-flex items-center rounded-lg bg-gray-800 px-4 py-2.5 text-sm font-semibold text-gray-300 shadow-sm ring-1 ring-inset ring-gray-700 hover:bg-gray-700 transition-all">
                        Reset
                    </a>
                </div>
            </form>

            <div class="overflow-hidden rounded-xl border border-gray-800 bg-gray-900 shadow-sm">
                <table class="min-w-full divide-y divide-gray-800 text-sm">
                    <thead class="bg-gray-800/50">
                        <tr>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Nama Peminjam</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Alat</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Tgl Pinjam</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Tgl Kembali</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3.5 text-center text-xs font-semibold text-gray-400 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800 bg-gray-900">
                        @forelse($peminjamans as $item)
                        <tr class="hover:bg-gray-800/50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-white">{{ $item->nama_peminjam }}</div>
                                <div class="text-xs text-gray-500">{{ $item->user->nama_peminjam ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">{{ $item->alat->nama_alat ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-300 font-medium">{{ $item->jumlah_pinjam }}</td>
                            <td class="px-6 py-4 text-sm text-gray-400">
                                {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">
                                {{ $item->tanggal_kembali
                                    ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y')
                                    : '<span class="text-gray-500">—</span>' }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if($item->status == 'dikembalikan')
                                    <span class="inline-flex items-center rounded-full bg-emerald-900/50 px-2.5 py-1 text-xs font-semibold text-emerald-300 ring-1 ring-emerald-700">
                                        Dikembalikan
                                    </span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-amber-900/50 px-2.5 py-1 text-xs font-semibold text-amber-300 ring-1 ring-amber-700">
                                        Dipinjam
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('peminjamans.show', $item->id) }}"
                                       class="inline-flex items-center gap-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-amber-300 bg-amber-900/50 ring-1 ring-amber-700 hover:bg-amber-900 transition">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Detail
                                    </a>
                                    <a href="{{ route('peminjamans.edit', $item->id) }}"
                                       class="inline-flex items-center gap-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-indigo-300 bg-indigo-900/50 ring-1 ring-indigo-700 hover:bg-indigo-900 transition">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    @if($item->status == 'dikembalikan')
                                    <form action="{{ route('peminjamans.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-red-300 bg-red-900/50 ring-1 ring-red-700 hover:bg-red-900 transition">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-4 py-16 text-center text-gray-500">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-16 h-16 rounded-full bg-gray-800 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-gray-400">Belum ada data peminjaman.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
