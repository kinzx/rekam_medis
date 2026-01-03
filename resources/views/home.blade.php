<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis Gen-Z - Platform Kesehatan Modern</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        'mint': {
                            50: '#F0F9F8',
                            100: '#D6F0EC',
                            500: '#3ABFB2',
                            900: '#1D4541',
                        },
                        'neon-pink': '#FF4D8C',
                        'soft-peach': '#FFF4E8',
                        'soft-pink': '#FFEBF2',
                    },
                    borderRadius: {
                        '4xl': '2.5rem',
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom styles agar Swiper tidak merusak layout grid */
        .swiper {
            width: 100%;
            height: 100%;
            padding: 10px;
            /* Memberi ruang untuk shadow card */
        }

        .swiper-slide {
            height: auto;
            /* Agar tinggi card fleksibel */
            display: flex;
            align-items: center;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .text-stroke {
            -webkit-text-stroke: 1px black;
            color: transparent;
        }
    </style>
</head>

<body class="font-sans antialiased text-slate-900 bg-mint-50 selection:bg-mint-500 selection:text-white">

    <nav class="fixed w-full z-50 transition-all duration-300 pt-6 px-4">
        <div
            class="max-w-7xl mx-auto bg-white/70 backdrop-blur-lg border border-white/50 rounded-full px-6 py-4 shadow-sm flex justify-between items-center">
            <div class="flex items-center gap-2">
                <span class="font-extrabold text-2xl tracking-tighter">MEDIS<span class="text-mint-500">Z</span>.</span>
            </div>

            <div class="hidden md:flex items-center gap-8 font-semibold text-sm">
                <a href="#" class="hover:text-mint-500 transition-colors">Home</a>
                <a href="#" class="hover:text-mint-500 transition-colors">Layanan</a>
                <a href="#" class="hover:text-mint-500 transition-colors">Dokter</a>
            </div>

            <div class="hidden md:flex items-center gap-4">
                <a href="{{ route('login') }}" class="font-bold text-sm hover:text-mint-500">Masuk</a>
                <a href="{{ route(name: 'register') }}"
                    class="bg-slate-900 text-white px-6 py-2.5 rounded-full font-bold text-sm hover:bg-slate-800 transition-all hover:scale-105">
                    Daftar Sekarang
                </a>
            </div>

            <button class="md:hidden text-slate-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>
    </nav>

    <section class="pt-32 pb-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                <div
                    class="lg:col-span-5 bg-white rounded-4xl p-8 lg:p-12 shadow-xl shadow-slate-200/40 relative overflow-hidden flex flex-col justify-center">
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-mint-100 rounded-full blur-3xl opacity-50"></div>

                    <h1 class="text-5xl lg:text-6xl font-extrabold leading-[1.1] mb-6 relative z-10">
                        World's best <br>
                        <span class="relative inline-block">
                            No.1
                            <svg class="absolute -top-2 -right-4 w-8 h-8 text-neon-pink" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg>
                        </span> hospital <br>
                        support in a <br>
                        platform.
                    </h1>

                    <p class="text-slate-500 font-medium mb-8 max-w-sm">
                        Platform rekam medis digital anti ribet. Kelola kesehatanmu semudah scroll social media.
                    </p>

                    <div class="flex flex-wrap items-center gap-4">
                        <a href="#"
                            class="bg-slate-900 text-white px-8 py-4 rounded-2xl font-bold hover:bg-slate-800 transition-all hover:-translate-y-1 shadow-lg shadow-slate-900/20">
                            Mulai Gratis
                        </a>
                        <a href="#"
                            class="flex items-center gap-2 font-bold px-6 py-4 rounded-2xl border border-slate-200 hover:bg-slate-50 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Demo
                        </a>
                    </div>

                    <svg class="absolute bottom-8 right-8 w-24 h-24 text-slate-300 hidden md:block"
                        viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M10,50 Q50,90 90,50" stroke-dasharray="5,5" />
                        <path d="M80,40 L90,50 L80,60" />
                    </svg>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div
                        class="md:col-span-2 bg-white rounded-4xl p-8 relative overflow-hidden flex flex-col md:flex-row items-center gap-8">
                        <div class="flex-1 z-10">
                            <h3 class="text-2xl font-bold mb-6">Apa keluhanmu hari ini?</h3>
                            <div class="flex flex-wrap gap-3">
                                <span
                                    class="bg-slate-900 text-white px-4 py-2 rounded-xl text-sm font-semibold shadow-lg">Sakit
                                    Kepala</span>
                                <span
                                    class="bg-white border border-slate-200 px-4 py-2 rounded-xl text-sm font-semibold">Demam</span>
                                <span
                                    class="bg-white border border-slate-200 px-4 py-2 rounded-xl text-sm font-semibold">Flu</span>
                                <span
                                    class="bg-white border border-slate-200 px-4 py-2 rounded-xl text-sm font-semibold">Gigi</span>
                            </div>
                            <a href="#"
                                class="inline-flex items-center gap-2 mt-8 font-bold text-sm hover:gap-3 transition-all">
                                Lihat Detail
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="relative w-full md:w-1/2 h-64 md:h-full flex items-end justify-center">
                            <div class="absolute inset-0 bg-mint-100 rounded-3xl rotate-3"></div>
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?q=80&w=2070&auto=format&fit=crop"
                                class="relative z-10 h-full object-cover rounded-2xl" alt="Doctor">
                            <div
                                class="absolute bottom-4 left-4 z-20 bg-white/90 backdrop-blur p-3 rounded-xl shadow-lg border border-white/50">
                                <div class="flex items-center gap-3">
                                    <div class="flex -space-x-2">
                                        <div class="w-8 h-8 rounded-full bg-blue-500 border-2 border-white"></div>
                                        <div class="w-8 h-8 rounded-full bg-pink-500 border-2 border-white"></div>
                                        <div class="w-8 h-8 rounded-full bg-yellow-500 border-2 border-white"></div>
                                    </div>
                                    <span class="text-xs font-bold">Expert Team</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-soft-peach rounded-4xl p-8 flex flex-col justify-between group hover:scale-[1.02] transition-transform">
                        <div class="flex justify-between items-start">
                            <span
                                class="bg-white px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider">Dokter</span>
                            <div
                                class="w-10 h-10 bg-white rounded-full flex items-center justify-center transform group-hover:rotate-45 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Paling Berpengalaman & Terlatih</h3>
                            <p class="text-slate-500 text-sm">Dokter spesialis siap membantu 24/7 dengan diagnosa
                                tepat.</p>
                        </div>
                    </div>

                    <div
                        class="bg-soft-pink rounded-4xl p-8 flex flex-col justify-between group hover:scale-[1.02] transition-transform">
                        <div>
                            <h4 class="font-bold text-slate-700 mb-2">Akurasi Hasil</h4>
                            <div class="text-6xl font-extrabold text-slate-900 tracking-tighter">99<span
                                    class="text-4xl text-neon-pink">%</span></div>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm font-semibold text-slate-600">Terverifikasi</span>
                            <svg class="w-6 h-6 text-neon-pink" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Layanan kami membuatmu <span
                        class="relative inline-block px-2">PD <div
                            class="absolute inset-0 bg-yellow-200 -z-10 skew-y-2 rounded-lg"></div></span></h2>
                <p class="text-slate-500 max-w-xl mx-auto">Tidak perlu antri lama. Semua data medis aman dan bisa
                    diakses kapanpun.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-white rounded-[2rem] p-8 text-center hover:shadow-xl hover:shadow-mint-500/10 transition-all border border-transparent hover:border-mint-200">
                    <div
                        class="w-20 h-20 mx-auto bg-blue-50 rounded-full flex items-center justify-center mb-6 text-3xl">
                        💉
                    </div>
                    <h3 class="text-xl font-bold mb-3">Pengobatan Cepat</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Booking dokter tanpa antri, langsung dapat resep
                        digital dan obat diantar.</p>
                    <button
                        class="mt-6 w-10 h-10 rounded-full border border-slate-200 inline-flex items-center justify-center hover:bg-slate-900 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>

                <div
                    class="bg-white rounded-[2rem] p-8 text-center hover:shadow-xl hover:shadow-mint-500/10 transition-all border border-transparent hover:border-mint-200">
                    <div
                        class="w-20 h-20 mx-auto bg-green-50 rounded-full flex items-center justify-center mb-6 text-3xl">
                        🏥
                    </div>
                    <h3 class="text-xl font-bold mb-3">Layanan 24/7</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Konsultasi dokter kapan saja, dimana saja. IGD
                        digital siap siaga.</p>
                    <button
                        class="mt-6 w-10 h-10 rounded-full border border-slate-200 inline-flex items-center justify-center hover:bg-slate-900 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>

                <div
                    class="bg-white rounded-[2rem] p-8 text-center hover:shadow-xl hover:shadow-mint-500/10 transition-all border border-transparent hover:border-mint-200">
                    <div
                        class="w-20 h-20 mx-auto bg-purple-50 rounded-full flex items-center justify-center mb-6 text-3xl">
                        👶
                    </div>
                    <h3 class="text-xl font-bold mb-3">Poli Anak & Dewasa</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Layanan spesialis lengkap untuk seluruh anggota
                        keluarga tercinta.</p>
                    <button
                        class="mt-6 w-10 h-10 rounded-full border border-slate-200 inline-flex items-center justify-center hover:bg-slate-900 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 px-4 bg-white/50">
        <div class="max-w-7xl mx-auto bg-mint-100 rounded-[3rem] p-10 md:p-20 relative overflow-hidden">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center relative z-10">

                <div>
                    <h2 class="text-3xl md:text-5xl font-extrabold mb-6 text-slate-900">Kata mereka tentang kami 💬
                    </h2>
                    <p class="text-slate-500 mb-8 max-w-sm">Dengarkan pengalaman nyata dari pasien yang telah
                        menggunakan layanan kami.</p>

                    <div class="flex gap-4 mb-8">
                        <button id="prevBtn"
                            class="w-14 h-14 rounded-full bg-white flex items-center justify-center hover:bg-slate-900 hover:text-white transition-all hover:scale-110 shadow-sm border border-slate-100 group">
                            <svg class="w-6 h-6 group-hover:-translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <button id="nextBtn"
                            class="w-14 h-14 rounded-full bg-slate-900 text-white flex items-center justify-center hover:bg-slate-700 transition-all hover:scale-110 shadow-lg shadow-slate-900/20 group">
                            <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="w-full relative min-w-0">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div
                                    class="bg-white p-8 rounded-[2rem] shadow-xl shadow-mint-500/10 w-full border border-white/50">
                                    <div class="flex items-center gap-4 mb-6">
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=150&auto=format&fit=crop"
                                            class="w-14 h-14 rounded-full object-cover border-4 border-mint-50"
                                            alt="User">
                                        <div>
                                            <h4 class="font-bold text-lg text-slate-900">Jenniya Karter</h4>
                                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">
                                                Mahasiswi, 21th</p>
                                        </div>
                                        <div class="ml-auto text-yellow-400 flex text-lg">★★★★★</div>
                                    </div>
                                    <p class="text-slate-600 font-medium leading-relaxed italic">
                                        "Gila sih, aplikasi ini ngebantu banget pas aku kena tipes kemarin. Ga perlu
                                        antri di RS, obat langsung nyampe kosan. 10/10 recommended!"
                                    </p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div
                                    class="bg-white p-8 rounded-[2rem] shadow-xl shadow-mint-500/10 w-full border border-white/50">
                                    <div class="flex items-center gap-4 mb-6">
                                        <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?q=80&w=150&auto=format&fit=crop"
                                            class="w-14 h-14 rounded-full object-cover border-4 border-mint-50"
                                            alt="User">
                                        <div>
                                            <h4 class="font-bold text-lg text-slate-900">Budi Santoso</h4>
                                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">
                                                Wiraswasta, 35th</p>
                                        </div>
                                        <div class="ml-auto text-yellow-400 flex text-lg">★★★★★</div>
                                    </div>
                                    <p class="text-slate-600 font-medium leading-relaxed italic">
                                        "Fitur booking dokternya juara. Akurat banget jamnya, saya datang langsung masuk
                                        ruangan. Sangat efisien buat orang sibuk."
                                    </p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div
                                    class="bg-white p-8 rounded-[2rem] shadow-xl shadow-mint-500/10 w-full border border-white/50">
                                    <div class="flex items-center gap-4 mb-6">
                                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=150&auto=format&fit=crop"
                                            class="w-14 h-14 rounded-full object-cover border-4 border-mint-50"
                                            alt="User">
                                        <div>
                                            <h4 class="font-bold text-lg text-slate-900">Sarah Wijaya</h4>
                                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Ibu
                                                Rumah Tangga</p>
                                        </div>
                                        <div class="ml-auto text-yellow-400 flex text-lg">★★★★☆</div>
                                    </div>
                                    <p class="text-slate-600 font-medium leading-relaxed italic">
                                        "Konsultasi anak demam tengah malam jadi tenang karena ada dokter jaga 24 jam.
                                        Responnya cepat dan ramah banget."
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="absolute -right-20 -top-20 w-80 h-80 bg-mint-300 rounded-full blur-3xl opacity-30"></div>
            <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-pink-300 rounded-full blur-3xl opacity-30"></div>
        </div>
    </section>

    <footer class="py-12 border-t border-slate-100 bg-white">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <span class="font-extrabold text-xl tracking-tighter">MEDIS<span
                        class="text-mint-500">Z</span>.</span>
            </div>

            <div class="flex gap-8 text-sm font-semibold text-slate-500">
                <a href="#" class="hover:text-slate-900">Home</a>
                <a href="#" class="hover:text-slate-900">About Us</a>
                <a href="#" class="hover:text-slate-900">Feature</a>
                <a href="#" class="hover:text-slate-900">Treatment</a>
            </div>

            <div class="flex gap-4">
                <a href="#"
                    class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-slate-900 hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                    </svg>
                </a>
                <a href="#"
                    class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-slate-900 hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                </a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            effect: "creative",
            creativeEffect: {
                prev: {
                    shadow: true,
                    translate: [0, 0, -400],
                },
                next: {
                    // PERBAIKAN DISINI:
                    // Ubah dari "100%" menjadi "120%" agar slide selanjutnya terdorong lebih jauh
                    // dan tidak terlihat mengintip di pinggir.
                    translate: ["120%", 0, 0],
                },
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: "#nextBtn",
                prevEl: "#prevBtn",
            },
        });
    </script>
</body>

</html>
