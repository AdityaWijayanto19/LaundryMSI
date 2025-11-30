<x-guest-layout>
    <div class="flex flex-col items-center mb-6">
        <img src="{{ asset('images/logo.png') }}" class="w-16 h-16 mb-2 rounded-xl shadow-lg">

        <!-- Judul Ramah -->
        <h2 class="text-2xl font-bold text-blue-900">Selamat Datang</h2>
        <p class="text-slate-500 text-sm">Silakan masuk untuk mengelola laundry.</p>
    </div>

    <div class="bg-white p-2 rounded-2xl">
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-bold text-slate-700 mb-1">Email / Akun</label>
                <input id="email"
                    class="block w-full px-4 py-3 rounded-xl border-slate-300 bg-slate-50 text-slate-900 focus:border-blue-500 focus:ring-blue-500 shadow-sm transition"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    placeholder="Masukkan email..." />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-bold text-slate-700 mb-1">Password / Kata Sandi</label>
                <input id="password"
                    class="block w-full px-4 py-3 rounded-xl border-slate-300 bg-slate-50 text-slate-900 focus:border-blue-500 focus:ring-blue-500 shadow-sm transition"
                    type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 w-5 h-5"
                        name="remember">
                    <span class="ms-2 text-sm text-slate-600 font-medium">{{ __('Ingat Saya') }}</span>
                </label>
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="w-full justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all transform hover:-translate-y-0.5">
                    {{ __('Masuk Aplikasi') }}
                </button>
            </div>

            @if (Route::has('password.request'))
                <div class="text-center mt-4">
                    <a class="underline text-xs text-slate-400 hover:text-blue-600" href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</x-guest-layout>