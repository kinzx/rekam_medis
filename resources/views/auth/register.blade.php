<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - SehatSentosa</title>

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
                 class="absolute inset-0 w-full h-full object-cover opacity-60" alt="Medical Team">

            <div class="absolute inset-0 bg-gradient-to-br from-mint-500/80 to-slate-900/90 mix-blend-overlay"></div>

            <div class="relative z-10 text-white">
                <div class="mb-6">
                    <span class="bg-white/10 backdrop-blur-md border border-white/20 px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider text-mint-100">
                        🚀 Gabung Sekarang
                    </span>
                </div>
                <h2 class="text-4xl font-extrabold leading-tight mb-4">
                    Mulai Perjalanan <br> Sehatmu Disini.
                </h2>
                <p class="text-slate-300 text-lg font-medium leading-relaxed mb-8">
                    Buat akun dalam hitungan detik. Gratis, aman, dan terintegrasi dengan BPJS.
                </p>

                <div class="bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/10">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="flex -space-x-3">
                            <img class="w-10 h-10 rounded-full border-2 border-slate-800" src="https://i.pravatar.cc/100?img=1" alt="">
                            <img class="w-10 h-10 rounded-full border-2 border-slate-800" src="https://i.pravatar.cc/100?img=2" alt="">
                            <img class="w-10 h-10 rounded-full border-2 border-slate-800" src="https://i.pravatar.cc/100?img=3" alt="">
                            <div class="w-10 h-10 rounded-full border-2 border-slate-800 bg-mint-500 flex items-center justify-center text-xs font-bold text-white">+2k</div>
                        </div>
                        <div class="text-sm font-bold">Pengguna Baru</div>
                    </div>
                    <p class="text-xs text-slate-400">Telah bergabung minggu ini.</p>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center relative overflow-y-auto">
            <div class="mb-8">
                <a href="/" class="text-2xl font-extrabold tracking-tighter mb-6 inline-block">
                    MEDIS<span class="text-mint-500">Z</span>.
                </a>
                <h3 class="text-3xl font-bold text-slate-900 mb-2">Buat Akun Baru 🚀</h3>
                <p class="text-slate-500">Isi data diri untuk akses layanan kesehatan.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-bold text-slate-700 mb-1">Nama Lengkap</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                           class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 focus:ring-2 focus:ring-mint-500 focus:border-mint-500 transition-all font-medium placeholder-slate-400"
                           placeholder="John Doe">
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-neon-pink text-sm font-semibold" />
                </div>

                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700 mb-1">Email Address</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                           class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 focus:ring-2 focus:ring-mint-500 focus:border-mint-500 transition-all font-medium placeholder-slate-400"
                           placeholder="nama@email.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-neon-pink text-sm font-semibold" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-slate-700 mb-1">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                           class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 focus:ring-2 focus:ring-mint-500 focus:border-mint-500 transition-all font-medium placeholder-slate-400"
                           placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-neon-pink text-sm font-semibold" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-slate-700 mb-1">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                           class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 focus:ring-2 focus:ring-mint-500 focus:border-mint-500 transition-all font-medium placeholder-slate-400"
                           placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-neon-pink text-sm font-semibold" />
                </div>

                <div class="text-xs text-slate-400 leading-relaxed">
                    Dengan mendaftar, Anda menyetujui <a href="#" class="underline hover:text-mint-500">Syarat & Ketentuan</a> serta <a href="#" class="underline hover:text-mint-500">Kebijakan Privasi</a> kami.
                </div>

                <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 rounded-xl shadow-lg shadow-slate-900/20 hover:bg-slate-800 hover:-translate-y-1 transition-all duration-300">
                    Daftar Sekarang
                </button>

                <div class="text-center mt-6">
                    <p class="text-slate-500 text-sm font-medium">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-mint-500 font-bold hover:underline">Masuk disini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

</body>
</html>