<x-app-layout>
    <div class="min-h-screen bg-mint-50 py-12 px-4 sm:px-6 lg:px-8 font-sans">

        <div class="max-w-7xl mx-auto mb-10">
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900">
                Halo, <span class="text-mint-600">{{ Auth::user()->name }}</span>! 👋
            </h1>
            <p class="text-slate-500 mt-2 font-medium">Mau melakukan pemeriksaan apa hari ini?</p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-slate-900 rounded-[2rem] p-8 text-white relative overflow-hidden shadow-xl">
                    <div class="relative z-10">
                        <p class="text-slate-400 text-sm font-medium mb-1">Nomor Rekam Medis</p>
                        <h3 class="text-3xl font-bold tracking-wider mb-6">RM-2026-0892</h3>
                        <div class="flex gap-3">
                            <span
                                class="bg-white/10 px-3 py-1 rounded-full text-xs font-bold border border-white/10">Pasien
                                Umum</span>
                            <span
                                class="bg-mint-500/20 text-mint-300 px-3 py-1 rounded-full text-xs font-bold border border-mint-500/20">Aktif</span>
                        </div>
                    </div>
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-mint-500 rounded-full blur-3xl opacity-20 translate-x-10 -translate-y-10">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-32 h-32 bg-neon-pink rounded-full blur-3xl opacity-20 -translate-x-10 translate-y-10">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <a href="#"
                        class="bg-white p-6 rounded-[1.5rem] shadow-sm hover:shadow-md transition-all hover:-translate-y-1 border border-transparent hover:border-mint-200 group">
                        <div
                            class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-3 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-slate-800 text-sm">Riwayat</h4>
                    </a>
                    <a href="#"
                        class="bg-white p-6 rounded-[1.5rem] shadow-sm hover:shadow-md transition-all hover:-translate-y-1 border border-transparent hover:border-mint-200 group">
                        <div
                            class="w-10 h-10 bg-pink-50 text-pink-600 rounded-full flex items-center justify-center mb-3 group-hover:bg-pink-600 group-hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-slate-800 text-sm">Resep</h4>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-xl shadow-mint-500/5 border border-slate-100">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-extrabold text-slate-900">Daftar Berobat 📝</h2>
                            <p class="text-slate-500 text-sm">Isi formulir untuk mendapatkan nomor antrian.</p>
                        </div>
                        <div class="w-12 h-12 bg-mint-50 rounded-full flex items-center justify-center text-mint-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <form action="#" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Poliklinik</label>
                                <div class="relative">
                                    <select
                                        class="w-full px-5 py-3 rounded-xl bg-slate-50 border-none focus:ring-2 focus:ring-mint-500 text-slate-900 font-medium appearance-none">
                                        <option>Poli Umum</option>
                                        <option>Poli Gigi</option>
                                        <option>Poli Anak</option>
                                        <option>Poli Kandungan</option>
                                    </select>
                                    <div class="absolute right-4 top-3.5 pointer-events-none text-slate-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Dokter</label>
                                <div class="relative">
                                    <select
                                        class="w-full px-5 py-3 rounded-xl bg-slate-50 border-none focus:ring-2 focus:ring-mint-500 text-slate-900 font-medium appearance-none">
                                        <option>dr. Budi Santoso, Sp.PD</option>
                                        <option>dr. Sarah Wijaya</option>
                                        <option>drg. Andi Pratama</option>
                                    </select>
                                    <div class="absolute right-4 top-3.5 pointer-events-none text-slate-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Rencana Kunjungan</label>
                            <input type="date"
                                class="w-full px-5 py-3 rounded-xl bg-slate-50 border-none focus:ring-2 focus:ring-mint-500 text-slate-900 font-medium">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Keluhan Utama</label>
                            <textarea rows="3"
                                class="w-full px-5 py-3 rounded-xl bg-slate-50 border-none focus:ring-2 focus:ring-mint-500 text-slate-900 font-medium placeholder-slate-400"
                                placeholder="Contoh: Demam tinggi sudah 3 hari, disertai pusing..."></textarea>
                        </div>

                        <div class="pt-4 flex items-center justify-end gap-4">
                            <button type="button"
                                class="text-slate-500 font-bold hover:text-slate-800 text-sm">Batal</button>
                            <button type="submit"
                                class="bg-mint-500 hover:bg-mint-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-mint-500/30 hover:shadow-mint-500/40 hover:-translate-y-1 transition-all">
                                Ambil Antrian
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
