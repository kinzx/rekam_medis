<x-app-layout>
    <div class="min-h-screen bg-mint-50 pt-32 pb-12 px-4 sm:px-6 lg:px-8 font-sans">

        <div class="max-w-7xl mx-auto mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900">
                    Halo, <span class="text-mint-600">{{ Auth::user()->name }}</span>! 👋
                </h1>
                <p class="text-slate-500 mt-2 font-medium">Mau melakukan pemeriksaan apa hari ini?</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-1 space-y-6">

                <div class="bg-slate-900 rounded-[2rem] p-8 text-white relative overflow-hidden shadow-xl group">
                    <div class="relative z-10">
                        <p class="text-slate-400 font-bold text-xs uppercase tracking-widest mb-1">Nomor Rekam Medis</p>

                        <h2 class="text-4xl font-extrabold text-white tracking-tight">
                            {{-- TAMPILKAN NO RM DARI DATABASE --}}
                            @if ($myQueue)
                                {{ $myQueue->no_rm }}
                            @else
                                -
                            @endif
                        </h2>

                        <div class="mt-6 flex gap-2">
                            @if ($myQueue)
                                <span
                                    class="bg-white/10 px-3 py-1 rounded-full text-xs font-bold border border-white/10">
                                    {{ $myQueue->poli_id }}
                                </span>
                                <span
                                    class="bg-mint-500/20 text-mint-400 px-3 py-1 rounded-full text-xs font-bold border border-mint-500/20">
                                    Aktif
                                </span>
                            @else
                                <span class="text-slate-500 text-sm">Belum ada antrean aktif</span>
                            @endif
                        </div>
                    </div>
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-mint-500 rounded-full blur-3xl opacity-20 translate-x-10 -translate-y-10 group-hover:opacity-30 transition-opacity duration-700">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-32 h-32 bg-neon-pink rounded-full blur-3xl opacity-20 -translate-x-10 translate-y-10 group-hover:opacity-30 transition-opacity duration-700">
                    </div>
                </div>

                @if (isset($myQueue) || Auth::user()->usertype == 'user')
                    <div
                        class="bg-white rounded-[1.5rem] p-6 shadow-sm border border-slate-100 relative overflow-hidden mt-6">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-mint-400 to-blue-500"></div>
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="font-bold text-slate-800 flex items-center gap-2">
                                <span class="relative flex h-3 w-3">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-mint-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-mint-500"></span>
                                </span>
                                Antrean {{ $myQueue->poli?->name ?? 'Poli Tidak Ditemukan' }}
                            </h4>
                        </div>

                        <div class="flex items-center justify-between bg-slate-50 rounded-xl p-4">
                            <div class="text-center">
                                <p class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mb-1">Sedang
                                    Dilayani</p>
                                <p class="text-3xl font-black text-slate-400">
                                    {{ $currentServing->queue_number ?? '--' }}
                                </p>
                            </div>
                            <div class="h-8 w-px bg-slate-200"></div>
                            <div class="text-center">
                                <p class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mb-1">Nomor Anda
                                </p>
                                <p class="text-3xl font-black text-slate-900">
                                    {{ $myQueue->queue_number }}
                                </p>
                            </div>
                        </div>
                        <p class="text-center text-xs text-slate-500 mt-3">
                            Estimasi: <span
                                class="font-bold text-slate-800">{{ $myQueue->estimated_time?->format('H:i') ?? '-' }}
                                WIB</span>
                        </p>
                    </div>
                @else
                    <div class="bg-white p-6 rounded-[1.5rem] mt-6 border border-dashed border-slate-300 text-center">
                        <p class="text-slate-400 text-sm">Anda belum mengambil antrean hari ini.</p>
                    </div>
                @endif

                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('riwayat.index') }}"
                        class="bg-white p-5 rounded-[1.5rem] shadow-sm hover:shadow-md transition-all hover:-translate-y-1 border border-transparent hover:border-mint-200 group flex flex-col items-center text-center">
                        <div
                            class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-3 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-slate-800 text-sm">Riwayat</h4>
                    </a>

                </div>

                @if (isset($upcomingSchedule) && $upcomingSchedule)
                    <div class="bg-indigo-50 rounded-[1.5rem] p-6 border border-indigo-100 mt-6">
                        <h4 class="font-bold text-indigo-900 text-sm mb-4">Jadwal Mendatang</h4>
                        <div class="flex gap-4 items-center bg-white p-3 rounded-xl shadow-sm">
                            <div
                                class="bg-indigo-100 text-indigo-600 w-12 h-12 rounded-lg flex flex-col items-center justify-center text-xs font-bold leading-none">
                                <span>{{ $upcomingSchedule->visit_date->format('M') }}</span>
                                <span class="text-lg">{{ $upcomingSchedule->visit_date->format('d') }}</span>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800 text-sm">{{ $upcomingSchedule->title }}</p>
                                <p class="text-xs text-slate-500">{{ $upcomingSchedule->doctor->name }}</p>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

            <div class="lg:col-span-2">
                <div
                    class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-xl shadow-mint-500/5 border border-slate-100 sticky top-24">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-extrabold text-slate-900">Daftar Berobat 📝</h2>
                            <p class="text-slate-500 text-sm">Isi formulir untuk mendapatkan nomor antrian.</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-mint-50 rounded-full flex items-center justify-center text-mint-600 animate-bounce">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <form action="{{ route('queue.store') }}" method="POST" class="space-y-6">
                        @csrf <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Poliklinik</label>
                                <div class="relative">
                                    <select name="poli_id" required
                                        class="w-full px-5 py-3 rounded-xl bg-slate-50 border-none focus:ring-2 focus:ring-mint-500 text-slate-900 font-medium appearance-none cursor-pointer">

                                        {{-- Opsi Default --}}
                                        <option value="" disabled selected>-- Pilih Poliklinik --</option>

                                        {{-- LOOPING DATA DARI CONTROLLER --}}
                                        {{-- Ini akan menampilkan SEMUA poli yang ada di DashboardController --}}
                                        @foreach ($polis as $poli)
                                            <option value="{{ $poli->id }}">{{ $poli->name }}</option>
                                        @endforeach

                                    </select>

                                    {{-- Ikon Panah (Opsional, biar cantik) --}}
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Dokter</label>
                                <div class="relative">
                                    <select name="doctor_id" required
                                        class="w-full px-5 py-3 rounded-xl bg-slate-50 border-none focus:ring-2 focus:ring-mint-500 text-slate-900 font-medium appearance-none cursor-pointer">
                                        <option value="" disabled selected>-- Pilih Dokter --</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Rencana Kunjungan</label>
                            <input type="date" name="visit_date" required min="{{ date('Y-m-d') }}"
                                class="w-full px-5 py-3 rounded-xl bg-slate-50 border-none focus:ring-2 focus:ring-mint-500 text-slate-900 font-medium cursor-pointer">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Keluhan Utama</label>
                            <textarea name="complaint" rows="3" required
                                class="w-full px-5 py-3 rounded-xl bg-slate-50 border-none focus:ring-2 focus:ring-mint-500 text-slate-900 font-medium placeholder-slate-400"
                                placeholder="Contoh: Demam tinggi sudah 3 hari..."></textarea>
                        </div>

                        <div class="pt-4 flex items-center justify-end gap-4 border-t border-slate-100 mt-6">
                            <button type="button"
                                class="text-slate-500 font-bold hover:text-red-500 text-sm transition-colors">
                                Reset Form
                            </button>
                            <button type="submit"
                                class="bg-slate-900 hover:bg-mint-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-mint-500/30 hover:shadow-mint-500/40 hover:-translate-y-1 transition-all flex items-center gap-2">
                                <span>Ambil Antrian</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
