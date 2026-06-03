<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Alat') }}
            </h2>
            <a href="{{ route('alats.create') }}"
               class="inline-flex items-center gap-2 rounded-md bg-gray-800 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Alat
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Flash Message --}}
            @if(session('success'))
                <div class="mb-4 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 space-x-2">
                    {{ session('success') }}
                <!-- close message -->
                <button type="button" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700" onclick="this.parentElement.remove()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                </div>
            @endif

            {{-- Table Card --}}
            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">No</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">Nama Alat</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">Kategori Alat</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">Stok</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">Kondisi Alat</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-500">Gambar</th>
                            <th class="px-4 py-3 text-center font-medium text-gray-500">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse($alat as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-400">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $item->nama_alat }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $item->kategori_alat }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $item->stok }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $item->kondisi_alat }}</td>
                            <td class="px-4 py-3">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                         alt="Gambar Alat"
                                         class="h-20 w-20 rounded-lg object-cover shadow-sm">
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('alats.edit', $item->id_alat) }}"
                                       class="rounded px-2.5 py-1 text-xs font-medium text-indigo-600 ring-1 ring-indigo-300 hover:bg-indigo-50 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('alats.destroy', $item->id_alat) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus alat ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="rounded px-2.5 py-1 text-xs font-medium text-red-600 ring-1 ring-red-300 hover:bg-red-50 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-4 py-12 text-center text-gray-400">                                <p class="text-sm">Belum ada data alat.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>