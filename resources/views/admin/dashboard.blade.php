@extends('layouts.app')

@section('content')
<div x-data="dashboardStats()">
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-brand-600 to-brand-500 rounded-3xl p-8 mb-8 text-white shadow-xl shadow-brand-500/20 relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-3xl font-bold mb-2">Halo, Admin Utama! 👋</h1>
            <p class="text-brand-100">Laporan hari ini menunjukkan peningkatan pesanan sebesar 15%.</p>
        </div>
        <!-- Decorative Circle -->
        <div class="absolute -right-10 -bottom-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Revenue Card -->
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:shadow-lg transition-all group">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Pendapatan</p>
                    <h3 class="text-3xl font-bold text-slate-800 mt-1">Rp 4.2jt</h3>
                </div>
                <div class="p-3 bg-brand-50 text-brand-600 rounded-2xl group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                <div class="bg-brand-500 h-full w-[70%]"></div>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:shadow-lg transition-all group">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Pesanan Aktif</p>
                    <h3 class="text-3xl font-bold text-slate-800 mt-1">12</h3>
                </div>
                <div class="p-3 bg-accent/20 text-yellow-700 rounded-2xl group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
            </div>
            <div class="flex gap-2">
                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-lg text-xs font-bold">8 Proses</span>
                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold">4 Selesai</span>
            </div>
        </div>

        <!-- Add Button -->
        <button class="bg-white border-2 border-dashed border-brand-200 rounded-3xl p-6 flex flex-col items-center justify-center text-brand-500 hover:bg-brand-50 hover:border-brand-500 transition-all group">
            <div class="w-12 h-12 bg-brand-100 rounded-full flex items-center justify-center mb-2 group-hover:bg-brand-500 group-hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            </div>
            <span class="font-bold">Buat Pesanan Baru</span>
        </button>
    </div>

    <!-- Chart Container -->
    <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
        <h3 class="font-bold text-lg mb-6">Grafik Minggu Ini</h3>
        <div class="relative h-72 w-full">
            <canvas id="mainChart"></canvas>
        </div>
    </div>
</div>

<script>
    function dashboardStats() {
        return {
            init() {
                const ctx = document.getElementById('mainChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                        datasets: [{
                            label: 'Pendapatan',
                            data: [120, 190, 150, 250, 220, 300, 280],
                            backgroundColor: '#1E90FF', // Menggunakan hex langsung agar aman di JS canvas
                            borderRadius: 8,
                            barThickness: 20
                        }, {
                            label: 'Pengeluaran',
                            data: [80, 50, 60, 40, 90, 50, 60],
                            backgroundColor: '#FFD166',
                            borderRadius: 8,
                            barThickness: 20
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { position: 'top', align: 'end' } },
                        scales: {
                            y: { beginAtZero: true, grid: { color: '#f1f5f9' } },
                            x: { grid: { display: false } }
                        }
                    }
                });
            }
        }
    }
</script>
@endsection