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
                    <form action="{{ route('alats.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_alat" class="block text-gray-700 font-bold mb-2">Nama Alat:</label>

                            <input type="text" name="nama_alat" id="nama_alat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required> 
                        </div>
                        <div class="mb-4">
                            <label for="jumlah" class="block text-gray-700 font-bold mb-2">Jumlah:</label>

                            <input type="number" name="jumlah" id="jumlah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="Deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi:<span class="text-lg">(opsional)</span></label>

                            <input type="text" name="deskripsi" id="deskripsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="Deskripsi" class="block text-gray-700 font-bold mb-2">Gambar:<span class="text-lg">(opsional)</span></label>

                            <input type="file" name="gambar" id="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-900 hover:bg-blue-700font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline border-2 text-white">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>