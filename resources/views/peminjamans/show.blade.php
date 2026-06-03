<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-900/50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-white">Detail Peminjaman</h2>
            </div>
            <a href="{{ route('peminjamans.index') }}" class="inline-flex items-center gap-2 rounded-lg bg-gray-800 px-4 py-2.5 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-700 hover:bg-gray-700 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-900 rounded-xl border border-gray-800 shadow-sm">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-6">Informasi Peminjaman</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="bg-gray-800/50 rounded-lg p-4">
                            <span class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1">Peminjam</span>
                            <span class="block text-base font-semibold text-white">{{ $peminjaman->user->nama_peminjam ?? '-' }}</span>
                        </div>

                        <div class="bg-gray-800/50 rounded-lg p-4">
                            <span class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1">Alat</span>
                            <span class="block text-base font-semibold text-white">{{ $peminjaman->alat->nama_alat ?? '-' }}</span>
                        </div>

                        <div class="bg-gray-800/50 rounded-lg p-4">
                            <span class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1">Jumlah Pinjam</span>
                            <span class="block text-base font-semibold text-white">{{ $peminjaman->jumlah_pinjam }} unit</span>
                        </div>

                        <div class="bg-gray-800/50 rounded-lg p-4">
                            <span class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1">Tanggal Pinjam</span>
                            <span class="block text-base font-semibold text-white">
                                {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}
                            </span>
                        </div>

                        <div class="bg-gray-800/50 rounded-lg p-4">
                            <span class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1">Tanggal Kembali</span>
                            <span class="block text-base font-semibold text-white">
                                {{ $peminjaman->tanggal_kembali
                                    ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d M Y')
                                    : '<span class="text-gray-500">Belum dikembalikan</span>' }}
                            </span>
                        </div>

                        <div class="bg-gray-800/50 rounded-lg p-4">
                            <span class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1">Status</span>
                            <span class="block">
                                @if($peminjaman->status == 'dikembalikan')
                                    <span class="inline-flex items-center rounded-full bg-emerald-900/50 px-3 py-1 text-xs font-semibold text-emerald-300 ring-1 ring-emerald-700">
                                        Dikembalikan
                                    </span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-amber-900/50 px-3 py-1 text-xs font-semibold text-amber-300 ring-1 ring-amber-700">
                                        Dipinjam
                                    </span>
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-3">
                        <a href="{{ route('peminjamans.index') }}" class="inline-flex items-center rounded-lg bg-gray-800 px-4 py-2.5 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-700 hover:bg-gray-700 transition-all">
                            Kembali
                        </a>
                        <a href="{{ route('peminjamans.edit', $peminjaman->id) }}" class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
