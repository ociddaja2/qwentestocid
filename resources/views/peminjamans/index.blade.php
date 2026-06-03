<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Data Peminjaman
            </h2>
            <div class="space-x-2">
            <a href="{{ route('peminjamans.export-pdf') }}"
               class="inline-flex items-center gap-2 rounded-md bg-red-800 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Export PDF
            </a>
            <a href="{{ route('peminjamans.create') }}"
               class="inline-flex items-center gap-2 rounded-md bg-gray-800 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Peminjaman
            </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <form method="GET" action="{{ route('peminjamans.index') }}" class="mb-4 flex items-end gap-4">
                <div>
                    <label for="status" class="mb-1 block text-sm font-medium text-gray-700">Status Peminjaman</label>
                    <select name="status" id="status" class="rounded-md border-gray-300 py-2 pl-3 pr-10 text-sm shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500">
                        <option value="">Semua Status</option>
                        <option value="Dikembalikan" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        <option value="Dipinjam" {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    </select>
                </div>

                <div>
                    <label for="kategori" class="mb-1 block text-sm font-medium text-gray-700">Kategori Alat</label>
                    <select name="kategori" id="kategori" class="rounded-md border-gray-300 py-2 pl-3 pr-10 text-sm shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500">
                        <option value="">Semua Kategori</option>
                        <option value="laptop" {{ request('kategori') == 'laptop' ? 'selected' : '' }}>Laptop</option>
                        <option value="aksesoris" {{ request('kategori') == 'aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                        <option value="lainnya" {{ request('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Filter
                    </button>
                    <a href="{{ route('peminjamans.index') }}" class="inline-flex items-center rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        Reset
                    </a>
                </div>
            </form>
            {{-- Flash Message --}}
            @if(session('success'))
                <div class="mb-4 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Table Card --}}
            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">No</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">Nama Peminjam</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">Alat</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">Jumlah Dipinjam</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">Tgl Pinjam</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">Tgl Kembali</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">Status</th>
                            <th class="px-4 py-3 text-center font-medium text-gray-500">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse($peminjamans as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-400">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">
                                <div class="font-medium text-gray-900">{{ $item->nama_peminjam }}</div>
                                <div class="text-xs text-gray-400">{{ $item->user->nama_peminjam ?? '-' }}</div>
                            </td>
                            <td class="px-4 py-3 text-gray-700">{{ $item->alat->nama_alat ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $item->jumlah_pinjam }}</td>
                            <td class="px-4 py-3 text-gray-700">
                                {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}
                            </td>
                            <td class="px-4 py-3 text-gray-700">
                                {{ $item->tanggal_kembali
                                    ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y')
                                    : '—' }}
                            </td>
                            <td class="px-4 py-3">
                                @if($item->status == 'dikembalikan')
                                    <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-sm font-medium text-green-700">
                                        Dikembalikan
                                    </span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-sm font-medium text-yellow-700">
                                        Dipinjam
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('peminjamans.show', $item->id) }}"
                                       class="rounded px-2.5 py-1 text-xs font-medium text-amber-600 ring-1 ring-amber-300 hover:bg-amber-50 transition">
                                        Detail
                                    </a>
                                    <a href="{{ route('peminjamans.edit', $item->id) }}"
                                       class="rounded px-2.5 py-1 text-xs font-medium text-indigo-600 ring-1 ring-indigo-300 hover:bg-indigo-50 transition">
                                        Edit
                                    </a>
                                    @if($item->status == 'dikembalikan')
                                    <form action="{{ route('peminjamans.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="rounded px-2.5 py-1 text-xs font-medium text-red-600 ring-1 ring-red-300 hover:bg-red-50 transition">
                                            Hapus
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-4 py-12 text-center text-gray-400">
                                <p class="text-sm">Belum ada data peminjaman.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>