<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Detail Peminjaman
            </h2>
            <a href="{{ route('peminjamans.index') }}" class="underline">
                Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Informasi Peminjaman</h3>

                    <div class="space-y-4">
                        <div class="border-b border-gray-100 pb-4">
                            <span class="block text-sm text-gray-500">Peminjam</span>
                            <span class="block text-lg font-medium text-gray-900">{{ $peminjaman->user->nama_peminjam ?? '-' }}</span>
                        </div>

                        <div class="border-b border-gray-100 pb-4">
                            <span class="block text-sm text-gray-500">Alat</span>
                            <span class="block text-lg font-medium text-gray-900">{{ $peminjaman->alat->nama_alat ?? '-' }}</span>
                        </div>

                        <div class="border-b border-gray-100 pb-4">
                            <span class="block text-sm text-gray-500">Jumlah Pinjam</span>
                            <span class="block text-lg font-medium text-gray-900">{{ $peminjaman->jumlah_pinjam }}</span>
                        </div>

                        <div class="border-b border-gray-100 pb-4">
                            <span class="block text-sm text-gray-500">Tanggal Pinjam</span>
                            <span class="block text-lg font-medium text-gray-900">
                                {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}
                            </span>
                        </div>

                        <div class="border-b border-gray-100 pb-4">
                            <span class="block text-sm text-gray-500">Tanggal Kembali</span>
                            <span class="block text-lg font-medium text-gray-900">
                                {{ $peminjaman->tanggal_kembali
                                    ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d M Y')
                                    : 'Belum dikembalikan' }}
                            </span>
                        </div>

                        <div class="border-b border-gray-100 pb-4">
                            <span class="block text-sm text-gray-500">Status</span>
                            <span class="block text-lg font-medium text-gray-900">
                                @if($peminjaman->tanggal_kembali)
                                    <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-sm font-medium text-green-700">
                                        Dikembalikan
                                    </span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-sm font-medium text-yellow-700">
                                        Dipinjam
                                    </span>
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center gap-3">
                        <a href="{{ route('peminjamans.edit', $peminjaman->id) }}"
                           class="inline-flex items-center gap-2 rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-indigo-700">
                            Edit
                        </a>
                        <a href="{{ route('peminjamans.index') }}"
                           class="inline-flex items-center gap-2 rounded-md bg-gray-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-700">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>