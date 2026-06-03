{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- STAT CARDS --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-lg border border-gray-200 p-5">
                    <p class="text-sm text-gray-500">Total Alat</p>
                    <p class="text-3xl font-semibold text-gray-900 mt-1">{{ $totalAlat }}</p>
                </div>
                <div class="bg-white rounded-lg border border-gray-200 p-5">
                    <p class="text-sm text-gray-500">Total Peminjaman</p>
                    <p class="text-3xl font-semibold text-gray-900 mt-1">{{ $totalPeminjaman }}</p>
                </div>
                <div class="bg-white rounded-lg border border-gray-200 p-5">
                    <p class="text-sm text-gray-500">Sedang Dipinjam</p>
                    <p class="text-3xl font-semibold text-yellow-600 mt-1">{{ $sedangDipinjam }}</p>
                </div>
                <div class="bg-white rounded-lg border border-gray-200 p-5">
                    <p class="text-sm text-gray-500">Total Pengguna</p>
                    <p class="text-3xl font-semibold text-gray-900 mt-1">{{ $totalUser }}</p>
                </div>
            </div>

            {{-- CHART ROW --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 h-29">

                {{-- Bar Chart Peminjaman per Bulan --}}
                <div class="bg-white rounded-lg border border-gray-200 p-5">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Peminjaman per Bulan</h3>
                    <canvas id="chartBulan" height="200"></canvas>
                </div>

                {{-- Donut Chart Kondisi Alat --}}
                <div class="bg-white rounded-lg border border-gray-200 p-5">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Kondisi Alat</h3>
                    <canvas id="chartKondisi" height="200"></canvas>
                </div>
            </div>

            {{-- BOTTOM ROW --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

                {{-- Peminjaman Terbaru --}}
                <div class="lg:col-span-2 bg-white rounded-lg border border-gray-200 p-5">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Peminjaman Terbaru</h3>
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-500 border-b border-gray-100">
                                <th class="pb-2 font-medium">Peminjam</th>
                                <th class="pb-2 font-medium">Alat</th>
                                <th class="pb-2 font-medium">Tanggal</th>
                                <th class="pb-2 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($peminjamanTerbaru as $item)
                            <tr>
                                <td class="py-2 text-gray-800">{{ $item->user->name ?? '-' }}</td>
                                <td class="py-2 text-gray-600">{{ $item->alat->nama_alat ?? '-' }}</td>
                                <td class="py-2 text-gray-600">
                                    {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}
                                </td>
                                <td class="py-2">
                                    @if($item->status === 'dipinjam')
                                        <span class="inline-flex px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">Dipinjam</span>
                                    @else
                                        <span class="inline-flex px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Dikembalikan</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-400">Belum ada data.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Alat Stok Rendah --}}
                <div class="bg-white rounded-lg border border-gray-200 p-5">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Stok Rendah</h3>
                    @forelse($alatStokRendah as $alat)
                    <div class="flex items-center justify-between py-2 border-b border-gray-50">
                        <span class="text-sm text-gray-700">{{ $alat->nama_alat }}</span>
                        <span class="text-sm font-medium text-red-600">{{ $alat->stok }} unit</span>
                    </div>
                    @empty
                    <p class="text-sm text-gray-400">Semua stok aman.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
    <script>
        // Data dari Laravel (PHP → JS)
        const dataBulan = @json($peminjamanPerBulan);
        const dataKondisi = @json($kondisiAlat);

        const namaBulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

        // Bar Chart
        new Chart(document.getElementById('chartBulan'), {
            type: 'bar',
            data: {
                labels: dataBulan.map(d => namaBulan[d.bulan - 1]),
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: dataBulan.map(d => d.total),
                    backgroundColor: '#3B82F6',
                    borderRadius: 4,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
            }
        });

        // Donut Chart
        new Chart(document.getElementById('chartKondisi'), {
            type: 'doughnut',
            data: {
                labels: dataKondisi.map(d => d.kondisi_alat),
                datasets: [{
                    data: dataKondisi.map(d => d.total),
                    backgroundColor: ['#22C55E', '#F59E0B', '#EF4444'],
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom' } },
                cutout: '65%'
            }
        });
    </script>
</x-app-layout>