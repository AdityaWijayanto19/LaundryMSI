<x-app-layout>
    <!-- Inject Config Warna ke Tailwind Breeze -->
    <script>
        if (typeof tailwind !== 'undefined') {
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            brand: { 50: '#eff6ff', 100: '#dbeafe', 500: '#1E90FF', 600: '#0077E6', 700: '#1d4ed8' },
                        }
                    }
                }
            }
        }
    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pencatatan Laundry') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- SECTION 1: STATS CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-brand-500 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Transaksi Hari Ini</p>
                        <!-- Gunakan variable dengan null coalescing (?? 0) agar tidak error jika data kosong -->
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $todayCount ?? 0 }} <span class="text-sm font-normal text-gray-400">Nota</span></p>
                    </div>
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-full">
                        🧾
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Pendapatan Hari Ini</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">Rp {{ number_format($todayIncome ?? 0, 0, ',', '.') }}</p>
                    </div>
                    <div class="p-3 bg-green-50 text-green-600 rounded-full">
                        💰
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-red-500 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Belum Lunas (Piutang)</p>
                        <p class="text-2xl font-bold text-red-600 mt-1">{{ $totalUnpaid ?? 0 }} <span class="text-sm font-normal text-gray-400">Nota</span></p>
                    </div>
                    <div class="p-3 bg-red-50 text-red-600 rounded-full">
                        ⚠️
                    </div>
                </div>
            </div>

            <!-- ALERT SUKSES -->
            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            <!-- SECTION 2: GRID UTAMA (FORM & TABLE) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- KOLOM KIRI: INPUT FORM (Sticky) -->
                <div class="lg:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg sticky top-6">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">
                                Input Transaksi Baru
                            </h3>

                            <form action="{{ route('transaction.store') }}" method="POST" id="transactionForm" class="space-y-4">
                                @csrf
                                
                                <!-- Tanggal -->
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 mb-1">Tanggal</label>
                                    <input type="date" name="transaction_date" value="{{ date('Y-m-d') }}" class="w-full border-gray-300 focus:border-brand-500 focus:ring-brand-500 rounded-md shadow-sm text-sm">
                                </div>

                                <!-- Pelanggan -->
                                <div class="grid grid-cols-1 gap-3">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-500 mb-1">Nama Pelanggan</label>
                                        <input type="text" name="customer_name" id="custName" required placeholder="Contoh: Bu Ani" class="w-full border-gray-300 focus:border-brand-500 focus:ring-brand-500 rounded-md shadow-sm text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-500 mb-1">No WhatsApp (Opsional)</label>
                                        <input type="number" name="customer_phone" id="custPhone" placeholder="081..." class="w-full border-gray-300 focus:border-brand-500 focus:ring-brand-500 rounded-md shadow-sm text-sm">
                                    </div>
                                </div>

                                <!-- Box Layanan -->
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-100 space-y-3">
                                    <!-- Jenis Layanan -->
                                    <div>
                                        <label class="block text-xs font-bold text-gray-500 mb-1">Jenis Layanan</label>
                                        <div class="flex gap-4">
                                            <label class="flex items-center gap-2 text-sm cursor-pointer">
                                                <input type="radio" name="service_type" value="Toko" checked class="text-brand-600 focus:ring-brand-500"> Di Toko
                                            </label>
                                            <label class="flex items-center gap-2 text-sm cursor-pointer">
                                                <input type="radio" name="service_type" value="Delivery" class="text-brand-600 focus:ring-brand-500"> Antar-Jemput
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Paket Dropdown -->
                                    <div>
                                        <label class="block text-xs font-bold text-gray-500 mb-1">Pilih Paket</label>
                                        <select name="package_name" id="packageSelect" class="w-full border-gray-300 focus:border-brand-500 focus:ring-brand-500 rounded-md shadow-sm text-sm">
                                            <option value="" disabled selected>- Pilih -</option>
                                            <!-- Diisi oleh JS -->
                                        </select>
                                    </div>
                                    
                                    <!-- Hidden Inputs untuk Harga -->
                                    <input type="hidden" name="price_per_unit" id="pricePerUnit">
                                    <input type="hidden" name="unit" id="unitType">

                                    <!-- Qty & Total -->
                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <label class="block text-xs font-bold text-gray-500 mb-1">Jml (<span id="unitLabel">Kg</span>)</label>
                                            <input type="number" step="0.1" name="qty" id="qtyInput" required class="w-full border-gray-300 focus:border-brand-500 focus:ring-brand-500 rounded-md shadow-sm text-sm font-bold">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-gray-500 mb-1">Total (Rp)</label>
                                            <input type="number" name="total_price" id="totalPrice" readonly class="w-full bg-gray-200 border-gray-300 rounded-md shadow-sm text-sm font-bold cursor-not-allowed">
                                        </div>
                                    </div>
                                </div>

                                <!-- Pembayaran -->
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-500 mb-1">Metode Bayar</label>
                                        <select name="payment_method" id="paymentMethod" class="w-full border-gray-300 focus:border-brand-500 focus:ring-brand-500 rounded-md shadow-sm text-xs">
                                            <option value="cash_courier">Tunai (Cash)</option>
                                            <option value="digital">Digital (QRIS/Trf)</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-500 mb-1">Status</label>
                                        <select name="payment_status" id="paymentStatus" class="w-full border-gray-300 focus:border-brand-500 focus:ring-brand-500 rounded-md shadow-sm text-xs font-bold text-red-600">
                                            <option value="unpaid" class="text-red-600">Belum Lunas</option>
                                            <option value="paid" class="text-green-600">Lunas</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Catatan -->
                                <div>
                                    <input type="text" name="notes" placeholder="Catatan Tambahan..." class="w-full border-gray-300 focus:border-brand-500 focus:ring-brand-500 rounded-md shadow-sm text-xs">
                                </div>

                                <!-- Buttons -->
                                <div class="grid grid-cols-2 gap-3 pt-2">
                                    <button type="button" onclick="resetForm()" class="py-2 px-4 rounded-md border border-gray-300 text-gray-700 text-sm font-semibold hover:bg-gray-50 transition">
                                        Reset
                                    </button>
                                    <button type="submit" class="py-2 px-4 rounded-md bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 shadow-md transition">
                                        Simpan
                                    </button>
                                </div>

                                <button type="button" onclick="sendToWhatsapp()" class="w-full py-2 px-4 rounded-md border-2 border-green-500 text-green-600 text-sm font-bold hover:bg-green-50 transition flex items-center justify-center gap-2">
                                    <span>💬</span> Generate Chat WhatsApp
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN: TABLE DATA -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Filter -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 flex flex-col md:flex-row gap-4 justify-between items-center">
                        <h3 class="font-bold text-gray-800">Riwayat Transaksi</h3>
                        <form method="GET" class="flex gap-2 w-full md:w-auto">
                            <select name="status" class="border-gray-300 text-sm rounded-md shadow-sm" onchange="this.form.submit()">
                                <option value="all">Semua Status</option>
                                <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Lunas</option>
                                <option value="unpaid" {{ request('status') == 'unpaid' ? 'selected' : '' }}>Belum Lunas</option>
                            </select>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama..." class="border-gray-300 text-sm rounded-md shadow-sm w-full">
                            <button type="submit" class="bg-gray-800 text-white rounded-md px-4 py-2 text-sm hover:bg-gray-700">Cari</button>
                        </form>
                    </div>

                    <!-- Table -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="bg-gray-50 text-gray-700 uppercase text-xs font-bold border-b border-gray-200">
                                    <tr>
                                        <th class="px-6 py-4">Tgl</th>
                                        <th class="px-6 py-4">Pelanggan</th>
                                        <th class="px-6 py-4">Layanan</th>
                                        <th class="px-6 py-4 text-right">Total</th>
                                        <th class="px-6 py-4 text-center">Status</th>
                                        <th class="px-6 py-4 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @if(isset($transactions))
                                        @forelse($transactions as $t)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($t->transaction_date)->format('d/m/y') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="font-bold text-gray-800">{{ $t->customer_name }}</div>
                                                <div class="text-xs text-gray-500">{{ $t->customer_phone ?? '-' }}</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-blue-600 font-semibold">{{ $t->package_name }}</div>
                                                <div class="text-xs text-gray-500">
                                                    {{ floatval($t->qty) }} {{ $t->unit }}
                                                </div>
                                                @if($t->notes)
                                                <div class="mt-1 text-[10px] bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded inline-block">
                                                    Cat: {{ Str::limit($t->notes, 15) }}
                                                </div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-right font-bold text-gray-800">
                                                Rp {{ number_format($t->total_price, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $t->payment_status == 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $t->payment_status == 'paid' ? 'LUNAS' : 'BELUM' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex items-center justify-center gap-2">
                                                    <form action="{{ route('transaction.status', $t->id) }}" method="POST">
                                                        @csrf @method('PATCH')
                                                        <button type="submit" class="text-xs border px-2 py-1 rounded hover:bg-gray-200" title="Ubah Status">
                                                            🔄
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('transaction.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="text-xs text-red-500 border border-red-200 px-2 py-1 rounded hover:bg-red-50" title="Hapus">
                                                            🗑️
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-8 text-center text-gray-400">
                                                Belum ada data transaksi.
                                            </td>
                                        </tr>
                                        @endforelse
                                    @else
                                        <tr>
                                            <td colspan="6" class="px-6 py-8 text-center text-red-400">
                                                Error: Data transaksi tidak ditemukan. Pastikan Route sudah benar.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div class="p-4 bg-gray-50 border-t border-gray-200">
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
    <script>
        const PRICES = {
            'Cuci Kering Setrika (Reg)': { price: 6000, unit: 'kg' },
            'Cuci Kering Setrika (Exp)': { price: 9000, unit: 'kg' },
            'Cuci Lipat (Reg)':          { price: 5000, unit: 'kg' },
            'Setrika Saja (Reg)':        { price: 6000, unit: 'kg' },
            'Bedcover / Selimut':        { price: 25000, unit: 'pcs' },
            'Cuci Sepatu':               { price: 25000, unit: 'psg' },
            'Boneka':                    { price: 15000, unit: 'pcs' },
        };

        const packageSelect = document.getElementById('packageSelect');
        const pricePerUnitInput = document.getElementById('pricePerUnit');
        const unitTypeInput = document.getElementById('unitType');
        const unitLabel = document.getElementById('unitLabel');
        const qtyInput = document.getElementById('qtyInput');
        const totalPriceInput = document.getElementById('totalPrice');
        const paymentStatusSelect = document.getElementById('paymentStatus');

        function initForm() {
            packageSelect.innerHTML = '<option value="" disabled selected>- Pilih Paket -</option>';
            for (let name in PRICES) {
                let opt = document.createElement('option');
                opt.value = name;
                opt.textContent = name;
                opt.setAttribute('data-price', PRICES[name].price);
                opt.setAttribute('data-unit', PRICES[name].unit);
                packageSelect.appendChild(opt);
            }
        }

        function calculateTotal() {
            const selectedOpt = packageSelect.options[packageSelect.selectedIndex];
            if(!selectedOpt || !selectedOpt.value) return;

            const price = parseFloat(selectedOpt.getAttribute('data-price'));
            const unit = selectedOpt.getAttribute('data-unit');
            
            pricePerUnitInput.value = price;
            unitTypeInput.value = unit;
            unitLabel.textContent = (unit === 'kg') ? 'Kg' : (unit === 'psg' ? 'Pasang' : 'Pcs');
            qtyInput.step = (unit === 'kg') ? '0.1' : '1';

            const qty = parseFloat(qtyInput.value) || 0;
            const total = price * qty;
            totalPriceInput.value = total;
        }

        packageSelect.addEventListener('change', calculateTotal);
        qtyInput.addEventListener('input', calculateTotal);

        paymentStatusSelect.addEventListener('change', function() {
            if(this.value === 'paid') {
                this.className = this.className.replace('text-red-600', 'text-green-600');
            } else {
                this.className = this.className.replace('text-green-600', 'text-red-600');
            }
        });

        function sendToWhatsapp() {
            const name = document.getElementById('custName').value;
            const pkg = packageSelect.value;
            const qty = qtyInput.value;
            const unit = unitLabel.textContent; 
            const total = totalPriceInput.value;
            const method = document.getElementById('paymentMethod').value;
            const methodText = (method === 'cash_courier') ? 'Tunai ke Kurir' : 'Transfer / QRIS';
            
            if(!name || !pkg || !total) {
                alert("Lengkapi data dulu!");
                return;
            }

            const totalFmt = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits:0 }).format(total);
            
            const text = `Halo Kak *${name}*,%0A%0ABerikut detail transaksi laundry Anda di *Utama Laundry*:%0A%0A📦 *Layanan:* ${pkg}%0A⚖️ *Jumlah:* ${qty} ${unit}%0A💰 *Total:* ${totalFmt}%0A💳 *Pembayaran:* ${methodText}%0A%0AMohon konfirmasinya ya kak. Terima kasih! 🙏`;

            const phone = document.getElementById('custPhone').value;
            let url = "";
            if(phone) {
                let p = phone.replace(/^0/, '62');
                url = `https://wa.me/${p}?text=${text}`;
            } else {
                url = `https://wa.me/?text=${text}`;
            }
            window.open(url, '_blank');
        }

        function resetForm() {
            document.getElementById('transactionForm').reset();
            document.getElementById('totalPrice').value = '';
        }

        initForm();
    </script>
</x-app-layout>