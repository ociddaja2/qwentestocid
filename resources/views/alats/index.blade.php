<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-900/50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-white">Inventaris Alat</h2>
            </div>
            <a href="{{ route('alats.create') }}"
               class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-950 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Alat
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Flash Message --}}
            @if(session('success'))
                <div class="mb-4 flex items-center gap-3 rounded-xl border border-emerald-800 bg-emerald-900/30 px-4 py-3 text-sm text-emerald-300 shadow-sm">
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

            {{-- Table Card --}}
            <div class="overflow-hidden rounded-xl border border-gray-800 bg-gray-900 shadow-sm">
                <table class="min-w-full divide-y divide-gray-800 text-sm">
                    <thead class="bg-gray-800/50">
                        <tr>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Nama Alat</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Stok</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Kondisi</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Gambar</th>
                            <th class="px-6 py-3.5 text-center text-xs font-semibold text-gray-400 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800 bg-gray-900">
                        @forelse($alat as $item)
                        <tr class="hover:bg-gray-800/50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-sm font-semibold text-white">{{ $item->nama_alat }}</td>
                            <td class="px-6 py-4 text-sm text-gray-400 capitalize">{{ $item->kategori_alat }}</td>
                            <td class="px-6 py-4 text-sm text-gray-300 font-medium">{{ $item->stok }}</td>
                            <td class="px-6 py-4 text-sm">
                                @php
                                    $kondisi = strtolower($item->kondisi_alat);
                                    $badge = $kondisi == 'baik'
                                        ? 'bg-emerald-900/50 text-emerald-300 ring-emerald-700'
                                        : (($kondisi == 'rusak' || $kondisi == 'cacat') ? 'bg-red-900/50 text-red-300 ring-red-700' : 'bg-amber-900/50 text-amber-300 ring-amber-700');
                                @endphp
                                <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold ring-1 {{ $badge }}">
                                    {{ $item->kondisi_alat }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                         alt="Gambar Alat"
                                         class="h-16 w-16 rounded-lg object-cover shadow-sm ring-1 ring-gray-700">
                                @else
                                    <span class="text-gray-500 text-sm">—</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('alats.edit', $item->id_alat) }}"
                                       class="inline-flex items-center gap-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-indigo-300 bg-indigo-900/50 ring-1 ring-indigo-700 hover:bg-indigo-900 transition">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('alats.destroy', $item->id_alat) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus alat ini?')">
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
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-4 py-16 text-center text-gray-500">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-16 h-16 rounded-full bg-gray-800 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-gray-400">Belum ada data alat.</p>
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
