<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SehatSentosa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: {
                        'mint': { 50: '#F0F9F8', 100: '#D6F0EC', 500: '#3ABFB2', 600: '#2D9F94' },
                        'neon-pink': '#FF4D8C',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased text-slate-900 bg-mint-50 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-6xl bg-white rounded-[2.5rem] shadow-2xl shadow-mint-500/10 overflow-hidden flex flex-col md:flex-row min-h-[700px]">

        <div class="hidden md:flex w-1/2 bg-slate-900 relative items-center justify-center p-12 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=2070&auto=format&fit=crop"
                 class="absolute inset-0 w-full h-full object-cover opacity-60" alt="Doctor">

            <div class="absolute inset-0 bg-gradient-to-t from-mint-500/90 to-mint-500/40 mix-blend-multiply"></div>

            <div class="relative z-10 text-white">
                <div class="mb-8">
                    <span class="bg-white/20 backdrop-blur-md border border-white/30 px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wider">
                        ✨ #1 Healthcare App
                    </span>
                </div>
                <h2 class="text-4xl font-extrabold leading-tight mb-4">
                    Kesehatanmu adalah <br> Prioritas Utama.
                </h2>
                <p class="text-mint-50 text-lg font-medium leading-relaxed">
                    Akses rekam medis, konsultasi dokter, dan tebus obat dalam satu genggaman.
                </p>

                <div class="mt-8 bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/20 flex items-center gap-4 max-w-sm">
                    <div class="bg-white p-2 rounded-full">
                        <svg class="w-6 h-6 text-mint-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="font-bold text-sm">Data Terenkripsi</p>
                        <p class="text-xs text-mint-50 opacity-80">Aman & Terpercaya</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-16 flex flex-col justify-center relative">
            <div class="absolute top-0 right-0 w-32 h-32 bg-mint-50 rounded-bl-[4rem] -z-10"></div>

            <div class="mb-10">
                <a href="/" class="text-2xl font-extrabold tracking-tighter mb-8 inline-block">
                    MEDIS<span class="text-mint-500">Z</span>.
                </a>
                <h3 class="text-3xl font-bold text-slate-900 mb-2">Welcome Back! 👋</h3>
                <p class="text-slate-500">Silakan masuk untuk mengelola data kesehatan.</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                           class="w-full px-5 py-4 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 focus:ring-2 focus:ring-mint-500 focus:border-mint-500 transition-all font-medium placeholder-slate-400"
                           placeholder="nama@email.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-neon-pink text-sm font-semibold" />
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-bold text-slate-700">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-bold text-mint-500 hover:text-mint-600 transition-colors">
                                Lupa Password?
                            </a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="w-full px-5 py-4 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 focus:ring-2 focus:ring-mint-500 focus:border-mint-500 transition-all font-medium placeholder-slate-400"
                           placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-neon-pink text-sm font-semibold" />
                </div>

                <div class="block">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" class="rounded-lg border-slate-300 text-mint-500 shadow-sm focus:ring-mint-500 w-5 h-5" name="remember">
                        <span class="ms-3 text-sm text-slate-600 font-medium group-hover:text-mint-500 transition-colors">Ingat saya di perangkat ini</span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 rounded-xl shadow-lg shadow-slate-900/20 hover:bg-slate-800 hover:-translate-y-1 transition-all duration-300">
                    Masuk Sekarang
                </button>

                <div class="text-center mt-6">
                    <p class="text-slate-500 text-sm font-medium">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-mint-500 font-bold hover:underline">Daftar disini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
