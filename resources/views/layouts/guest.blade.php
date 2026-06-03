<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Masuk · ' . config('app.name', 'Pinjam.in'))</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
        </style>
        @stack('styles')
    </head>
    <body class="font-sans text-gray-200 antialiased">
        <div class="min-h-screen lg:flex">
            <div class="relative hidden lg:block lg:w-1/2 bg-gray-950">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 to-gray-950"></div>
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiM5NDlmZmYiIGZpbGwtb3BhY2l0eT0iLjA5Ij48cGF0aCBkPSJNMzYgMzRjMC0yLjIwOS0xLjc5MS00LTQtNHMtNCAxLjc5MS00IDQgMS43OTEgNCA0IDQgNC0xLjc5MSA0LTR6bS0yIDBjLTIuMjY5IDAtNC0xLjUzMS00LTRzMS41MzEtNCA0LTQgNCAxLjUzMSA0IDQtMS41MzEgNC00IDR6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-100"></div>
                <div class="relative z-10 flex h-full flex-col justify-between p-12 text-white">
                    <div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <span class="text-2xl font-bold tracking-tight">Pinjam<span class="text-indigo-300">.in</span></span>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-4xl font-bold leading-tight">Inventaris Terkendali,<br>Peminjaman Lebih Mudah.</h2>
                        <p class="mt-4 text-indigo-200 max-w-md leading-relaxed">Kelola peminjaman alat, pantau stok, dan lacak riwayat penggunaan secara digital dalam satu sistem terpadu.</p>
                    </div>
                    <p class="text-sm text-gray-400">&copy; {{ date('Y') }} Pinjam.in — Aplikasi Peminjaman Alat</p>
                </div>
            </div>

            <div class="flex-1 flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8 bg-gray-950">
                <div class="w-full max-w-md">
                    <div class="lg:hidden flex items-center justify-center gap-2 mb-8">
                        <div class="w-9 h-9 rounded-lg bg-indigo-600 flex items-center justify-center shadow-md">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-100">Pinjam<span class="text-indigo-400">.in</span></span>
                    </div>
                    <div class="text-center mb-8">
                        <h1 class="text-2xl font-bold text-white">Selamat Datang Kembali</h1>
                        <p class="text-sm text-gray-400 mt-1">Masuk ke akun Anda untuk mengelola peminjaman.</p>
                    </div>
                    {{-- Session Status --}}
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="!text-gray-300" />
                            <x-text-input id="email" class="block mt-1.5 w-full rounded-lg border-gray-700 bg-gray-900 py-2.5 px-3.5 text-sm text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
                        </div>
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="!text-gray-300" />
                            <x-text-input id="password" class="block mt-1.5 w-full rounded-lg border-gray-700 bg-gray-900 py-2.5 px-3.5 text-sm text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
                        </div>
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-600 bg-gray-800 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ms-2 text-sm text-gray-400">Ingat saya</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm font-medium text-indigo-400 hover:text-indigo-300 underline-offset-2 hover:underline transition">
                                    Lupa password?
                                </a>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-950 transition">
                                Masuk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
