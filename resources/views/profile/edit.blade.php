<x-app-layout>
    <!-- CSS Override: Agar Input bawaan Breeze jadi bulat & biru tanpa edit file partial -->
    <style>
        /* Target Input Text, Email, Password */
        .profile-section input[type="text"], 
        .profile-section input[type="email"], 
        .profile-section input[type="password"] {
            border-radius: 0.75rem; /* rounded-xl */
            border-color: #cbd5e1; /* slate-300 */
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            width: 100%;
        }
        .profile-section input:focus {
            border-color: #2563eb; /* blue-600 */
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }
        /* Target Label */
        .profile-section label {
            font-weight: 700;
            color: #334155; /* slate-700 */
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
            display: block;
        }
        /* Target Tombol Save (Primary Button) */
        .profile-section button[type="submit"], 
        .profile-section .inline-flex.items-center.px-4.py-2.bg-gray-800 {
            background-color: #2563eb !important; /* blue-600 */
            border-radius: 0.75rem !important;
            padding: 0.75rem 1.5rem !important;
            font-weight: 700 !important;
            text-transform: none !important; /* Jangan uppercase semua */
            font-size: 0.9rem !important;
            transition: all 0.2s;
        }
        .profile-section button[type="submit"]:hover {
            background-color: #1d4ed8 !important; /* blue-700 */
            transform: translateY(-2px);
        }
        /* Target Header Section (h2) */
        .profile-section h2 {
            font-size: 1.25rem; /* text-xl */
            font-weight: 800;
            color: #1e293b; /* slate-800 */
            margin-bottom: 0.5rem;
        }
        .profile-section p {
            color: #64748b; /* slate-500 */
            font-size: 0.875rem;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-extrabold text-xl text-slate-800 leading-tight flex items-center gap-2">
            <span class="bg-blue-100 text-blue-600 p-2 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </span>
            {{ __('Pengaturan Akun') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- SECTION 1: UPDATE PROFILE -->
            <div class="profile-section bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-slate-100 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1.5 h-full bg-blue-500"></div>
                <div class="flex items-start gap-4 mb-6">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Informasi Profil</h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Perbarui nama akun dan alamat email admin laundry Anda.
                        </p>
                    </div>
                </div>
                
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- SECTION 2: UPDATE PASSWORD -->
            <div class="profile-section bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-slate-100 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1.5 h-full bg-orange-400"></div>
                <div class="flex items-start gap-4 mb-6">
                    <div class="p-3 bg-orange-50 text-orange-500 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Ganti Password</h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Pastikan menggunakan password yang aman agar data laundry tetap terjaga.
                        </p>
                    </div>
                </div>

                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- SECTION 3: DELETE ACCOUNT -->
            <div class="profile-section bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-slate-100 relative overflow-hidden opacity-90 hover:opacity-100 transition">
                <div class="absolute top-0 left-0 w-1.5 h-full bg-red-500"></div>
                <div class="flex items-start gap-4 mb-6">
                    <div class="p-3 bg-red-50 text-red-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Hapus Akun</h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Hati-hati, tindakan ini akan menghapus akun admin secara permanen.
                        </p>
                    </div>
                </div>

                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>