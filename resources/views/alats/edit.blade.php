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

                    <a href="{{ route('alats.index') }}" class="underline">
                            Kembali
                        </a>
                    </div>
                    <form action="{{ route('alats.update', $alat->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Alat</label>
                        <input type="text" name="nama_alat" value="{{ old('nama_alat', $alat->nama_alat) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                        <input type="number" name="jumlah" value="{{ old('jumlah', $alat->jumlah) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <input type="text" name="deskripsi" value="{{ old('deskripsi', $alat->deskripsi) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Gambar Saat Ini</label>
                        <div class="mt-2 mb-3">
                            @if($alat->gambar)
                                <img src="{{ asset('storage/' . $alat->gambar) }}" alt="Gambar Sekarang" class="w-32 h-32 object-cover rounded-lg border">
                            @else
                                <p class="text-sm text-gray-500 italic">Belum ada gambar.</p>
                            @endif
                        </div>
                        
                        <label class="block text-sm font-medium text-gray-700">Ganti Gambar Baru (Kosongkan jika tidak ingin diubah)</label>
                        <input type="file" name="gambar" class="mt-1 block w-full text-sm text-gray-500">
                    </div>

                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">Update Alat</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>