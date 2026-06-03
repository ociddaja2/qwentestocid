<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Detail Alat') }}: {{ $alat->nama_alat }}
            </h2>
            <a href="{{ route('alats.index') }}"
               class="inline-flex items-center gap-2 rounded-md bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
                    
                    {{-- Bagian Gambar Alat --}}
                    <div class="flex flex-col items-center justify-center bg-gray-50 rounded-xl p-4 border border-gray-100">
                        @if($alat->gambar)
                            <img src="{{ asset('storage/' . $alat->gambar) }}"
                                 alt="Gambar {{ $alat->nama_alat }}"
                                 class="max-h-64 w-full rounded-lg object-contain shadow-sm bg-white">
                        @else
                            <div class="flex flex-col items-center justify-center text-gray-400 py-12">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H4a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm">Tidak ada gambar</span>
                            </div>
                        @endif
                    </div>

                    {{-- Bagian Detail Informasi --}}
                    <div class="md:col-span-2 flex flex-col justify-between">
                        <div class="divide-y divide-gray-100">
                            <div class="pb-3 grid grid-cols-3 gap-4">
                                <span class="text-sm font-medium text-gray-500">Nama Alat</span>
                                <span class="text-sm font-semibold text-gray-900 col-span-2">{{ $alat->nama_alat }}</span>
                            </div>
                            <div class="py-3 grid grid-cols-3 gap-4">
                                <span class="text-sm font-medium text-gray-500">Kategori Alat</span>
                                <span class="text-sm text-gray-700 col-span-2">{{ $alat->kategori_alat }}</span>
                            </div>
                            <div class="py-3 grid grid-cols-3 gap-4">
                                <span class="text-sm font-medium text-gray-500">Stok Tersedia</span>
                                <span class="text-sm text-gray-700 col-span-2 font-mono">{{ $alat->stok }} unit</span>
                            </div>
                            <div class="py-3 grid grid-cols-3 gap-4">
                                <span class="text-sm font-medium text-gray-500">Kondisi Alat</span>
                                <span class="text-sm col-span-2">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium bg-blue-50 text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                        {{ $alat->kondisi_alat }}
                                    </span>
                                </span>
                            </div>
                            {{-- Anda bisa menambahkan kolom lain di sini seperti deskripsi, tanggal masuk, dll --}}
                        </div>

                        {{-- Tombol Aksi di bagian bawah --}}
                        <div class="mt-6 pt-6 border-t border-gray-100 flex items-center gap-3">
                            <a href="{{ route('alats.edit', $alat->id_alat) }}"
                               class="inline-flex items-center gap-2 rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Data
                            </a>

                            <form action="{{ route('alats.destroy', $alat->id_alat) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus alat ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-sm font-medium text-red-600 ring-1 ring-inset ring-red-300 transition hover:bg-red-50 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus Alat
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>