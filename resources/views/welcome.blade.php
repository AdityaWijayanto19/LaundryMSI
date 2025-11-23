<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KlinKlin Laundry - Laundry Cepat & Bersih Tanpa Bikin Pusing</title>
    <meta name="description"
        content="Layanan laundry modern dengan antar-jemput gratis, proses cepat, harga transparan, dan garansi kepuasan. Booking pickup Anda sekarang!">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js via CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Helper class for scroll-triggered animations */
        .fade-in-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s cubic-bezier(0.645, 0.045, 0.355, 1), transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Custom animation for floating cards */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- ===== HEADER / NAVBAR ===== -->
    <header id="navbar"
        class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-lg transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 transition-all duration-300" id="navbar-container">
                <a href="#" class="text-2xl font-bold text-indigo-600">KlinKlin✨</a>
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#layanan" class="text-gray-600 hover:text-indigo-600 transition-colors">Layanan</a>
                    <a href="#harga" class="text-gray-600 hover:text-indigo-600 transition-colors">Harga</a>
                    <a href="#cara-kerja" class="text-gray-600 hover:text-indigo-600 transition-colors">Cara Kerja</a>
                    <a href="#testimoni" class="text-gray-600 hover:text-indigo-600 transition-colors">Testimoni</a>
                    <a href="#faq" class="text-gray-600 hover:text-indigo-600 transition-colors">FAQ</a>
                </nav>
                <div class="hidden md:block">
                    <a href="#booking"
                        class="bg-indigo-600 text-white font-semibold py-2.5 px-6 rounded-lg shadow-md hover:bg-indigo-700 transition-all transform hover:scale-105">
                        Booking Sekarang
                    </a>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-indigo-600 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">
            <nav class="px-4 pt-2 pb-4 space-y-2">
                <a href="#layanan"
                    class="mobile-menu-link block px-3 py-2 rounded-md font-medium text-gray-700 hover:text-white hover:bg-indigo-500">Layanan</a>
                <a href="#harga"
                    class="mobile-menu-link block px-3 py-2 rounded-md font-medium text-gray-700 hover:text-white hover:bg-indigo-500">Harga</a>
                <a href="#cara-kerja"
                    class="mobile-menu-link block px-3 py-2 rounded-md font-medium text-gray-700 hover:text-white hover:bg-indigo-500">Cara
                    Kerja</a>
                <a href="#testimoni"
                    class="mobile-menu-link block px-3 py-2 rounded-md font-medium text-gray-700 hover:text-white hover:bg-indigo-500">Testimoni</a>
                <a href="#faq"
                    class="mobile-menu-link block px-3 py-2 rounded-md font-medium text-gray-700 hover:text-white hover:bg-indigo-500">FAQ</a>
                <a href="#booking"
                    class="mobile-menu-link block mt-4 w-full text-center bg-indigo-600 text-white font-semibold py-3 px-5 rounded-lg shadow-md hover:bg-indigo-700">Booking
                    Sekarang</a>
            </nav>
        </div>
    </header>

    <main class="pt-20">
        <!-- ===== HERO SECTION ===== -->
        <section class="relative bg-gradient-to-br from-indigo-50 to-purple-50 py-24 lg:py-32 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-16 items-center">
                <div class="z-10 text-center lg:text-left">
                    <span
                        class="inline-block bg-indigo-100 text-indigo-700 font-semibold py-1 px-4 rounded-full text-sm mb-4">✨
                        500+ pelanggan puas</span>
                    <h1 class="text-4xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
                        Laundry cepat & bersih <span class="text-indigo-600">tanpa bikin pusing.</span>
                    </h1>
                    <p class="mt-6 text-lg text-gray-600 max-w-lg mx-auto lg:mx-0">
                        Kami jemput, cuci, dan antar pakaian bersih wangi ke depan pintu Anda. Hemat waktu, hemat
                        tenaga, hidup lebih mudah!
                    </p>
                    <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#booking"
                            class="w-full sm:w-auto text-center bg-indigo-600 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:bg-indigo-700 transition-all transform hover:scale-105">
                            Booking Pickup Gratis
                        </a>
                        <a href="#harga"
                            class="w-full sm:w-auto text-center bg-white text-indigo-600 font-bold py-4 px-8 rounded-xl shadow-lg hover:bg-gray-100 transition-all transform hover:scale-105 border border-gray-200">
                            Lihat Estimasi Harga
                        </a>
                    </div>
                    <p class="mt-6 text-xs text-gray-500">Buka setiap hari: 08:00 - 20:00. Area layanan: Jakarta &
                        sekitarnya.</p>
                </div>

                <div class="relative h-80 lg:h-auto">
                    <div class="absolute inset-0 bg-indigo-200 rounded-3xl transform -rotate-6"></div>
                    <img src="https://images.unsplash.com/photo-1601042879364-a56a65b534e4?q=80&w=2070&auto=format&fit=crop"
                        alt="Pakaian bersih dan wangi terlipat rapi"
                        class="relative w-full h-full object-cover rounded-3xl shadow-2xl transform rotate-3 hover:rotate-2 transition-transform duration-500">

                    <div class="absolute -bottom-8 -left-8 bg-white p-4 rounded-xl shadow-lg animate-float">
                        <div class="flex items-center space-x-2">
                            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-sm">Same Day Service</p>
                                <p class="text-xs text-gray-500">Selesai di hari yang sama!</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -top-8 -right-8 bg-white p-4 rounded-xl shadow-lg animate-float"
                        style="animation-delay: 1s;">
                        <div class="flex items-center space-x-2">
                            <div class="text-yellow-400 flex">★★★★★</div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Rating 4.9/5.0</p>
                    </div>
                </div>
            </div>
            <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-purple-100 rounded-full opacity-50 blur-2xl"></div>
        </section>

        <!-- ===== KENAPA PILIH KAMI SECTION ===== -->
        <section id="why-us" class="py-24 bg-white fade-in-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Kenapa Harus Pilih Kami?</h2>
                    <p class="mt-4 text-lg text-gray-600">Kami memberikan lebih dari sekadar pakaian bersih.</p>
                </div>
                <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div
                        class="bg-gray-50 p-8 rounded-2xl text-center hover:shadow-xl hover:bg-indigo-50 transition-all transform hover:-translate-y-2">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-indigo-100 text-indigo-600 rounded-full mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="mt-6 font-bold text-lg">Pickup & Delivery Gratis</h3>
                        <p class="mt-2 text-gray-600 text-sm">Tak perlu keluar rumah, kami yang datang ke tempat Anda.
                        </p>
                    </div>
                    <div
                        class="bg-gray-50 p-8 rounded-2xl text-center hover:shadow-xl hover:bg-indigo-50 transition-all transform hover:-translate-y-2">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-indigo-100 text-indigo-600 rounded-full mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="mt-6 font-bold text-lg">Proses Cepat & Tepat Waktu</h3>
                        <p class="mt-2 text-gray-600 text-sm">Layanan express selesai dalam hitungan jam, reguler
                            maksimal 2 hari.</p>
                    </div>
                    <div
                        class="bg-gray-50 p-8 rounded-2xl text-center hover:shadow-xl hover:bg-indigo-50 transition-all transform hover:-translate-y-2">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-indigo-100 text-indigo-600 rounded-full mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="mt-6 font-bold text-lg">Pewangi Premium</h3>
                        <p class="mt-2 text-gray-600 text-sm">Pilihan aroma mewah yang tahan lama membuat hari Anda
                            lebih segar.</p>
                    </div>
                    <div
                        class="bg-gray-50 p-8 rounded-2xl text-center hover:shadow-xl hover:bg-indigo-50 transition-all transform hover:-translate-y-2">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-indigo-100 text-indigo-600 rounded-full mx-auto">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="mt-6 font-bold text-lg">Garansi Kepuasan</h3>
                        <p class="mt-2 text-gray-600 text-sm">Tidak puas dengan hasil cuci? Kami cuci ulang gratis,
                            tanpa syarat.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== LAYANAN (SERVICES) SECTION ===== -->
        <section id="layanan" class="py-24 bg-gray-50 fade-in-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Layanan Lengkap Kami</h2>
                    <p class="mt-4 text-lg text-gray-600">Semua kebutuhan kebersihan Anda dalam satu tempat.</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div
                        class="group bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1626806819282-2c1dc01a5e0c?q=80&w=2070&auto=format&fit=crop"
                                alt="Laundry Kiloan" class="h-56 w-full object-cover">
                            <div
                                class="absolute top-4 left-4 bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                Paling Populer</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold">Laundry Kiloan</h3>
                            <p class="mt-2 text-gray-600">Solusi hemat untuk pakaian harian Anda. Bersih, wangi, dan
                                rapi.</p>
                            <p class="mt-4 font-bold text-indigo-600">Mulai dari Rp 8.000/kg</p>
                        </div>
                    </div>
                    <div
                        class="group bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                        <img src="https://images.unsplash.com/photo-1605648756917-36363dbdf4ef?q=80&w=2070&auto=format&fit=crop"
                            alt="Dry Cleaning" class="h-56 w-full object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold">Dry Cleaning</h3>
                            <p class="mt-2 text-gray-600">Perawatan khusus untuk jas, gaun, dan bahan sensitif lainnya.
                            </p>
                            <p class="mt-4 font-bold text-indigo-600">Mulai dari Rp 35.000/pcs</p>
                        </div>
                    </div>
                    <div
                        class="group bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1608303379282-585324483a90?q=80&w=1925&auto=format&fit=crop"
                                alt="Cuci Sepatu" class="h-56 w-full object-cover">
                            <div
                                class="absolute top-4 left-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                Rekomendasi</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold">Cuci Sepatu Premium</h3>
                            <p class="mt-2 text-gray-600">Sneakers, pantofel, atau boots? Kami buat kembali seperti
                                baru.</p>
                            <p class="mt-4 font-bold text-indigo-600">Mulai dari Rp 50.000/pasang</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== INTERACTIVE PRICING ESTIMATOR ===== -->
        <section id="harga" class="py-24 bg-white fade-in-section">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Cek Estimasi Biaya Anda</h2>
                    <p class="mt-4 text-lg text-gray-600">Transparan, cepat, dan tanpa biaya tersembunyi.</p>
                </div>
                <div class="bg-gray-50 rounded-2xl shadow-xl p-8 lg:p-12" x-data="pricingCalculator()">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <label for="service-type" class="block text-sm font-medium text-gray-700">Jenis
                                Layanan</label>
                            <select id="service-type" x-model="service"
                                class="mt-1 block w-full py-3 px-4 border border-gray-300 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="kiloan">Laundry Kiloan</option>
                                <option value="satuan">Laundry Satuan (Jas, Gaun, dll)</option>
                                <option value="sepatu">Cuci Sepatu</option>
                            </select>

                            <div class="mt-6">
                                <label for="quantity" class="block text-sm font-medium text-gray-700"
                                    x-text="quantityLabel"></label>
                                <input type="number" id="quantity" x-model.number="quantity" min="1"
                                    class="mt-1 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Contoh: 5">
                            </div>

                            <div class="mt-6">
                                <span class="block text-sm font-medium text-gray-700 mb-2">Layanan Tambahan</span>
                                <div class="space-y-2">
                                    <label
                                        class="flex items-center space-x-3 p-3 bg-white rounded-lg border has-[:checked]:bg-indigo-50 has-[:checked]:border-indigo-300 cursor-pointer">
                                        <input type="checkbox" x-model="addons.express"
                                            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <span class="text-sm text-gray-700">Layanan Express (1 Hari)</span>
                                    </label>
                                    <label
                                        class="flex items-center space-x-3 p-3 bg-white rounded-lg border has-[:checked]:bg-indigo-50 has-[:checked]:border-indigo-300 cursor-pointer">
                                        <input type="checkbox" x-model="addons.premiumFragrance"
                                            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <span class="text-sm text-gray-700">Pewangi Premium</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="bg-indigo-600 text-white p-8 rounded-xl flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-indigo-200">Estimasi Biaya</h3>
                                <div class="mt-4 text-5xl font-bold transition-all duration-300"
                                    x-text="formatCurrency(totalPrice)"></div>
                                <hr class="my-6 border-indigo-400">
                                <div class="space-y-3 text-sm">
                                    <div class="flex justify-between">
                                        <span>Subtotal Layanan</span>
                                        <span x-text="formatCurrency(basePrice)"></span>
                                    </div>
                                    <div class="flex justify-between transition-opacity"
                                        :class="addons.express ? 'opacity-100' : 'opacity-50'">
                                        <span>Biaya Express</span>
                                        <span x-text="formatCurrency(expressFee)"></span>
                                    </div>
                                    <div class="flex justify-between transition-opacity"
                                        :class="addons.premiumFragrance ? 'opacity-100' : 'opacity-50'">
                                        <span>Pewangi Premium</span>
                                        <span x-text="formatCurrency(fragranceFee)"></span>
                                    </div>
                                </div>
                            </div>
                            <button @click="document.getElementById('booking').scrollIntoView({ behavior: 'smooth' })"
                                class="mt-8 w-full bg-white text-indigo-600 font-bold py-3 rounded-lg hover:bg-gray-100 transition">
                                Lanjut Booking
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== CARA KERJA (HOW IT WORKS) SECTION ===== -->
        <section id="cara-kerja" class="py-24 bg-gray-50 fade-in-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Cuma 4 Langkah Mudah</h2>
                    <p class="mt-4 text-lg text-gray-600">Proses kami simpel dan dirancang untuk kenyamanan Anda.</p>
                </div>
                <div class="relative">
                    <div class="hidden md:block absolute top-12 left-0 w-full h-0.5 bg-gray-200"></div>
                    <div class="grid md:grid-cols-4 gap-8">
                        <div class="text-center relative fade-in-section" style="transition-delay: 100ms;">
                            <div class="relative inline-block bg-gray-50 px-2">
                                <div
                                    class="flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-lg border-4 border-indigo-500">
                                    <span class="text-3xl font-bold text-indigo-600">1</span>
                                </div>
                            </div>
                            <h3 class="mt-6 text-lg font-semibold">Pesan & Jadwalkan</h3>
                            <p class="mt-2 text-gray-600 text-sm">Isi form booking atau hubungi kami via WhatsApp.</p>
                        </div>
                        <div class="text-center relative fade-in-section" style="transition-delay: 200ms;">
                            <div class="relative inline-block bg-gray-50 px-2">
                                <div
                                    class="flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-lg border-4 border-indigo-500">
                                    <span class="text-3xl font-bold text-indigo-600">2</span>
                                </div>
                            </div>
                            <h3 class="mt-6 text-lg font-semibold">Kami Jemput</h3>
                            <p class="mt-2 text-gray-600 text-sm">Tim kami akan datang ke lokasi Anda sesuai jadwal.</p>
                        </div>
                        <div class="text-center relative fade-in-section" style="transition-delay: 300ms;">
                            <div class="relative inline-block bg-gray-50 px-2">
                                <div
                                    class="flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-lg border-4 border-indigo-500">
                                    <span class="text-3xl font-bold text-indigo-600">3</span>
                                </div>
                            </div>
                            <h3 class="mt-6 text-lg font-semibold">Proses Cuci</h3>
                            <p class="mt-2 text-gray-600 text-sm">Pakaian dicuci terpisah, bersih, dan higienis.</p>
                        </div>
                        <div class="text-center relative fade-in-section" style="transition-delay: 400ms;">
                            <div class="relative inline-block bg-gray-50 px-2">
                                <div
                                    class="flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-lg border-4 border-indigo-500">
                                    <span class="text-3xl font-bold text-indigo-600">4</span>
                                </div>
                            </div>
                            <h3 class="mt-6 text-lg font-semibold">Kami Antar Kembali</h3>
                            <p class="mt-2 text-gray-600 text-sm">Pakaian bersih dan wangi siap diantar ke pintu Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== TESTIMONI SECTION ===== -->
        <section id="testimoni" class="py-24 bg-white fade-in-section">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Apa Kata Mereka?</h2>
                    <p class="mt-4 text-lg text-gray-600">Kepuasan pelanggan adalah prioritas utama kami.</p>
                </div>
                <div id="testimonial-carousel" class="relative">
                    <div class="overflow-hidden">
                        <div id="testimonial-slider" class="flex transition-transform duration-500 ease-in-out">
                            <!-- Testimonial Items injected by JS -->
                        </div>
                    </div>
                    <button id="prevBtn"
                        class="absolute top-1/2 -left-4 lg:-left-12 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md text-gray-600 hover:bg-gray-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                    <button id="nextBtn"
                        class="absolute top-1/2 -right-4 lg:-right-12 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md text-gray-600 hover:bg-gray-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        <!-- ===== FAQ SECTION ===== -->
        <section id="faq" class="py-24 bg-gray-50 fade-in-section">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Pertanyaan Umum</h2>
                    <p class="mt-4 text-lg text-gray-600">Punya pertanyaan? Kami punya jawabannya.</p>
                </div>
                <div class="space-y-4" x-data="{ openFaq: 1 }">
                    <div class="bg-white rounded-lg shadow-sm">
                        <button @click="openFaq = (openFaq === 1 ? null : 1)"
                            class="w-full flex justify-between items-center p-6 text-left">
                            <span class="font-semibold text-gray-800">Berapa lama proses laundry reguler?</span>
                            <svg class="w-5 h-5 text-gray-500 transition-transform"
                                :class="{ 'rotate-180': openFaq === 1 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="openFaq === 1" x-collapse class="px-6 pb-6 text-gray-600">
                            <p>Proses laundry reguler kami biasanya memakan waktu 2-3 hari kerja. Untuk layanan express,
                                kami bisa menyelesaikannya dalam waktu 1 hari (24 jam) dengan biaya tambahan.</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm">
                        <button @click="openFaq = (openFaq === 2 ? null : 2)"
                            class="w-full flex justify-between items-center p-6 text-left">
                            <span class="font-semibold text-gray-800">Apakah ada minimal order untuk
                                antar-jemput?</span>
                            <svg class="w-5 h-5 text-gray-500 transition-transform"
                                :class="{ 'rotate-180': openFaq === 2 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="openFaq === 2" x-collapse class="px-6 pb-6 text-gray-600">
                            <p>Ya, untuk layanan antar-jemput gratis, kami memberlakukan minimal order seberat 5 kg
                                untuk laundry kiloan atau senilai Rp 50.000 untuk total transaksi. Di bawah itu, akan
                                dikenakan biaya ongkos kirim standar.</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm">
                        <button @click="openFaq = (openFaq === 3 ? null : 3)"
                            class="w-full flex justify-between items-center p-6 text-left">
                            <span class="font-semibold text-gray-800">Bagaimana jika pakaian hilang atau rusak?</span>
                            <svg class="w-5 h-5 text-gray-500 transition-transform"
                                :class="{ 'rotate-180': openFaq === 3 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="openFaq === 3" x-collapse class="px-6 pb-6 text-gray-600">
                            <p>Kami memiliki garansi kepuasan pelanggan. Jika terjadi kerusakan atau kehilangan yang
                                disebabkan oleh kelalaian kami, kami akan memberikan kompensasi sesuai dengan syarat dan
                                ketentuan yang berlaku. Harap simpan nota Anda sebagai bukti.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== BOOKING / CONTACT FORM ===== -->
        <section id="booking" class="py-24 bg-white fade-in-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-16 items-start">
                <div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Siap Punya Pakaian Bersih?</h2>
                    <p class="mt-4 text-lg text-gray-600">Isi form di samping untuk menjadwalkan penjemputan, atau
                        hubungi kami langsung. Cepat dan mudah!</p>
                    <div class="mt-8 space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="bg-indigo-100 p-3 rounded-full text-indigo-600">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.487 5.235 3.487 8.413 0 6.557-5.338 11.892-11.894 11.892-1.99 0-3.903-.52-5.586-1.457l-6.354 1.687zM8.88 7.398c.198.011.666.34 1.503 1.142.837.802 1.222 1.655 1.294 1.83.072.175.059.319-.018.455-.077.135-.291.353-.455.518-.164.164-.349.335-.504.49-.155.155-.329.319-.118.665.211.346 1.053 1.745 2.296 2.988 1.528 1.528 2.682 1.935 3.065 2.112.383.177.6.276.818.159.218-.117.935-.865 1.181-1.15.246-.285.492-.353.757-.202.265.15 1.697.788 1.982.91.285.121.47.19.53.284.06.095.043.51-.122.986-.164.475-.975 1.112-1.342 1.355-.367.243-.75.368-1.17.386-.42.018-1.03-.08-1.57-.291-.54-.211-2.12-1.003-3.99-2.748-2.289-2.13-3.763-4.74-4.038-5.263-.276-.523-.586-1.13-.586-1.758.001-.628.247-1.156.455-1.523.208-.367.455-.475.619-.493z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold">WhatsApp</p>
                                <a href="https://wa.me/6281234567890" target="_blank"
                                    class="text-indigo-600 hover:underline">0812-3456-7890</a>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="bg-indigo-100 p-3 rounded-full text-indigo-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold">Alamat Workshop</p>
                                <p class="text-gray-600">Jl. Kebersihan No. 123, Jakarta Selatan, 12345</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg">
                    <form id="booking-form" novalidate>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" id="name" name="name" required
                                    class="mt-1 block w-full py-2.5 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div>
                                <label for="whatsapp" class="block text-sm font-medium text-gray-700">Nomor
                                    WhatsApp</label>
                                <input type="tel" id="whatsapp" name="whatsapp" required
                                    class="mt-1 block w-full py-2.5 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="0812...">
                            </div>
                        </div>
                        <div class="mt-6">
                            <label for="address" class="block text-sm font-medium text-gray-700">Alamat
                                Penjemputan</label>
                            <textarea id="address" name="address" rows="3" required
                                class="mt-1 block w-full py-2.5 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="pickup-date" class="block text-sm font-medium text-gray-700">Tanggal
                                    Jemput</label>
                                <input type="date" id="pickup-date" name="pickup-date" required
                                    class="mt-1 block w-full py-2.5 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div>
                                <label for="pickup-time" class="block text-sm font-medium text-gray-700">Jam
                                    Jemput</label>
                                <input type="time" id="pickup-time" name="pickup-time" required
                                    class="mt-1 block w-full py-2.5 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>
                        <div class="mt-8">
                            <button type="submit"
                                class="w-full bg-indigo-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-indigo-700 transition">
                                Kirim Jadwal Penjemputan
                            </button>
                        </div>
                    </form>
                    <div id="form-success-message"
                        class="hidden mt-4 p-4 bg-green-100 text-green-800 rounded-lg text-center">
                        ✅ Booking berhasil dikirim! (Ini adalah pesan dummy). Tim kami akan segera menghubungi Anda
                        melalui WhatsApp.
                    </div>
                    <div id="form-error-message" class="hidden mt-4 p-4 bg-red-100 text-red-800 rounded-lg text-center">
                        ⚠️ Harap isi semua field yang wajib diisi.
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-semibold">KlinKlin✨</h3>
                    <p class="mt-4 text-gray-400 text-sm">Laundry modern untuk gaya hidup praktis.</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold tracking-wider uppercase">Quick Links</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#layanan" class="text-gray-400 hover:text-white transition">Layanan</a></li>
                        <li><a href="#harga" class="text-gray-400 hover:text-white transition">Harga</a></li>
                        <li><a href="#faq" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                        <li><a href="#booking" class="text-gray-400 hover:text-white transition">Booking</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold tracking-wider uppercase">Hubungi Kami</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li class="text-gray-400">Jl. Kebersihan No. 123</li>
                        <li class="text-gray-400">Jakarta Selatan</li>
                        <li class="text-gray-400">contact@klinklin.id</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold tracking-wider uppercase">Social Media</h3>
                    <div class="flex mt-4 space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition"><svg class="w-6 h-6"
                                fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><svg class="w-6 h-6"
                                fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.012-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.345 2.525c.636-.247 1.363-.416 2.427-.465C9.795 2.013 10.148 2 12.315 2zm0 1.623c-2.387 0-2.673.01-3.616.055-1.149.053-1.588.22-1.844.328-.328.14-.549.317-.79.558-.24.24-.418.462-.558.79-.108.256-.275.695-.328 1.844-.046.943-.054 1.229-.054 3.616s.008 2.673.054 3.616c.053 1.149.22 1.588.328 1.844.14.328.317.549.558.79.24.24.462.418.79.558.256.108.695.275 1.844.328.943.046 1.229.054 3.616.054s2.673-.008 3.616-.054c1.149-.053 1.588-.22 1.844-.328.328-.14.549-.317.79-.558.24-.24.418-.462.558-.79.108-.256.275-.695.328-1.844.046-.943.054-1.229.054-3.616s-.008-2.673-.054-3.616c-.053-1.149-.22-1.588-.328-1.844a2.91 2.91 0 00-.558-.79 2.91 2.91 0 00-.79-.558c-.256-.108-.695-.275-1.844-.328C15.002 3.633 14.7 3.623 12.315 3.623zM12 8.118a3.882 3.882 0 100 7.764 3.882 3.882 0 000-7.764zm0 6.138a2.256 2.256 0 110-4.512 2.256 2.256 0 010 4.512zM16.811 6.31a.952.952 0 10-1.898-.002.952.952 0 001.898.002z"
                                    clip-rule="evenodd" />
                            </svg></a>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-800 pt-8 text-center text-sm text-gray-400">
                <p>&copy; 2025 KlinKlin Laundry. Dibuat dengan ❤️ untuk pakaian bersih Anda.</p>
            </div>
        </div>
    </footer>

    <!-- ===== BACK TO TOP BUTTON ===== -->
    <button id="back-to-top"
        class="fixed bottom-6 right-6 bg-indigo-600 text-white p-3 rounded-full shadow-lg hover:bg-indigo-700 transition-opacity opacity-0 hidden">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
        </svg>
    </button>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // --- 1. NAVBAR LOGIC ---
            const navbar = document.getElementById('navbar');
            const navbarContainer = document.getElementById('navbar-container');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');

            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('shadow-md');
                    navbarContainer.classList.remove('h-20');
                    navbarContainer.classList.add('h-16');
                } else {
                    navbar.classList.remove('shadow-md');
                    navbarContainer.classList.remove('h-16');
                    navbarContainer.classList.add('h-20');
                }
            });

            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });

            // --- 2. FADE-IN ON SCROLL ANIMATION ---
            const sections = document.querySelectorAll('.fade-in-section');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            sections.forEach(section => observer.observe(section));

            // --- 3. TESTIMONIAL CAROUSEL ---
            const testimonials = [
                {
                    quote: "Pelayanannya cepat banget! Pagi dijemput, sore sudah diantar lagi dalam keadaan super wangi. Recommended!",
                    name: "Sarah Widiastuti",
                    role: "Karyawan Swasta",
                    rating: 5
                },
                {
                    quote: "Hasil cuci jas saya di sini sangat memuaskan, bersih dan tidak merusak bahan. Harganya juga bersahabat. Pasti langganan.",
                    name: "Budi Santoso",
                    role: "Pengusaha",
                    rating: 5
                },
                {
                    quote: "Suka banget sama fitur antar-jemputnya, sangat membantu buat saya yang sibuk dan nggak sempat ke laundry. Thanks KlinKlin!",
                    name: "Rina Amelia",
                    role: "Ibu Rumah Tangga",
                    rating: 4
                }
            ];

            const slider = document.getElementById('testimonial-slider');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const carousel = document.getElementById('testimonial-carousel');
            let currentIndex = 0;
            let autoSlideInterval;

            function renderTestimonials() {
                slider.innerHTML = testimonials.map(t => `
                    <div class="w-full flex-shrink-0 px-2">
                        <div class="bg-gray-50 p-8 rounded-2xl text-center">
                            <p class="text-gray-600 italic">"${t.quote}"</p>
                            <div class="mt-6">
                                <div class="text-yellow-400 flex justify-center space-x-1">${'★'.repeat(t.rating)}${'☆'.repeat(5 - t.rating)}</div>
                                <p class="font-bold mt-2">${t.name}</p>
                                <p class="text-sm text-gray-500">${t.role}</p>
                            </div>
                        </div>
                    </div>
                `).join('');
            }

            function updateSlider() {
                slider.style.transform = `translateX(-${currentIndex * 100}%)`;
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % testimonials.length;
                updateSlider();
            }

            function startAutoSlide() {
                stopAutoSlide();
                autoSlideInterval = setInterval(nextSlide, 5000);
            }

            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }

            renderTestimonials();

            nextBtn.addEventListener('click', () => { nextSlide(); startAutoSlide(); });
            prevBtn.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
                updateSlider();
                startAutoSlide();
            });

            carousel.addEventListener('mouseenter', stopAutoSlide);
            carousel.addEventListener('mouseleave', startAutoSlide);
            startAutoSlide();

            // --- 4. BOOKING FORM (DUMMY SUBMIT) ---
            const bookingForm = document.getElementById('booking-form');
            const successMessage = document.getElementById('form-success-message');
            const errorMessage = document.getElementById('form-error-message');

            bookingForm.addEventListener('submit', (e) => {
                e.preventDefault();
                let isValid = true;
                successMessage.classList.add('hidden');
                errorMessage.classList.add('hidden');

                bookingForm.querySelectorAll('[required]').forEach(input => {
                    input.classList.remove('border-red-500');
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('border-red-500');
                    }
                });

                if (isValid) {
                    successMessage.classList.remove('hidden');
                    bookingForm.reset();
                    setTimeout(() => successMessage.classList.add('hidden'), 5000);
                } else {
                    errorMessage.classList.remove('hidden');
                }
            });

            // --- 5. BACK TO TOP BUTTON ---
            const backToTopButton = document.getElementById('back-to-top');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTopButton.classList.remove('hidden');
                    backToTopButton.classList.remove('opacity-0');
                } else {
                    backToTopButton.classList.add('opacity-0');
                    setTimeout(() => { if (window.scrollY <= 300) backToTopButton.classList.add('hidden') }, 300);
                }
            });
            backToTopButton.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // --- Set minimum date for date picker to today ---
            const datePicker = document.getElementById('pickup-date');
            if (datePicker) {
                const today = new Date().toISOString().split('T')[0];
                datePicker.setAttribute('min', today);
            }
        });

        // --- 6. ALPINE.JS DATA FOR PRICING CALCULATOR ---
        function pricingCalculator() {
            return {
                service: 'kiloan',
                quantity: 1,
                addons: {
                    express: false,
                    premiumFragrance: false,
                },
                prices: { kiloan: 8000, satuan: 35000, sepatu: 50000, express: 10000, premiumFragrance: 5000 },
                get quantityLabel() {
                    const labels = { kiloan: 'Berat (kg)', satuan: 'Jumlah (pcs)', sepatu: 'Jumlah (pasang)' };
                    return labels[this.service] || 'Jumlah';
                },
                get basePrice() { return (this.prices[this.service] || 0) * (this.quantity > 0 ? this.quantity : 0); },
                get expressFee() { return this.addons.express ? this.prices.express : 0; },
                get fragranceFee() { return this.addons.premiumFragrance ? this.prices.premiumFragrance : 0; },
                get totalPrice() { return this.basePrice + this.expressFee + this.fragranceFee; },
                formatCurrency(amount) {
                    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(amount);
                }
            }
        }
    </script>
</body>

</html>