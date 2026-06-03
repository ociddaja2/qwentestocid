<x-guest-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold text-gray-900">Selamat Datang!</h1>
    </x-slot>

    <div class="space-y-6">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-3">Aplikasi Peminjaman Alat</h2>
            <p class="text-gray-600 leading-relaxed">
                Aplikasi ini memudahkan proses peminjaman inventaris alat secara modern dan efisien.
                Kelola peminjaman, pantau stok, dan lacak riwayat penggunaan dari satu tempat.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">
                <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900">Inventaris Terkendali</h3>
                <p class="text-sm text-gray-500 mt-1">Pantau stok alat real-time dari dashboard.</p>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">
                <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900">Peminjaman Mudah</h3>
                <p class="text-sm text-gray-500 mt-1">Proses pinjam &amp; kembali yang cepat dan transparan.</p>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">
                <div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900">Laporan Terstruktur</h3>
                <p class="text-sm text-gray-500 mt-1">Laporan PDF dan ringkasan statistik siap pakai.</p>
            </div>
        </div>

        <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <p class="font-semibold text-indigo-900">Siap mulai?</p>
                <p class="text-sm text-indigo-800 mt-1">Kelola inventaris alat Anda dengan lebih rapi dan termonitor.</p>
            </div>
            <div class="flex gap-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 transition">
                            Buka Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 transition">
                            Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center rounded-lg bg-white px-4 py-2 text-sm font-semibold text-indigo-600 shadow-sm ring-1 ring-inset ring-indigo-200 hover:bg-indigo-50 transition">
                                Daftar
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
