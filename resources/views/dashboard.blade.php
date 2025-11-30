<x-app-layout>
    <!-- Inject Config Warna -->
    <script>
        if (typeof tailwind !== 'undefined') {
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            brand: { 50: '#eff6ff', 100: '#dbeafe', 500: '#1E90FF', 600: '#0077E6', 700: '#1d4ed8' },
                        },
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        },
                    }
                }
            }
        }
    </script>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-extrabold text-xl text-slate-800 leading-tight">
                Dashboard Pencatatan
            </h2>
            <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded-full border border-blue-200">Admin</span>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- SECTION 1: RINGKASAN HARI INI -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card Transaksi -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Transaksi Hari Ini</p>
                        <p class="text-3xl font-extrabold text-slate-800">{{ $todayCount ?? 0 }} <span class="text-base font-medium text-slate-400">Nota</span></p>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shadow-sm">
                        <!-- Icon: Document Text -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                </div>
                <!-- Card Pendapatan -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Pendapatan Hari Ini</p>
                        <p class="text-3xl font-extrabold text-slate-800">Rp {{ number_format($todayIncome ?? 0, 0, ',', '.') }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center shadow-sm">
                        <!-- Icon: Banknotes -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
                <!-- Card Piutang -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Belum Lunas (Piutang)</p>
                        <p class="text-3xl font-extrabold text-red-500">{{ $totalUnpaid ?? 0 }} <span class="text-base font-medium text-slate-400">Nota</span></p>
                    </div>
                    <div class="w-12 h-12 bg-red-50 text-red-500 rounded-xl flex items-center justify-center shadow-sm">
                        <!-- Icon: Exclamation Circle -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- ALERT SUKSES -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-xl shadow-sm relative flex items-center gap-3 animate-pulse" role="alert">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- SECTION 2: GRID UTAMA (FORM & TABLE) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- KOLOM KIRI: INPUT FORM -->
                <div class="lg:col-span-1">
                    <div class="bg-white shadow-xl sm:rounded-2xl sticky top-6 border border-slate-100">
                        <div class="p-6">
                            <div class="mb-6 pb-4 border-b border-slate-100">
                                <h3 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                                    <span class="w-1.5 h-6 bg-brand-600 rounded-full"></span>
                                    Input Transaksi
                                </h3>
                                <p class="text-slate-500 text-xs mt-1 ml-4">Isi form di bawah ini dengan teliti.</p>
                            </div>

                            <form action="{{ route('transaction.store') }}" method="POST" id="transactionForm" class="space-y-6">
                                @csrf
                                
                                <!-- 1. INFO DASAR -->
                                <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                                    <h4 class="text-xs font-bold text-brand-600 uppercase tracking-wider mb-3">1. Data Pelanggan</h4>
                                    
                                    <div class="space-y-3">
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-600 mb-1">Tanggal Terima</label>
                                            <input type="date" name="transaction_date" value="{{ date('Y-m-d') }}" class="w-full border-slate-300 focus:border-brand-500 focus:ring-brand-500 rounded-xl shadow-sm text-sm p-2.5">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-600 mb-1">Nama Pelanggan <span class="text-red-500">*</span></label>
                                            <input type="text" name="customer_name" id="custName" required placeholder="Contoh: Bu Ani" class="w-full border-slate-300 focus:border-brand-500 focus:ring-brand-500 rounded-xl shadow-sm text-sm p-2.5 font-medium">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-600 mb-1">No WhatsApp (Opsional)</label>
                                            <input type="number" name="customer_phone" id="custPhone" placeholder="08xxxx (Untuk kirim nota WA)" class="w-full border-slate-300 focus:border-brand-500 focus:ring-brand-500 rounded-xl shadow-sm text-sm p-2.5">
                                        </div>
                                    </div>
                                </div>

                                <!-- 2. DETAIL CUCIAN -->
                                <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                                    <h4 class="text-xs font-bold text-brand-600 uppercase tracking-wider mb-3">2. Data Cucian</h4>
                                    
                                    <div class="space-y-3">
                                        <!-- Jenis Layanan (Radio) -->
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-600 mb-2">Jenis Layanan</label>
                                            <div class="flex gap-2">
                                                <label class="flex-1 cursor-pointer">
                                                    <input type="radio" name="service_type" value="Toko" checked class="peer sr-only">
                                                    <div class="p-2.5 rounded-xl border border-slate-300 text-slate-500 text-xs font-semibold peer-checked:bg-white peer-checked:border-brand-500 peer-checked:text-brand-600 peer-checked:shadow-sm transition flex items-center justify-center gap-2">
                                                        <!-- Icon: Store -->
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                                        Di Toko
                                                    </div>
                                                </label>
                                                <label class="flex-1 cursor-pointer">
                                                    <input type="radio" name="service_type" value="Delivery" class="peer sr-only">
                                                    <div class="p-2.5 rounded-xl border border-slate-300 text-slate-500 text-xs font-semibold peer-checked:bg-white peer-checked:border-brand-500 peer-checked:text-brand-600 peer-checked:shadow-sm transition flex items-center justify-center gap-2">
                                                        <!-- Icon: Truck -->
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
                                                        Antar-Jemput
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Paket -->
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-600 mb-1">Pilih Paket <span class="text-red-500">*</span></label>
                                            <select name="package_name" id="packageSelect" class="w-full border-slate-300 focus:border-brand-500 focus:ring-brand-500 rounded-xl shadow-sm text-sm p-2.5 bg-white">
                                                <option value="" disabled selected>- Pilih Paket Laundry -</option>
                                                <!-- Diisi oleh JS -->
                                            </select>
                                        </div>
                                        
                                        <input type="hidden" name="price_per_unit" id="pricePerUnit">
                                        <input type="hidden" name="unit" id="unitType">

                                        <!-- Qty & Total -->
                                        <div class="grid grid-cols-2 gap-3">
                                            <div>
                                                <label class="block text-xs font-semibold text-slate-600 mb-1">Jumlah (<span id="unitLabel">Kg</span>)</label>
                                                <input type="number" step="0.1" name="qty" id="qtyInput" required class="w-full border-slate-300 focus:border-brand-500 focus:ring-brand-500 rounded-xl shadow-sm text-lg font-bold p-2.5 text-center text-slate-700" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-xs font-semibold text-slate-600 mb-1">Total Biaya (Rp)</label>
                                                <input type="text" id="totalDisplay" readonly class="w-full bg-slate-200 border-transparent rounded-xl shadow-inner text-lg font-extrabold p-2.5 text-right text-slate-800 cursor-not-allowed" placeholder="0">
                                                <input type="hidden" name="total_price" id="totalPrice">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 3. PEMBAYARAN -->
                                <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                                    <h4 class="text-xs font-bold text-brand-600 uppercase tracking-wider mb-3">3. Pembayaran</h4>
                                    
                                    <div class="grid grid-cols-2 gap-3 mb-3">
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-600 mb-1">Metode</label>
                                            <select name="payment_method" id="paymentMethod" class="w-full border-slate-300 focus:border-brand-500 focus:ring-brand-500 rounded-xl shadow-sm text-xs p-2.5">
                                                <option value="cash_courier">Tunai (Cash)</option>
                                                <option value="digital">Digital (QRIS/Trf)</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-600 mb-1">Status</label>
                                            <select name="payment_status" id="paymentStatus" class="w-full border-slate-300 focus:border-brand-500 focus:ring-brand-500 rounded-xl shadow-sm text-xs p-2.5 font-bold text-red-600 bg-red-50">
                                                <option value="unpaid">Belum Lunas</option>
                                                <option value="paid">Lunas</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-slate-600 mb-1">Catatan Tambahan</label>
                                        <input type="text" name="notes" placeholder="Contoh: Jangan pakai pewangi..." class="w-full border-slate-300 focus:border-brand-500 focus:ring-brand-500 rounded-xl shadow-sm text-xs p-2.5">
                                    </div>
                                </div>

                                <!-- BUTTONS -->
                                <div class="grid grid-cols-2 gap-3">
                                    <button type="button" onclick="resetForm()" class="py-3 px-4 rounded-xl border border-slate-300 text-slate-600 text-sm font-bold hover:bg-slate-100 transition">
                                        Reset Form
                                    </button>
                                    <button type="submit" class="py-3 px-4 rounded-xl bg-brand-600 text-white text-sm font-bold hover:bg-brand-700 shadow-lg shadow-brand-500/30 transition transform hover:-translate-y-0.5">
                                        Simpan Data
                                    </button>
                                </div>

                                <button type="button" onclick="sendToWhatsapp()" class="w-full py-3 px-4 rounded-xl bg-green-500 hover:bg-green-600 text-white text-sm font-bold shadow-lg shadow-green-500/30 transition flex items-center justify-center gap-2 transform hover:-translate-y-0.5">
                                    <!-- Icon: Chat Bubble -->
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.466c-.74-.37-4.313-2.133-4.869-2.378-.556-.246-1.157.063-1.45.545-.303.496-1.096 1.185-1.341 1.291-.235.102-1.282-.249-2.583-1.405-1.006-.893-1.666-1.821-1.91-2.224-.234-.383-.006-.636.216-.867.234-.243.615-.658.847-.96.223-.292.164-.523.05-.755-.116-.232-1.124-2.73-1.492-3.606-.356-.846-.669-.708-1.015-.708-.315-.005-.724-.005-1.133-.005-.409 0-1.13.155-1.722.802-.591.646-2.243 2.176-2.243 5.308 0 3.132 2.296 6.136 2.613 6.574.318.438 4.544 6.897 10.957 9.664 4.179 1.802 5.021 1.439 5.923 1.347.902-.093 2.914-1.196 3.328-2.355.414-1.158.414-2.146.291-2.355-.123-.209-.454-.336-1.205-.711z"/></svg>
                                    Kirim Nota ke WA
                                </button>
                                <p class="text-[10px] text-slate-400 text-center mt-2">*Klik tombol WA untuk mengirim rincian ke pelanggan.</p>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN: TABLE DATA -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Filter Bar -->
                    <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-100 flex flex-col md:flex-row gap-4 justify-between items-center">
                        <h3 class="font-bold text-slate-800 text-lg">Riwayat Transaksi</h3>
                        <form method="GET" class="flex flex-col md:flex-row gap-2 w-full md:w-auto">
                            <select name="status" class="border-slate-300 text-sm rounded-xl shadow-sm focus:ring-brand-500 focus:border-brand-500" onchange="this.form.submit()">
                                <option value="all">Semua Status</option>
                                <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Lunas</option>
                                <option value="unpaid" {{ request('status') == 'unpaid' ? 'selected' : '' }}>Belum Lunas</option>
                            </select>
                            <div class="flex gap-2">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama Pelanggan..." class="border-slate-300 text-sm rounded-xl shadow-sm w-full focus:ring-brand-500 focus:border-brand-500 px-4">
                                <button type="submit" class="bg-slate-800 text-white rounded-xl px-5 py-2 text-sm font-bold hover:bg-slate-700 transition shadow-md">Cari</button>
                            </div>
                        </form>
                    </div>

                    <!-- Table Container -->
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-slate-600">
                                <thead class="bg-slate-50 text-slate-700 uppercase text-xs font-extrabold border-b border-slate-200 tracking-wider">
                                    <tr>
                                        <th class="px-6 py-4">Tgl</th>
                                        <th class="px-6 py-4">Pelanggan</th>
                                        <th class="px-6 py-4">Layanan & Paket</th>
                                        <th class="px-6 py-4 text-right">Total</th>
                                        <th class="px-6 py-4 text-center">Status</th>
                                        <th class="px-6 py-4 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 bg-white">
                                    @if(isset($transactions))
                                        @forelse($transactions as $t)
                                            <tr class="hover:bg-blue-50 transition duration-150">
                                                <td class="px-6 py-4 whitespace-nowrap text-slate-500 font-medium">
                                                    {{ \Carbon\Carbon::parse($t->transaction_date)->format('d/m/y') }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="font-bold text-slate-800 text-base">{{ $t->customer_name }}</div>
                                                    @if($t->customer_phone)
                                                        <div class="text-xs text-slate-400 flex items-center gap-1 mt-0.5">
                                                            <!-- Icon: Phone -->
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                                            {{ $t->customer_phone }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex flex-col">
                                                        <span class="font-bold text-brand-600">{{ $t->package_name }}</span>
                                                        <div class="flex items-center gap-1 text-xs text-slate-500 mt-0.5">
                                                            {{ floatval($t->qty) }} {{ $t->unit }} 
                                                            <span class="text-slate-300">|</span> 
                                                            
                                                            @if($t->service_type == 'Delivery')
                                                                <span class="flex items-center gap-1 text-orange-600 font-semibold">
                                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
                                                                    Antar
                                                                </span>
                                                            @else
                                                                <span class="flex items-center gap-1 text-blue-600 font-semibold">
                                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                                                    Toko
                                                                </span>
                                                            @endif
                                                        </div>
                                                        @if($t->notes)
                                                            <span class="mt-1 text-[10px] bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full w-fit max-w-[150px] truncate border border-yellow-200" title="{{ $t->notes }}">
                                                                Cat: {{ $t->notes }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-right font-extrabold text-slate-800 text-base">
                                                    Rp {{ number_format($t->total_price, 0, ',', '.') }}
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    @if($t->payment_status == 'paid')
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">
                                                            LUNAS
                                                        </span>
                                                    @else
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 border border-red-200">
                                                            BELUM
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <div class="flex items-center justify-center gap-2">
                                                        <form action="{{ route('transaction.status', $t->id) }}" method="POST">
                                                            @csrf @method('PATCH')
                                                            <button type="submit" class="w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center text-slate-500 hover:bg-brand-50 hover:text-brand-600 hover:border-brand-200 transition" title="Ubah Status Bayar">
                                                                <!-- Icon: Refresh -->
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('transaction.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data atas nama {{ $t->customer_name }}?');">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="w-8 h-8 rounded-full border border-red-100 flex items-center justify-center text-red-400 hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition" title="Hapus Data">
                                                                <!-- Icon: Trash -->
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                                    <div class="flex flex-col items-center">
                                                        <!-- Icon: Empty Box -->
                                                        <svg class="w-12 h-12 mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                                        <p class="font-medium">Belum ada data transaksi.</p>
                                                        <p class="text-xs">Silakan input data baru di formulir sebelah kiri.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    @else
                                        <tr>
                                            <td colspan="6" class="px-6 py-8 text-center text-red-400">
                                                Error: Data transaksi tidak terhubung.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div class="p-4 bg-slate-50 border-t border-slate-200">
                            @if(isset($transactions))
                                {{ $transactions->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
  <!-- JAVASCRIPT LOGIC -->
    <script>
        // DATA HARGA LAUNDRY
        // Silakan sesuaikan harga & unit di sini
        const PRICES = {
            'Cuci Kering Setrika (Reguler)': { price: 6000, unit: 'kg' },
            'Cuci Kering Setrika (Express)': { price: 9000, unit: 'kg' },
            'Cuci Kering Lipat (Reguler)':   { price: 5000, unit: 'kg' },
            'Setrika Saja (Reguler)':        { price: 6000, unit: 'kg' },
            'Bedcover / Selimut':            { price: 25000, unit: 'pcs' },
            'Cuci Sepatu Premium':           { price: 25000, unit: 'psg' },
            'Boneka':                        { price: 15000, unit: 'pcs' },
            'Karpet (Per Meter)':            { price: 10000, unit: 'mtr' }
        };

        // DOM Elements
        const packageSelect = document.getElementById('packageSelect');
        const pricePerUnitInput = document.getElementById('pricePerUnit');
        const unitTypeInput = document.getElementById('unitType');
        const unitLabel = document.getElementById('unitLabel');
        const qtyInput = document.getElementById('qtyInput');
        const totalPriceInput = document.getElementById('totalPrice');
        const totalDisplay = document.getElementById('totalDisplay');
        const paymentStatusSelect = document.getElementById('paymentStatus');

        // 1. Inisialisasi Dropdown Paket
        function initForm() {
            packageSelect.innerHTML = '<option value="" disabled selected>- Pilih Paket Laundry -</option>';
            for (let name in PRICES) {
                let opt = document.createElement('option');
                opt.value = name;
                // Menampilkan harga di dropdown agar Admin langsung tahu harganya
                opt.textContent = `${name} - Rp ${PRICES[name].price.toLocaleString('id-ID')}/${PRICES[name].unit}`;
                opt.setAttribute('data-price', PRICES[name].price);
                opt.setAttribute('data-unit', PRICES[name].unit);
                packageSelect.appendChild(opt);
            }
        }

        // 2. Hitung Otomatis Total Harga
        function calculateTotal() {
            const selectedOpt = packageSelect.options[packageSelect.selectedIndex];
            
            // Jika belum ada paket dipilih, stop
            if(!selectedOpt || !selectedOpt.value) return;

            const price = parseFloat(selectedOpt.getAttribute('data-price'));
            const unit = selectedOpt.getAttribute('data-unit');
            
            // Set hidden inputs untuk dikirim ke database
            pricePerUnitInput.value = price;
            unitTypeInput.value = unit;
            
            // Update label unit agar admin tidak bingung
            if(unit === 'kg') unitLabel.textContent = 'Kg';
            else if(unit === 'psg') unitLabel.textContent = 'Pasang';
            else if(unit === 'mtr') unitLabel.textContent = 'Meter';
            else unitLabel.textContent = 'Pcs';

            // Set input step (kalau kg boleh koma desimal, kalau pcs harus bulat)
            qtyInput.step = (unit === 'kg') ? '0.1' : '1';

            const qty = parseFloat(qtyInput.value) || 0;
            const total = price * qty;
            
            // Simpan ke hidden input (untuk database)
            totalPriceInput.value = total;
            
            // Tampilkan ke user dengan format Rupiah yang cantik (untuk visual)
            totalDisplay.value = new Intl.NumberFormat('id-ID').format(total);
        }

        // Event Listeners: Hitung setiap kali paket berubah atau qty diketik
        packageSelect.addEventListener('change', calculateTotal);
        qtyInput.addEventListener('input', calculateTotal);

        // 3. Ubah Warna Dropdown Status Bayar (Feedback Visual)
        paymentStatusSelect.addEventListener('change', function() {
            if(this.value === 'paid') {
                // Style Hijau jika Lunas
                this.className = "w-full border-slate-300 focus:border-green-500 focus:ring-green-500 rounded-xl shadow-sm text-xs p-2.5 font-bold text-green-600 bg-green-50 transition";
            } else {
                // Style Merah jika Belum Lunas
                this.className = "w-full border-slate-300 focus:border-red-500 focus:ring-red-500 rounded-xl shadow-sm text-xs p-2.5 font-bold text-red-600 bg-red-50 transition";
            }
        });

        // 4. Fitur Kirim WhatsApp (Profesional tanpa Emoji berlebihan)
        function sendToWhatsapp() {
            const name = document.getElementById('custName').value;
            const pkg = packageSelect.value;
            const qty = qtyInput.value;
            const unit = unitLabel.textContent; 
            const total = totalDisplay.value; // Pakai nilai yang sudah diformat rupiah
            const method = document.getElementById('paymentMethod').value;
            const methodText = (method === 'cash_courier') ? 'Tunai (Cash)' : 'Transfer / QRIS';
            const status = document.getElementById('paymentStatus').value;
            const statusText = (status === 'paid') ? 'LUNAS' : 'BELUM LUNAS';
            
            // Validasi Sederhana
            if(!name || !pkg || !total || total == '0') {
                alert("Mohon lengkapi Nama, Paket, dan Jumlah cucian terlebih dahulu.");
                return;
            }
            
            // Format Pesan WA yang Rapi & Profesional
            const text = `*NOTA TRANSAKSI - UTAMA LAUNDRY*
--------------------------------
Nama Pelanggan: *${name}*
Layanan: ${pkg}
Jumlah: ${qty} ${unit}
Total Biaya: *Rp ${total}*
--------------------------------
Metode Bayar: ${methodText}
Status Bayar: *${statusText}*

_Terima kasih telah menggunakan jasa kami._`;

            const encodedText = encodeURIComponent(text);
            const phone = document.getElementById('custPhone').value;
            let url = "";

            if(phone) {
                // Ganti 08 di depan jadi 62
                let p = phone.replace(/^0/, '62');
                url = `https://wa.me/${p}?text=${encodedText}`;
            } else {
                // Kalau nomor kosong, buka WA biar admin pilih kontak manual
                url = `https://wa.me/?text=${encodedText}`;
            }
            
            // Buka di tab baru
            window.open(url, '_blank');
        }

        // 5. Reset Form
        function resetForm() {
            if(confirm('Apakah Anda yakin ingin mengosongkan form?')) {
                document.getElementById('transactionForm').reset();
                document.getElementById('totalDisplay').value = '';
                // Kembalikan warna dropdown status ke default (merah/belum lunas)
                paymentStatusSelect.value = 'unpaid';
                paymentStatusSelect.dispatchEvent(new Event('change')); 
            }
        }

        // Jalankan saat halaman dimuat
        initForm();
    </script>
</x-app-layout>