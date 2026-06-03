<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-900/50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-white">Dashboard</h2>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-gray-900 rounded-xl border border-gray-800 p-5 shadow-sm hover:border-gray-700 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Total Alat</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ $totalAlat }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-indigo-900/50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-900 rounded-xl border border-gray-800 p-5 shadow-sm hover:border-gray-700 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Total Peminjaman</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ $totalPeminjaman }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-blue-900/50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-900 rounded-xl border border-gray-800 p-5 shadow-sm hover:border-gray-700 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Sedang Dipinjam</p>
                            <p class="text-3xl font-bold text-amber-400 mt-1">{{ $sedangDipinjam }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-amber-900/50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-900 rounded-xl border border-gray-800 p-5 shadow-sm hover:border-gray-700 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400 font-medium">Total Pengguna</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ $totalUser }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-emerald-900/50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 014 4 4 4 0 01-4 4 4 4 0 01-4-4 4 4 0 014-4m0 9.5a4.5 4.5 0 00-4.5 4.5 4.5 4.5 0 004.5 4.5 4.5 4.5 0 004.5-4.5 4.5 4.5 0 00-4.5-4.5z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="bg-gray-900 rounded-xl border border-gray-800 p-6 shadow-sm">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <h3 class="text-base font-semibold text-white">Peminjaman per Bulan</h3>
                    </div>
                    <div class="relative h-64">
                        <canvas id="chartBulan"></canvas>
                    </div>
                </div>

                <div class="bg-gray-900 rounded-xl border border-gray-800 p-6 shadow-sm">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H9V8h.055a9.001 9.001 0 002.045-4.945z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.49 9A9 9 0 005.64 5.64L3 8m16-4v4H7m4 0v4"/>
                        </svg>
                        <h3 class="text-base font-semibold text-white">Kondisi Alat</h3>
                    </div>
                    <div class="relative h-64">
                        <canvas id="chartKondisi"></canvas>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

                <div class="lg:col-span-2 bg-gray-900 rounded-xl border border-gray-800 shadow-sm">
                    <div class="p-6 border-b border-gray-800">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h3 class="text-base font-semibold text-white">Peminjaman Terbaru</h3>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead class="bg-gray-800/50">
                                <tr class="text-left text-xs uppercase text-gray-400">
                                    <th class="px-6 py-3 font-medium">Peminjam</th>
                                    <th class="px-6 py-3 font-medium">Alat</th>
                                    <th class="px-6 py-3 font-medium">Tanggal</th>
                                    <th class="px-6 py-3 font-medium">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-800">
                                @forelse($peminjamanTerbaru as $item)
                                <tr class="hover:bg-gray-800/50 transition-colors">
                                    <td class="px-6 py-3.5 text-gray-200 font-medium">{{ $item->user->name ?? '-' }}</td>
                                    <td class="px-6 py-3.5 text-gray-400">{{ $item->alat->nama_alat ?? '-' }}</td>
                                    <td class="px-6 py-3.5 text-gray-400">
                                        {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-3.5">
                                        @if($item->status === 'dipinjam')
                                            <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-900/50 text-amber-300 ring-1 ring-amber-700">Dipinjam</span>
                                        @else
                                            <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-900/50 text-emerald-300 ring-1 ring-emerald-700">Dikembalikan</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">Belum ada data peminjaman.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-gray-900 rounded-xl border border-gray-800 shadow-sm">
                    <div class="p-6 border-b border-gray-800">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <h3 class="text-base font-semibold text-white">Stok Rendah</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        @forelse($alatStokRendah as $alat)
                        <div class="flex items-center justify-between py-3 border-b border-gray-800 last:border-0">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-red-500"></div>
                                <span class="text-sm font-medium text-gray-300">{{ $alat->nama_alat }}</span>
                            </div>
                            <span class="text-sm font-bold text-red-400 bg-red-900/50 px-2.5 py-1 rounded-lg">{{ $alat->stok }} unit</span>
                        </div>
                        @empty
                        <div class="flex flex-col items-center justify-center py-8 text-center">
                            <div class="w-12 h-12 rounded-full bg-emerald-900/50 flex items-center justify-center mb-3">
                                <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-400 font-medium">Semua stok aman.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
    <script>
        const dataBulan = @json($peminjamanPerBulan);
        const dataKondisi = @json($kondisiAlat);
        const namaBulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

        new Chart(document.getElementById('chartBulan'), {
            type: 'bar',
            data: {
                labels: dataBulan.map(d => namaBulan[d.bulan - 1]),
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: dataBulan.map(d => d.total),
                    backgroundColor: '#6366f1',
                    borderRadius: 6,
                    barThickness: 24,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 1, color: '#9ca3af' }, grid: { color: '#1f2937' } },
                    x: { ticks: { color: '#9ca3af' }, grid: { display: false } }
                }
            }
        });

        new Chart(document.getElementById('chartKondisi'), {
            type: 'doughnut',
            data: {
                labels: dataKondisi.map(d => d.kondisi_alat),
                datasets: [{
                    data: dataKondisi.map(d => d.total),
                    backgroundColor: ['#22c55e', '#f59e0b', '#ef4444'],
                    borderWidth: 0,
                    hoverOffset: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom', labels: { padding: 16, usePointStyle: true, pointStyle: 'circle', color: '#9ca3af' } } },
                cutout: '70%'
            }
        });
    </script>
</x-app-layout>
