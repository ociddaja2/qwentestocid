<x-app-layout>
    <x-slot name="header">
        <title>Peminjaman</title>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold">Data Peminjaman</h2>
                        <a href="{{ route('peminjamans.index') }}" class="underline">
                            Kembali
                        </a>
                    </div>

                    <form action="{{ route('peminjamans.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="id_alat" class="block text-gray-700 font-bold mb-2">Alat:</label>
                            <select name="id_alat" id="id_alat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">Pilih Alat</option>
                                @foreach($alats as $alat)
                                    <option value="{{ $alat->id_alat }}">{{ $alat->nama_alat }} (Stok: {{ $alat->stok }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="jumlah_pinjam" class="block text-gray-700 font-bold mb-2">Jumlah Pinjam:</label>
                            <input type="number" name="jumlah_pinjam" id="jumlah_pinjam" min="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_pinjam" class="block text-gray-700 font-bold mb-2">Tanggal Pinjam:</label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_kembali" class="block text-gray-700 font-bold mb-2">Tanggal Kembali: <span class="text-gray-500 font-normal">(opsional)</span></label>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 font-bold mb-2">Status:</label>
                            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="dipinjam">Dipinjam</option>
                                <option value="dikembalikan">Dikembalikan</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-between">
                            <a href="{{ route('peminjamans.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Batal
                            </a>
                            <button type="submit" class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline border-2">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>