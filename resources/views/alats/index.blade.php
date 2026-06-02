<x-app-layout>
    <x-slot name="header">
        <title>Alat</title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold">Data Alat</h2>
                        <div class="space-x-4">
                        <div class="flex flex-wrap items-center gap-3">
                            <!-- Eksport Excel -->
                            <a href="{{ route('alats.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-green-50 text-green-700 rounded-lg text-sm font-medium hover:bg-green-100 hover:text-green-800 transition-all duration-200 border border-green-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>Eksport Excel</span>
                            </a>

                            <!-- Eksport PDF -->
                            <a href="{{ route('alats.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-red-50 text-red-700 rounded-lg text-sm font-medium hover:bg-red-100 hover:text-red-800 transition-all duration-200 border border-red-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <span>Eksport PDF</span>
                            </a>

                            <!-- Tambah Alat (Primary Action) -->
                            <a href="{{ route('alats.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium shadow-sm hover:bg-indigo-700 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Tambah Alat</span>
                            </a>
                        </div>
                    </div>
                    </div>

                    <table class="w-full mt-4 border border-gray-700 bg-inherit">
                        <thead class="bg-gray-100 divide-x-0 divide-gray-200 pb-4">
                        <tr class="text-gray-600">
                            <th>No</th>
                            <th>Alat</th>
                            <th>Jumlah</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-gray-50">
                            @forelse ($alat as $item)
                            <tr class="hover:bg-gray-100 text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_alat }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Alat" class="w-20 h-20 object-cover rounded-lg shadow-sm items-center mx-auto m-4">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif    
                                </td>  

                                <td>
                                    <div>
                                        <!-- Edit -->
                                        <a href="{{ route('alats.edit', $item->id_alat) }}" class="text-blue-600 hover:text-blue-800">
                                            Edit
                                        </a>
                                        <br>
                                        <!-- Hapus -->
                                        <form action="{{ route('alats.destroy', $item->id_alat) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus alat ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Yakin ingin menghapus alat ini?');">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <p>Belum ada data tagihan.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
