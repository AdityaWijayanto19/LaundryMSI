<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utama Laundry - Dashboard</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts & Styles via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans text-slate-800 antialiased selection:bg-brand-500 selection:text-white" x-data="{ sidebarOpen: false }">

    <!-- Mobile Header -->
    <div class="md:hidden flex items-center justify-between bg-white/80 backdrop-blur-md border-b border-slate-200 p-4 sticky top-0 z-30">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" class="h-8 w-auto" alt="Logo">
            <span class="font-bold text-slate-800 tracking-tight">Utama Laundry</span>
        </div>
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 text-slate-500 rounded-lg hover:bg-slate-100">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
    </div>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Navigation -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-40 w-72 bg-white border-r border-slate-200 shadow-xl transition-transform duration-300 md:static md:translate-x-0 md:shadow-none flex flex-col">
            <div class="flex items-center justify-center h-24 border-b border-slate-100">
                <div class="text-center">
                    <img src="{{ asset('images/logo.png') }}" class="h-12 w-auto mx-auto mb-2" alt="Logo">
                    <h1 class="text-lg font-bold text-slate-900 leading-none">Utama Laundry</h1>
                </div>
            </div>
            
            <div class="p-4 flex-1 overflow-y-auto no-scrollbar">
                <p class="px-4 text-xs font-bold text-slate-400 uppercase tracking-widest mb-4 mt-2">Menu</p>
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3.5 {{ request()->routeIs('admin.dashboard') ? 'bg-brand-50 text-brand-600' : 'text-slate-600 hover:bg-slate-50 hover:text-brand-600' }} rounded-2xl font-medium transition-all group">
                        <svg class="w-5 h-5 mr-3 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>
                    <a href="#" class="flex items-center px-4 py-3.5 text-slate-600 hover:bg-slate-50 hover:text-brand-600 rounded-2xl font-medium transition-all group">
                        <svg class="w-5 h-5 mr-3 group-hover:text-brand-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Pesanan
                        <span class="ml-auto bg-brand-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-lg shadow-brand-500/30">Baru</span>
                    </a>
                </nav>
            </div>
            
            <!-- User Profile -->
            <div class="p-4 border-t border-slate-100">
                <button class="flex items-center gap-3 w-full p-2 hover:bg-slate-50 rounded-xl transition-colors text-left">
                    <div class="w-10 h-10 rounded-full bg-brand-100 flex items-center justify-center text-brand-600 font-bold">A</div>
                    <div>
                        <p class="text-sm font-bold text-slate-800">Admin</p>
                        <p class="text-xs text-slate-500">Keluar</p>
                    </div>
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col h-screen overflow-hidden bg-slate-50 relative">
            <!-- Header Desktop -->
            <header class="hidden md:flex items-center justify-between h-20 px-8 bg-white/50 backdrop-blur-sm sticky top-0 z-20 border-b border-slate-100">
                <h2 class="text-xl font-bold text-slate-800">Overview</h2>
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <input type="text" class="pl-10 pr-4 py-2 rounded-full bg-white border border-slate-200 focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 text-sm w-64 transition-all" placeholder="Cari data...">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
            </header>

            <!-- Scrollable Content -->
            <div class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-8">
                @yield('content')
            </div>
        </main>
        
        <!-- Overlay -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-slate-900/40 backdrop-blur-sm md:hidden" x-transition.opacity></div>
    </div>
</body>
</html>