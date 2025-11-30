<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utama Laundry - Jasa Laundry Profesional & Digital</title>

    <link rel="icon" type="image/png" href="/images/logo.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            500: '#1E90FF',
                            600: '#0077E6',
                            700: '#1d4ed8',
                            900: '#1e3a8a',
                        },
                        accent: {
                            50: '#fffbeb',
                            100: '#fef3c7',
                            400: '#FFD166',
                            500: '#f59e0b',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* MARQUEE STRIP LAYANAN */
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-marquee {
            animation: marquee 18s linear infinite;
        }

        .animate-marquee2 {
            animation: marquee 18s linear infinite;
            animation-delay: 9s;
            /* setengah durasi biar nyambung mulus */
        }
    </style>

</head>

<body class="bg-slate-50 text-slate-800 antialiased selection:bg-brand-500 selection:text-white">

    <!-- NAVBAR -->
    <nav class="fixed w-full z-50 top-0 start-0 glass-nav border-b border-slate-200 transition-all duration-300">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between px-6 py-4">
            <!-- Logo -->
            <a href="#home" class="flex items-center gap-3 group">
                <div
                    class="w-10 h-10 rounded-xl overflow-hidden flex items-center justify-center shadow-lg shadow-brand-500/30 group-hover:scale-105 transition-transform bg-white">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Utama Laundry"
                        class="w-full h-full object-contain p-1">
                </div>
                <div class="leading-tight">
                    <span class="block text-lg font-bold text-slate-900 tracking-tight">Utama Laundry</span>
                    <span class="block text-[10px] font-medium text-slate-500 uppercase tracking-wider">Professional
                        Care</span>
                </div>
            </a>

            <!-- Mobile Hamburger -->
            <button onclick="toggleMenu()" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-slate-500 rounded-lg md:hidden hover:bg-slate-100 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Desktop Menu -->
            <div class="hidden w-full md:block md:w-auto" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium md:space-x-8 md:flex-row md:mt-0">
                    <li><a href="#home" class="block py-2 px-3 text-brand-600 font-bold md:p-0">Dashboard</a></li>
                    <li><a href="#order-form"
                            class="block py-2 px-3 text-slate-600 hover:text-brand-600 transition md:p-0">Order</a></li>
                    <li><a href="#services"
                            class="block py-2 px-3 text-slate-600 hover:text-brand-600 transition md:p-0">Layanan</a>
                    </li>
                    <li><a href="#pricing"
                            class="block py-2 px-3 text-slate-600 hover:text-brand-600 transition md:p-0">Harga</a></li>
                    <li><a href="#calculator"
                            class="block py-2 px-3 text-slate-600 hover:text-brand-600 transition md:p-0">Kalkulator</a>
                    </li>
                    <li><a href="#contact"
                            class="block py-2 px-3 text-slate-600 hover:text-brand-600 transition md:p-0">Kontak</a>
                    </li>
                </ul>
            </div>

            <!-- Login Button -->
            <div class="hidden md:flex ml-4">
                <a href="/dashboard" onclick="alert('Demo: Mengarahkan ke Dashboard Admin')"
                    class="text-brand-600 border border-brand-200 bg-white hover:bg-brand-50 hover:border-brand-500 font-medium rounded-full text-sm px-5 py-2.5 transition-all shadow-sm">
                    Login Admin
                </a>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100 px-4 py-4 shadow-xl">
            <ul class="space-y-3">
                <li><a href="#home" onclick="toggleMenu()" class="block font-bold text-brand-600">Dashboard</a></li>
                <li><a href="#order-form" onclick="toggleMenu()" class="block text-slate-600">Order</a></li>
                <li><a href="#services" onclick="toggleMenu()" class="block text-slate-600">Layanan</a></li>
                <li><a href="#pricing" onclick="toggleMenu()" class="block text-slate-600">Harga</a></li>
                <li><a href="#calculator" onclick="toggleMenu()" class="block text-slate-600">Kalkulator</a></li>
                <li>
                    <a href="/dashboard"
                        class="block w-full text-center mt-4 text-brand-600 border border-brand-200 rounded-lg py-2 hover:bg-brand-50">
                        Login Admin
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- HERO SECTION (REVISED) -->
    <section id="home" class="pt-28 pb-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-10 items-center">
            <!-- LEFT: TEXT -->
            <div class="space-y-6">
                <span
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-xs font-semibold text-brand-600 border border-brand-100">
                    <span class="w-2 h-2 rounded-full bg-brand-500"></span>
                    Quick, Reliable, Eco-Friendly
                </span>

                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                    Laundry Cepat, <br />
                    Rapi, dan <span class="text-brand-600">Bebas Ribet.</span>
                </h1>

                <p class="text-slate-600 text-base md:text-lg max-w-xl">
                    Antar jemput laundry kiloan, satuan, dan sepatu dengan pencatatan digital yang rapi.
                    Kamu tinggal duduk santai, kami yang urus cucian sampai tuntas.
                </p>

                <div class="flex flex-wrap gap-3">
                    <a href="#order-form"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-full text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 shadow-md hover:-translate-y-0.5 transition">
                        Pesan Antar Jemput
                    </a>
                    <a href="#pricing"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-full text-sm font-semibold border border-slate-200 text-slate-700 bg-white hover:border-brand-400 hover:text-brand-600 transition">
                        Lihat Harga
                    </a>
                </div>

                <div class="flex flex-wrap items-center gap-5 pt-2">
                    <div class="flex -space-x-2">
                        <div
                            class="w-8 h-8 rounded-full bg-brand-100 border border-white flex items-center justify-center text-[10px] font-semibold text-brand-700">
                            ⭐
                        </div>
                        <div class="w-8 h-8 rounded-full bg-slate-200 border border-white"></div>
                        <div class="w-8 h-8 rounded-full bg-slate-300 border border-white"></div>
                    </div>
                    <div class="text-xs text-slate-500">
                        <span class="font-semibold text-slate-700">100+ pelanggan</span><br />
                        puas dengan layanan Utama Laundry
                    </div>
                </div>
            </div>

            <!-- RIGHT: FOTO BESAR FULL -->
            <div class="hidden md:flex items-center justify-center">
                <div class="relative w-full max-w-lg">
                    <!-- background glow biar modern dikit -->
                    <div class="absolute -top-10 -right-6 w-32 h-32 bg-brand-100/80 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-12 -left-10 w-40 h-40 bg-accent-100/80 rounded-full blur-3xl"></div>

                    <!-- kartu foto besar -->
                    <div class="relative bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1610557892470-55d9e80c0bce?q=80&w=1139&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Utama Laundry - Pakaian Bersih dan Rapi"
                            class="w-full h-[320px] md:h-[360px] lg:h-[380px] object-cover" />
                    </div>
                </div>
            </div>


        </div>
    </section>


    <!-- STRIP LAYANAN CEPAT (Marquee) -->
    <section class="bg-white border-y border-slate-100 overflow-hidden">
        <div class="relative max-w-7xl mx-auto">
            <div
                class="flex items-center gap-10 py-4 text-brand-600 font-semibold text-base md:text-xl whitespace-nowrap animate-marquee">
                <span>» Laundry Kiloan</span>
                <span>» Laundry Satuan</span>
                <span>» Cuci Sepatu</span>
                <span>» Antar Jemput Area Dekat</span>
                <span>» Laundry Kiloan</span>
                <span>» Laundry Satuan</span>
                <span>» Cuci Sepatu</span>
                <span>» Antar Jemput Area Dekat</span>
            </div>

        </div>
    </section>

    <!-- FORM ORDER CEPAT (KE WHATSAPP) -->
    <section id="order-form" class="py-20 bg-slate-50">
        <div class="max-w-3xl mx-auto px-6">
            <div class="text-center mb-10">
                <span class="text-brand-600 font-bold tracking-wider uppercase text-xs">Order Online</span>
                <h2 class="text-3xl font-bold text-slate-900 mt-2 mb-3">
                    Form Order Cepat
                </h2>
                <p class="text-slate-500 text-sm max-w-xl mx-auto">
                    Isi data singkat di bawah ini. Setelah dikirim, WhatsApp akan terbuka
                    otomatis dengan detail pesanan Anda sehingga admin bisa langsung
                    memproses.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-8 shadow-lg border border-slate-100">
                <form id="waOrderForm" class="space-y-6">
                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="custName" required
                            class="w-full bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-xl focus:ring-brand-500 focus:border-brand-500 block p-3"
                            placeholder="Masukkan nama Anda" />
                    </div>

                    <!-- Jenis Layanan -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Jenis Layanan</label>
                        <select id="custService"
                            class="w-full bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-xl focus:ring-brand-500 focus:border-brand-500 block p-3">
                            <option value="Laundry Kiloan - Cuci Kering Setrika (Reguler)">Laundry Kiloan - Cuci Kering
                                Setrika (Reguler)</option>
                            <option value="Laundry Kiloan - Cuci Kering (Reguler)">Laundry Kiloan - Cuci Kering
                                (Reguler)</option>
                            <option value="Laundry Kiloan - Setrika Saja (Reguler)">Laundry Kiloan - Setrika Saja
                                (Reguler)</option>
                            <option value="Laundry Satuan - Selimut / Sprei">Laundry Satuan - Selimut / Sprei</option>
                            <option value="Laundry Satuan - Boneka">Laundry Satuan - Boneka</option>
                            <option value="External - Sepatu / Tas / Karpet">External - Sepatu / Tas / Karpet</option>
                        </select>
                    </div>

                    <!-- Estimasi Berat / Jumlah -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Perkiraan Berat / Jumlah</label>
                        <input type="text" id="custQty"
                            class="w-full bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-xl focus:ring-brand-500 focus:border-brand-500 block p-3"
                            placeholder="Contoh: 5 kg, 2 selimut, 1 pasang sepatu" />
                    </div>

                    <!-- Catatan -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Catatan Tambahan</label>
                        <textarea id="custNote" rows="3"
                            class="w-full bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-xl focus:ring-brand-500 focus:border-brand-500 block p-3"
                            placeholder="Contoh: minta parfum soft, tolong ambil sekitar jam 7 malam, dsb."></textarea>
                    </div>

                    <!-- Tombol -->
                    <button type="submit"
                        class="w-full inline-flex items-center justify-center px-5 py-3 text-sm font-semibold text-white bg-brand-600 rounded-xl hover:bg-brand-700 transition shadow-lg shadow-brand-500/30">
                        Kirim Detail ke WhatsApp
                    </button>

                    <p class="text-[11px] text-slate-400 mt-2">
                        *Form ini belum termasuk pembayaran. Admin akan mengkonfirmasi harga
                        dan metode pembayaran melalui WhatsApp.
                    </p>
                </form>
            </div>
        </div>
    </section>

    <!-- SIMPLE PROCESS (3 LANGKAH) -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <p class="text-xs font-semibold tracking-[0.25em] text-brand-500 uppercase mb-2">How We Work</p>
                <h2 class="text-3xl font-bold text-slate-900 mb-3">
                    Laundry Jadi Lebih Mudah Dengan 3 Langkah
                </h2>
                <p class="text-slate-500 text-sm">
                    Pesan jemput, kami proses dengan standar profesional, lalu antar kembali pakaian bersih & wangi ke
                    rumah Anda.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="relative bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <span class="absolute -top-4 left-6 text-5xl font-black text-slate-200">01</span>
                    <h3 class="font-semibold text-slate-800 mb-2 mt-4">Order & Pickup</h3>
                    <p class="text-sm text-slate-500">
                        Isi form atau chat WhatsApp, kurir kami siap jemput cucian sesuai jadwal Anda.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="relative bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <span class="absolute -top-4 left-6 text-5xl font-black text-slate-200">02</span>
                    <h3 class="font-semibold text-slate-800 mb-2 mt-4">Proses & Pencatatan</h3>
                    <p class="text-sm text-slate-500">
                        Cucian diproses sesuai jenis kain dan dicatat secara digital dengan nota unik seperti pada buku
                        catatan
                        harian.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="relative bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <span class="absolute -top-4 left-6 text-5xl font-black text-slate-200">03</span>
                    <h3 class="font-semibold text-slate-800 mb-2 mt-4">Antar & Pembayaran</h3>
                    <p class="text-sm text-slate-500">
                        Setelah selesai, kami konfirmasi via WhatsApp dan antar kembali. Pembayaran bisa tunai/transfer.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Kenapa Memilih <span class="text-brand-500">Utama
                        Laundry?</span></h2>
                <p class="text-slate-500">Kami mengutamakan kualitas, kecepatan, dan keamanan pakaian Anda dengan
                    dukungan teknologi.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1 -->
                <div
                    class="p-6 rounded-2xl border border-slate-100 bg-slate-50 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                    <div
                        class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-brand-600 mb-4 group-hover:bg-brand-500 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Tepat Waktu</h3>
                    <p class="text-sm text-slate-500">Komitmen waktu selesai sesuai janji. Reguler 2 hari, Express 5
                        jam.</p>
                </div>

                <!-- Card 2 -->
                <div
                    class="p-6 rounded-2xl border border-slate-100 bg-slate-50 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                    <div
                        class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4 group-hover:bg-green-500 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Higienis & Wangi</h3>
                    <p class="text-sm text-slate-500">Menggunakan deterjen berkualitas dan parfum premium tahan lama.
                    </p>
                </div>

                <!-- Card 3 -->
                <div
                    class="p-6 rounded-2xl border border-slate-100 bg-slate-50 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                    <div
                        class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4 group-hover:bg-accent-400 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Layanan Express</h3>
                    <p class="text-sm text-slate-500">Butuh cepat? Layanan express kami siap menyelesaikan cucian Anda
                        segera.</p>
                </div>

                <!-- Card 4 (Digital) -->
                <div
                    class="p-6 rounded-2xl border border-brand-100 bg-brand-50 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-16 h-16 bg-brand-200 rounded-bl-full -mr-8 -mt-8 opacity-50">
                    </div>
                    <div
                        class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-brand-600 mb-4 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-brand-700 mb-2">Pencatatan Digital</h3>
                    <p class="text-sm text-slate-600">Nota digital, riwayat order tersimpan aman, meminimalisir pakaian
                        tertukar.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- LAYANAN KAMI -->
    <section id="services" class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-12">
                <span class="text-brand-600 font-bold tracking-wider uppercase text-sm">Layanan Kami</span>
                <h2 class="text-3xl font-bold text-slate-900 mt-2">Solusi Lengkap Masalah Cucian</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group">
                    <div class="h-48 bg-slate-200 overflow-hidden relative">
                        <img src="https://plus.unsplash.com/premium_vector-1736271039693-2226236755bd?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGF1bmRyeSUyMHNjYWxlc3xlbnwwfHwwfHx8MA%3D%3D"
                            alt="Kiloan"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500" />
                        <div
                            class="absolute top-4 right-4 bg-white/90 px-3 py-1 rounded-lg text-xs font-bold text-slate-800">
                            Best Seller</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Laundry Kiloan</h3>
                        <p class="text-slate-500 text-sm mb-4">Cocok untuk pakaian sehari-hari. Dihitung berdasarkan
                            berat timbangan.</p>
                        <ul class="text-sm text-slate-600 space-y-2">
                            <li class="flex items-center"><span
                                    class="w-2 h-2 bg-brand-500 rounded-full mr-2"></span>Cuci Kering Setrika</li>
                            <li class="flex items-center"><span
                                    class="w-2 h-2 bg-brand-500 rounded-full mr-2"></span>Cuci Lipat</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group">
                    <div class="h-48 bg-slate-200 overflow-hidden relative">
                        <img src="https://plus.unsplash.com/premium_vector-1739287065825-39d1ac40dc78?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDV8fGxhdW5kcnl8ZW58MHx8MHx8fDA%3D"
                            alt="Satuan"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Satuan & Bedcover</h3>
                        <p class="text-slate-500 text-sm mb-4">Perawatan khusus untuk item besar atau delicate.</p>
                        <ul class="text-sm text-slate-600 space-y-2">
                            <li class="flex items-center"><span
                                    class="w-2 h-2 bg-accent-400 rounded-full mr-2"></span>Selimut & Sprei</li>
                            <li class="flex items-center"><span
                                    class="w-2 h-2 bg-accent-400 rounded-full mr-2"></span>Boneka & Bantal</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group">
                    <div class="h-48 bg-slate-200 overflow-hidden relative">
                        <img src="https://plus.unsplash.com/premium_vector-1736356346286-eac4983e74f6?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2hvZXMlMjBsYXVuZHJ5fGVufDB8fDB8fHww"
                            alt="Sepatu"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Sepatu, Tas & Karpet</h3>
                        <p class="text-slate-500 text-sm mb-4">Deep cleaning untuk barang kesayangan Anda.</p>
                        <ul class="text-sm text-slate-600 space-y-2">
                            <li class="flex items-center"><span
                                    class="w-2 h-2 bg-slate-400 rounded-full mr-2"></span>Cuci Sepatu Premium</li>
                            <li class="flex items-center"><span
                                    class="w-2 h-2 bg-slate-400 rounded-full mr-2"></span>Cuci Karpet Meteran</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DAFTAR HARGA -->
    <section id="pricing" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Daftar Harga Transparan</h2>
                <p class="text-slate-500">Pilih paket sesuai kebutuhan Anda. Tidak ada biaya tersembunyi.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-10">
                <!-- Kiloan Table -->
                <div class="bg-slate-50 rounded-3xl p-8 border border-slate-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-brand-100 rounded-lg text-brand-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800">Paket Kiloan</h3>
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-4 border-b border-slate-200">
                            <div>
                                <p class="font-bold text-slate-700">Cuci Kering Setrika</p>
                                <span
                                    class="text-xs text-slate-500 bg-white px-2 py-0.5 rounded border border-slate-200">Best
                                    Seller</span>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-brand-600">Rp 6.000 <span
                                        class="text-xs font-normal text-slate-500">/kg</span></p>
                                <p class="text-xs text-slate-400">Express Rp 9.000</p>
                            </div>
                        </div>

                        <div class="flex justify-between items-center pb-4 border-b border-slate-200">
                            <div>
                                <p class="font-bold text-slate-700">Cuci Kering (Lipat)</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-brand-600">Rp 5.000 <span
                                        class="text-xs font-normal text-slate-500">/kg</span></p>
                                <p class="text-xs text-slate-400">Express Rp 8.000</p>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-bold text-slate-700">Setrika Saja</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-brand-600">Rp 6.000 <span
                                        class="text-xs font-normal text-slate-500">/kg</span></p>
                                <p class="text-xs text-slate-400">Express Rp 8.000</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Satuan Table -->
                <div
                    class="bg-white rounded-3xl p-8 border border-slate-200 shadow-lg shadow-brand-500/5 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-accent-100 rounded-bl-full -mr-4 -mt-4 opacity-50">
                    </div>

                    <div class="flex items-center gap-3 mb-6 relative z-10">
                        <div class="p-2 bg-accent-100 rounded-lg text-accent-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800">Satuan & External</h3>
                    </div>

                    <div class="space-y-4 relative z-10">
                        <div class="flex justify-between items-center pb-4 border-b border-slate-100">
                            <div>
                                <p class="font-bold text-slate-700">Selimut / Bedcover</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-slate-800">Rp 25.000 <span
                                        class="text-xs font-normal text-slate-500">/pcs</span></p>
                                <p class="text-xs text-slate-400">Express Rp 45.000</p>
                            </div>
                        </div>

                        <div class="flex justify-between items-center pb-4 border-b border-slate-100">
                            <div>
                                <p class="font-bold text-slate-700">Boneka</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-slate-800">Rp 10.000 <span
                                        class="text-xs font-normal text-slate-500">/pcs</span></p>
                                <p class="text-xs text-slate-400">Express Rp 20.000</p>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-bold text-slate-700">Cuci Sepatu</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-slate-800">Rp 25.000 <span
                                        class="text-xs font-normal text-slate-500">/psg</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KALKULATOR -->
    <section id="calculator" class="py-20 bg-brand-600 relative overflow-hidden">
        <div
            class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
        </div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>

        <div class="max-w-4xl mx-auto px-6 relative z-10">
            <div class="text-center mb-10 text-white">
                <h2 class="text-3xl font-bold mb-2">Simulasi Biaya Laundry</h2>
                <p class="text-brand-100">Hitung perkiraan biaya laundry Anda sebelum datang ke outlet.</p>
            </div>

            <div class="bg-white rounded-3xl p-8 shadow-2xl">
                <form id="calcForm" class="grid md:grid-cols-2 gap-8">
                    <!-- Inputs -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Kategori</label>
                            <select id="categorySelect"
                                class="w-full bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-xl focus:ring-brand-500 focus:border-brand-500 block p-3">
                                <option value="kiloan">Laundry Kiloan</option>
                                <option value="satuan">Satuan (Bedcover, Sprei, Boneka)</option>
                                <option value="external">External (Sepatu, Tas, Karpet)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Layanan / Item</label>
                            <select id="itemSelect"
                                class="w-full bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-xl focus:ring-brand-500 focus:border-brand-500 block p-3">
                            </select>
                        </div>

                        <div>
                            <label id="qtyLabel" class="block text-sm font-medium text-slate-700 mb-2">Berat
                                (Kg)</label>
                            <div class="relative">
                                <input type="number" id="qtyInput" value="1" min="1" step="0.1"
                                    class="w-full bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-xl focus:ring-brand-500 focus:border-brand-500 block p-3 pr-12 font-bold" />
                                <div id="qtyUnit"
                                    class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-slate-500 text-sm font-bold">
                                    Kg</div>
                            </div>
                        </div>
                    </div>

                    <!-- Result -->
                    <div
                        class="bg-slate-50 rounded-2xl p-6 flex flex-col justify-center items-center text-center border border-slate-200">
                        <p class="text-sm text-slate-500 uppercase font-bold tracking-wider mb-2">Estimasi Total</p>
                        <h3 id="totalDisplay" class="text-4xl font-extrabold text-brand-600 mb-4">Rp 6.000</h3>
                        <p class="text-xs text-slate-400 mb-6">*Harga dapat berubah sesuai kondisi fisik barang saat
                            ditimbang di outlet.</p>

                        <a href="https://wa.me/6281234567890"
                            class="w-full inline-flex items-center justify-center px-5 py-3 text-sm font-medium text-white bg-green-500 rounded-xl hover:bg-green-600 transition shadow-lg shadow-green-500/20">
                            Pesan Sekarang via WA
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- CONTACT & FOOTER -->
    <!-- CONTACT & FOOTER + BIG MAPS -->
    <section id="contact" class="bg-slate-900 text-slate-300 pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 md:gap-12 mb-10">

            <!-- Kolom 1: Brand + Kontak + Jam -->
            <div>
                <h4 class="text-white font-bold mb-4">Kontak Kami</h4>
                <ul class="space-y-4 text-sm mb-6">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-brand-500 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Jl. Kerto Raharjo No.1, Ketawanggede,<br />Kec. Lowokwaru, Kota Malang, Jawa Timur
                            65145</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>0812-3456-7890</span>
                    </li>
                </ul>

                <h4 class="text-white font-bold mb-4">Jam Operasional</h4>
                <ul class="space-y-2 text-sm mb-6">
                    <li class="flex justify-between border-b border-slate-800 pb-2">
                        <span>Senin - Jumat</span>
                        <span class="text-white">07:00 - 20:00</span>
                    </li>
                    <li class="flex justify-between border-b border-slate-800 pb-2">
                        <span>Sabtu</span>
                        <span class="text-white">08:00 - 18:00</span>
                    </li>
                    <li class="flex justify-between pb-2">
                        <span>Minggu</span>
                        <span class="text-brand-500">Tutup / Libur</span>
                    </li>
                </ul>
            </div>

            <!-- Kolom 2: Google Maps (Lebih Besar) -->
            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between">
                    <h4 class="text-white font-bold">Lokasi Outlet</h4>
                    <span class="text-[11px] text-slate-400">Klik peta untuk buka di Google Maps</span>
                </div>
                <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl h-72 md:h-80">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.5183492215524!2d112.6116435!3d-7.945263799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788273afed6e4f%3A0x644bd5a0d18e753b!2sUTAMA%20Laundry%20Nomer%20Satu!5e0!3m2!1sid!2sid!4v1764507553320!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>

        <div class="border-t border-slate-800 pt-8 text-center text-xs text-slate-500">
            &copy; 2025 Utama Laundry. All rights reserved. <br />
            <span class="opacity-50">Dibuat sebagai Demo Frontend Interaktif.</span>
        </div>
    </section>


    <!-- JAVASCRIPT LOGIC -->
    <script>
        // Form Order Cepat -> Kirim ke WhatsApp
        const waForm = document.getElementById('waOrderForm');

        if (waForm) {
            waForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const name = document.getElementById('custName').value || '-';
                const service = document.getElementById('custService').value || '-';
                const qty = document.getElementById('custQty').value || '-';
                const note = document.getElementById('custNote').value || '-';

                const message = `
Kepada Utama Laundry,

Saya ingin melakukan pemesanan layanan.

*DETAIL PELANGGAN & LAYANAN*
----------------------------------------
*Nama:* ${name}
*Layanan:* ${service}
*Berat:* ${qty}
*Catatan:* ${note}
----------------------------------------

Mohon konfirmasi ketersediaan untuk pesanan ini dan informasikan estimasi waktu penyelesaian (selesai).

Terima kasih.
        `;
                const encoded = encodeURIComponent(message);
                const phone = '6282213840105';
                const url = `https://wa.me/${phone}?text=${encoded}`;

                window.open(url, '_blank');
            });
        }

        // Mobile Menu Toggle
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Calculator Logic
        const DATA = {
            kiloan: [
                { name: 'Cuci Kering Setrika - Reguler', price: 6000 },
                { name: 'Cuci Kering Setrika - Express', price: 9000 },
                { name: 'Cuci Kering - Reguler', price: 5000 },
                { name: 'Cuci Kering - Express', price: 8000 },
                { name: 'Setrika Saja - Reguler', price: 6000 },
                { name: 'Setrika Saja - Express', price: 8000 },
            ],
            satuan: [
                { name: 'Selimut - Reguler', price: 25000 },
                { name: 'Selimut - Express', price: 45000 },
                { name: 'Sprei - Reguler', price: 15000 },
                { name: 'Sprei - Express', price: 25000 },
                { name: 'Boneka Kecil - Reguler', price: 10000 },
                { name: 'Boneka Besar - Reguler', price: 25000 },
            ],
            external: [
                { name: 'Karpet (per meter)', price: 10000 },
                { name: 'Tas Wanita/Ransel', price: 20000 },
                { name: 'Sepatu Canvas/Sneakers', price: 25000 },
                { name: 'Sepatu Kulit/Suede', price: 35000 },
            ]
        };

        const categorySelect = document.getElementById('categorySelect');
        const itemSelect = document.getElementById('itemSelect');
        const qtyInput = document.getElementById('qtyInput');
        const qtyLabel = document.getElementById('qtyLabel');
        const qtyUnit = document.getElementById('qtyUnit');
        const totalDisplay = document.getElementById('totalDisplay');

        function updateItems() {
            const cat = categorySelect.value;
            const items = DATA[cat];

            itemSelect.innerHTML = '';
            items.forEach(item => {
                const opt = document.createElement('option');
                opt.value = item.price;
                opt.textContent = item.name;
                itemSelect.appendChild(opt);
            });

            if (cat === 'kiloan') {
                qtyLabel.textContent = 'Berat (Kg)';
                qtyUnit.textContent = 'Kg';
                qtyInput.setAttribute('step', '0.1');
            } else if (cat === 'external') {
                qtyLabel.textContent = 'Jumlah / Meter';
                qtyUnit.textContent = 'Qty';
                qtyInput.setAttribute('step', '1');
            } else {
                qtyLabel.textContent = 'Jumlah (Pcs)';
                qtyUnit.textContent = 'Pcs';
                qtyInput.setAttribute('step', '1');
            }

            calculate();
        }

        function calculate() {
            const price = parseFloat(itemSelect.value) || 0;
            const qty = parseFloat(qtyInput.value) || 0;
            const total = price * qty;

            totalDisplay.textContent = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(total);
        }

        // initial load
        updateItems();
        categorySelect.addEventListener('change', updateItems);
        itemSelect.addEventListener('change', calculate);
        qtyInput.addEventListener('input', calculate);
    </script>
</body>

</html>