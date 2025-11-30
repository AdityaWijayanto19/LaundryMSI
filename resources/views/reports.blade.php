<x-app-layout>
    <!-- Inject Config Warna & Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        if (typeof tailwind !== 'undefined') {
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            brand: { 50: '#eff6ff', 100: '#dbeafe', 500: '#1E90FF', 600: '#0077E6', 700: '#1d4ed8' },
                        },
                        fontFamily: { sans: ['Inter', 'sans-serif'] },
                    }
                }
            }
        }
    </script>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-extrabold text-xl text-slate-800 leading-tight">
                Laporan Keuangan
            </h2>
            <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full border border-blue-200">
                Bulan {{ \Carbon\Carbon::now()->translatedFormat('F Y') }}
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- SECTION 1: KARTU STATISTIK (RINGKASAN) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1: Hari Ini -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Pendapatan Hari Ini</p>
                        <p class="text-3xl font-extrabold text-slate-800">Rp {{ number_format($incomeToday, 0, ',', '.') }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shadow-sm">
                        <!-- Icon: Sun -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                </div>

                <!-- Card 2: Bulan Ini -->
                <div class="bg-gradient-to-br from-brand-600 to-blue-700 rounded-2xl p-6 shadow-lg shadow-blue-500/30 text-white flex items-center justify-between transform hover:-translate-y-1 transition">
                    <div>
                        <p class="text-xs font-bold text-blue-100 uppercase tracking-wider mb-1">Total Bulan Ini</p>
                        <p class="text-3xl font-extrabold">Rp {{ number_format($incomeMonth, 0, ',', '.') }}</p>
                        <p class="text-xs text-blue-200 mt-1 font-medium">Dari {{ $trxCountMonth }} Transaksi Lunas</p>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                        <!-- Icon: Calendar -->
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                </div>

                <!-- Card 3: Rata-rata (Opsional, info tambahan) -->
                @php
                    $avg = $trxCountMonth > 0 ? $incomeMonth / $trxCountMonth : 0;
                @endphp
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Rata-rata per Nota</p>
                        <p class="text-3xl font-extrabold text-slate-800">Rp {{ number_format($avg, 0, ',', '.') }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center shadow-sm">
                        <!-- Icon: Chart Bar -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: GRAFIK PENDAPATAN (Chart.js) -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">Grafik Pendapatan Harian</h3>
                        <p class="text-sm text-slate-500">Visualisasi pemasukan selama bulan ini.</p>
                    </div>
                    <!-- Legend Manual -->
                    <div class="flex items-center gap-2 text-xs font-medium text-slate-500 bg-slate-50 px-3 py-1.5 rounded-lg border border-slate-200">
                        <span class="w-3 h-3 rounded-full bg-brand-600"></span> Pemasukan (Rp)
                    </div>
                </div>
                
                <!-- Canvas Chart -->
                <div class="relative h-80 w-full">
                    <canvas id="incomeChart"></canvas>
                </div>
            </div>

            <!-- SECTION 3: TIPS BISNIS (Pemanis UI) -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-6 flex items-start gap-4">
                <div class="p-2 bg-yellow-100 text-yellow-600 rounded-lg shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h4 class="font-bold text-yellow-800 text-sm mb-1">Tips Mengelola Keuangan</h4>
                    <p class="text-xs text-yellow-700 leading-relaxed">
                        Pastikan semua transaksi pengeluaran (beli deterjen, listrik, gaji) juga dicatat secara manual di buku kas Anda. 
                        Grafik di atas hanya menampilkan <strong>Omzet Kotor</strong> dari transaksi laundry yang sudah lunas.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- SCRIPT CHART.JS -->
    <script>
        const ctx = document.getElementById('incomeChart').getContext('2d');
        
        // Data dari Controller
        const labels = @json($chartDates);
        const dataValues = @json($chartIncomes);

        // Gradient Background Chart
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(0, 119, 230, 0.2)'); // Brand Color Transparent
        gradient.addColorStop(1, 'rgba(0, 119, 230, 0)');

        const incomeChart = new Chart(ctx, {
            type: 'line', // Jenis grafik: Garis
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: dataValues,
                    borderColor: '#0077E6', // Warna Garis (Brand-600)
                    backgroundColor: gradient, // Warna isi bawah garis
                    borderWidth: 3,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#0077E6',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    tension: 0.4, // Membuat garis melengkung halus (smooth)
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false // Kita sudah buat legend manual di atas
                    },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        padding: 12,
                        titleFont: { size: 13 },
                        bodyFont: { size: 14, weight: 'bold' },
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                let value = context.parsed.y;
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            borderDash: [5, 5], // Garis putus-putus
                            color: '#e2e8f0'
                        },
                        ticks: {
                            font: { size: 11 },
                            color: '#64748b',
                            callback: function(value) {
                                // Singkat angka besar (500k, 1jt)
                                if(value >= 1000000) return (value/1000000) + 'jt';
                                if(value >= 1000) return (value/1000) + 'rb';
                                return value;
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: { size: 11 },
                            color: '#64748b',
                            maxTicksLimit: 10 // Supaya label tanggal tidak menumpuk
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>