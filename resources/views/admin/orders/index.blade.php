@extends('layouts.app')

@section('content')
<!-- Root Component Alpine -->
<div x-data="orderManager()">
    
    <!-- Top Controls -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Daftar Pesanan</h2>
            <p class="text-slate-500 text-sm">Kelola antrian laundry dan status pembayaran.</p>
        </div>
        <div class="flex gap-3">
            <button class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 text-sm font-medium shadow-sm transition-all">
                Export CSV
            </button>
            <button @click="openModal()" class="px-5 py-2 bg-brand-500 hover:bg-brand-600 text-white rounded-xl text-sm font-medium shadow-lg shadow-brand-500/30 flex items-center gap-2 transition-all transform hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Pesanan Baru
            </button>
        </div>
    </div>

    <!-- Toolbar: Search & Filter -->
    <div class="bg-white p-2 rounded-2xl shadow-sm border border-slate-100 mb-6 flex flex-col md:flex-row gap-2">
        <div class="flex-1 relative">
            <span class="absolute left-3 top-2.5 text-slate-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input x-model="search" type="text" placeholder="Cari No. Nota atau Pelanggan..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border-transparent focus:bg-white focus:ring-2 focus:ring-brand-500/20 rounded-xl outline-none text-sm transition-all">
        </div>
        <div class="flex gap-2">
            <select x-model="filterStatus" class="bg-slate-50 border-transparent rounded-xl px-4 py-2 text-sm text-slate-600 focus:ring-2 focus:ring-brand-500/20 outline-none cursor-pointer hover:bg-slate-100">
                <option value="">Semua Status</option>
                <option value="Proses">Sedang Proses</option>
                <option value="Selesai">Selesai</option>
                <option value="Diambil">Sudah Diambil</option>
            </select>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-slate-500 uppercase tracking-wider text-xs">
                        <th class="p-4 font-semibold">No. Nota</th>
                        <th class="p-4 font-semibold">Pelanggan</th>
                        <th class="p-4 font-semibold">Layanan</th>
                        <th class="p-4 font-semibold">Total</th>
                        <th class="p-4 font-semibold">Status Bayar</th>
                        <th class="p-4 font-semibold">Status Cucian</th>
                        <th class="p-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <template x-for="order in filteredOrders" :key="order.id">
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="p-4 font-bold text-brand-600" x-text="order.nota"></td>
                            <td class="p-4">
                                <div class="font-medium text-slate-800" x-text="order.name"></div>
                                <div class="text-xs text-slate-400" x-text="order.phone"></div>
                            </td>
                            <td class="p-4">
                                <span class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs font-medium" x-text="order.service"></span>
                                <span class="text-xs text-slate-400 ml-1" x-text="'(' + order.qty + ' ' + order.unit + ')'"></span>
                            </td>
                            <td class="p-4 font-bold text-slate-700" x-text="formatRupiah(order.total)"></td>
                            <td class="p-4">
                                <span :class="order.paid ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'" class="px-2.5 py-1 rounded-full text-xs font-bold" x-text="order.paid ? 'Lunas' : 'Belum'"></span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full" :class="{
                                        'bg-yellow-400': order.status === 'Proses',
                                        'bg-green-500': order.status === 'Selesai',
                                        'bg-slate-400': order.status === 'Diambil'
                                    }"></span>
                                    <span class="text-sm font-medium" x-text="order.status"></span>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-1.5 text-slate-400 hover:text-brand-500 hover:bg-brand-50 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </button>
                                    <button class="p-1.5 text-slate-400 hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors" title="Set Selesai" @click="order.status = 'Selesai'">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
            
            <!-- Empty State -->
            <div x-show="filteredOrders.length === 0" class="p-12 text-center text-slate-400" x-cloak>
                <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                <p>Tidak ada pesanan ditemukan.</p>
            </div>
        </div>
    </div>

    <!-- MODAL ADD ORDER -->
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-sm" 
         x-show="isModalOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         x-cloak>
         
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-xl overflow-hidden" @click.away="closeModal()">
            <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                <h3 class="font-bold text-lg text-slate-800">Buat Pesanan Baru</h3>
                <button @click="closeModal()" class="text-slate-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <div class="p-6 grid grid-cols-2 gap-6">
                <!-- Customer (Simulasi Live Search) -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Pelanggan</label>
                    <input type="text" x-model="form.name" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-brand-500 focus:border-brand-500" placeholder="Ketik nama pelanggan...">
                </div>

                <!-- Service -->
                <div class="col-span-2 sm:col-span-1">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Layanan</label>
                    <select x-model="form.service" @change="updatePrice" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-brand-500 focus:border-brand-500">
                        <option value="Cuci Komplit" data-price="6000" data-unit="kg">Cuci Komplit (Kg)</option>
                        <option value="Cuci Setrika" data-price="4000" data-unit="kg">Cuci Lipat (Kg)</option>
                        <option value="Bedcover" data-price="25000" data-unit="pcs">Bedcover (Satuan)</option>
                        <option value="Sepatu" data-price="20000" data-unit="pcs">Sepatu (Satuan)</option>
                    </select>
                </div>

                <!-- Qty -->
                <div class="col-span-2 sm:col-span-1">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Jumlah / Berat</label>
                    <div class="relative">
                        <input type="number" x-model="form.qty" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-brand-500 focus:border-brand-500 pr-12">
                        <span class="absolute right-4 top-2.5 text-slate-400 text-sm font-medium" x-text="form.unit">kg</span>
                    </div>
                </div>

                <!-- Note -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Catatan (Opsional)</label>
                    <textarea x-model="form.note" rows="2" class="w-full border-slate-200 bg-slate-50 rounded-xl focus:ring-brand-500 focus:border-brand-500" placeholder="Contoh: Jangan pakai pemutih..."></textarea>
                </div>
            </div>

            <!-- Footer Summary -->
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                <div>
                    <p class="text-xs text-slate-500 uppercase font-semibold">Estimasi Total</p>
                    <p class="text-xl font-bold text-brand-600" x-text="formatRupiah(calculateTotal())"></p>
                </div>
                <div class="flex gap-3">
                    <button @click="closeModal()" class="px-4 py-2 text-slate-500 hover:bg-slate-200 rounded-xl font-medium transition-colors">Batal</button>
                    <button @click="saveOrder()" class="px-6 py-2 bg-brand-500 hover:bg-brand-600 text-white rounded-xl shadow-lg shadow-brand-500/30 font-medium transition-transform active:scale-95">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function orderManager() {
        return {
            search: '',
            filterStatus: '',
            isModalOpen: false,
            // DUMMY DATA YANG POWERFUL
            orders: [
                { id: 1, nota: 'ORD-001', name: 'Budi Santoso', phone: '08123456789', service: 'Cuci Komplit', qty: 5.2, unit: 'kg', total: 31200, status: 'Selesai', paid: true },
                { id: 2, nota: 'ORD-002', name: 'Siti Aminah', phone: '08198765432', service: 'Bedcover', qty: 1, unit: 'pcs', total: 25000, status: 'Proses', paid: false },
                { id: 3, nota: 'ORD-003', name: 'Hotel Melati', phone: '0215555555', service: 'Cuci Lipat', qty: 15, unit: 'kg', total: 60000, status: 'Proses', paid: true },
                { id: 4, nota: 'ORD-004', name: 'Rizky Billar', phone: '08777888999', service: 'Sepatu', qty: 2, unit: 'pcs', total: 40000, status: 'Diambil', paid: true },
            ],
            form: {
                name: '', service: 'Cuci Komplit', qty: 1, unit: 'kg', price: 6000, note: ''
            },
            
            get filteredOrders() {
                return this.orders.filter(order => {
                    const matchesSearch = order.name.toLowerCase().includes(this.search.toLowerCase()) || 
                                          order.nota.toLowerCase().includes(this.search.toLowerCase());
                    const matchesStatus = this.filterStatus === '' || order.status === this.filterStatus;
                    return matchesSearch && matchesStatus;
                });
            },

            openModal() {
                this.isModalOpen = true;
                this.resetForm();
            },
            
            closeModal() {
                this.isModalOpen = false;
            },

            resetForm() {
                this.form = { name: '', service: 'Cuci Komplit', qty: 1, unit: 'kg', price: 6000, note: '' };
            },

            updatePrice(e) {
                const option = e.target.options[e.target.selectedIndex];
                this.form.price = option.dataset.price;
                this.form.unit = option.dataset.unit;
            },

            calculateTotal() {
                return this.form.qty * this.form.price;
            },

            saveOrder() {
                if(!this.form.name) return alert('Nama wajib diisi');
                
                // Add to dummy list (Simulation)
                this.orders.unshift({
                    id: Date.now(),
                    nota: 'ORD-' + Math.floor(Math.random() * 1000),
                    name: this.form.name,
                    phone: '-',
                    service: this.form.service,
                    qty: this.form.qty,
                    unit: this.form.unit,
                    total: this.calculateTotal(),
                    status: 'Proses',
                    paid: false
                });
                
                this.closeModal();
                // Optional: Show toast notification here
            },

            formatRupiah(number) {
                return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);
            }
        }
    }
</script>
@endsection