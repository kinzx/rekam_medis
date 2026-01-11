<x-app-layout>
    <div class="min-h-screen bg-mint-50 pt-32 pb-12 px-4 sm:px-6 lg:px-8 font-sans">

        {{-- HEADER --}}
        <div class="max-w-7xl mx-auto mb-8 flex flex-col md:flex-row justify-between items-end gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900">
                    Halo, <span class="text-mint-600">Dr. {{ Auth::user()->name }}</span> 🩺
                </h1>
                <p class="text-slate-500 font-medium mt-1">Siap melayani pasien hari ini?</p>
            </div>
            <div
                class="bg-white px-4 py-2 rounded-xl shadow-sm border border-slate-100 text-sm font-bold text-slate-600">
                📅 {{ now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- KOLOM KIRI: PASIEN SEDANG DIPERIKSA --}}
            <div class="lg:col-span-2">
                @if ($currentPatient)
                    <div
                        class="bg-white rounded-[2.5rem] shadow-xl shadow-mint-500/5 border border-slate-100 relative overflow-hidden flex flex-col h-full">

                        {{-- HEADER: IDENTITAS PASIEN --}}
                        <div class="bg-gradient-to-r from-mint-50 to-white p-8 border-b border-mint-100">
                            <div class="flex flex-col md:flex-row gap-6 items-center md:items-start">

                                {{-- Avatar & Nomor Antrean --}}
                                <div class="relative shrink-0">
                                    <div
                                        class="w-24 h-24 rounded-2xl bg-white text-mint-600 flex items-center justify-center text-4xl font-black border-2 border-mint-100 shadow-sm">
                                        {{ substr($currentPatient->user->name, 0, 1) }}
                                    </div>
                                    <div
                                        class="absolute -bottom-3 -right-3 bg-slate-800 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg border-2 border-white">
                                        {{ $currentPatient->queue_number }}
                                    </div>
                                </div>

                                {{-- Detail Teks --}}
                                <div class="flex-1 text-center md:text-left space-y-2">
                                    <div class="flex flex-col md:flex-row md:items-center gap-2 mb-1">
                                        <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">
                                            {{ $currentPatient->user->name }}
                                        </h2>
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 w-fit mx-auto md:mx-0">
                                            {{ $currentPatient->poli_id ?? 'Poli Umum' }}
                                        </span>
                                    </div>

                                    <div
                                        class="flex items-center justify-center md:justify-start gap-4 text-sm text-slate-500 font-medium">
                                        <div class="flex items-center gap-1.5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            {{ \Carbon\Carbon::parse($currentPatient->created_at)->format('d M Y, H:i') }}
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                            Pasien Umum
                                        </div>
                                    </div>
                                </div>

                                {{-- Badge Status --}}
                                <div class="hidden md:block">
                                    <span
                                        class="flex items-center gap-2 px-4 py-2 rounded-xl bg-green-100 text-green-700 font-bold text-xs uppercase tracking-wide">
                                        <span class="relative flex h-3 w-3">
                                            <span
                                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                                        </span>
                                        Sedang Diperiksa
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- BODY: AREA KLINIS --}}
                        <div class="p-8 flex-1 flex flex-col">

                            {{-- Section Keluhan --}}
                            <div class="mb-8">
                                <label
                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3 block">Keluhan
                                    Pasien</label>
                                <div class="bg-amber-50 rounded-2xl p-5 border border-amber-100 relative">
                                    <svg class="w-8 h-8 text-amber-200 absolute -top-3 -left-2 bg-white rounded-full p-1 border border-amber-100"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14.017 21L14.017 18C14.017 16.8954 13.1216 16 12.017 16H9C9 14.8954 9.89543 14 11 14C13.3333 14 15.5 11.5 15.5 8.5C15.5 5.5 14 3 11 3C7.5 3 5.5 6 5.5 9C5.5 10.132 5.81708 11.1643 6.3323 12M19 8C19 6.5 18 4.5 17 4C14.5 4 13 6.5 13 8.5C13 11 14.5 12.5 16 13M19 8C19.8284 8 20.5 8.67157 20.5 9.5C20.5 10.3284 19.8284 11 19 11C18.1716 11 17.5 10.3284 17.5 9.5C17.5 8.67157 18.1716 8 19 8Z"
                                            stroke="none" fill="currentColor"></path>
                                    </svg>
                                    <p class="text-slate-700 font-medium text-lg leading-relaxed italic pl-4">
                                        "{{ $currentPatient->complaint }}"
                                    </p>
                                </div>
                            </div>

                            {{-- FORM INPUT DOKTER --}}
                            <form action="{{ route('doctor.finish', $currentPatient->id) }}" method="POST"
                                class="flex-1 flex flex-col">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                    {{-- Input Diagnosa --}}
                                    <div class="flex flex-col">
                                        <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-2">
                                            <span class="bg-blue-100 text-blue-600 p-1 rounded-md"><svg class="w-4 h-4"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg></span>
                                            Diagnosa Medis
                                        </label>
                                        <textarea name="diagnosis" rows="4"
                                            class="w-full rounded-2xl border-slate-200 bg-slate-50 focus:bg-white focus:border-mint-500 focus:ring-4 focus:ring-mint-500/10 transition-all text-slate-700 font-medium resize-none"
                                            placeholder="Contoh: Infeksi Saluran Pernapasan Akut (ISPA)..." required></textarea>
                                    </div>

                                    {{-- Input Resep --}}
                                    {{-- PILIH OBAT (GANTI BAGIAN INI) --}}
                                    <div class="flex flex-col mb-4">
                                        <label class="block text-sm font-bold text-slate-700 mb-2">💊 Resep Obat (Pilih
                                            Multipel)</label>

                                        <select name="medicines[]" multiple
                                            class="w-full rounded-2xl border-slate-200 bg-slate-50 focus:border-mint-500 h-32">
                                            @foreach ($medicines as $med)
                                                <option value="{{ $med->id }}">
                                                    {{ $med->name }} (Stok: {{ $med->stock }})
                                                </option>
                                            @endforeach
                                        </select>
                                        <p class="text-xs text-slate-400 mt-1">*Tahan tombol CTRL (Windows) atau Command
                                            (Mac) untuk memilih lebih dari satu.</p>
                                    </div>

                                    {{-- CATATAN DOSIS --}}
                                    <div class="mb-4">
                                        <label class="block text-sm font-bold text-slate-700 mb-2">📝 Catatan Dosis /
                                            Cara Pakai</label>
                                        <textarea name="instruction" class="w-full rounded-2xl border-slate-200 focus:border-mint-500" rows="2"
                                            placeholder="Contoh: Paracetamol 3x1 sesudah makan..."></textarea>
                                    </div>
                                </div>

                                {{-- Footer Tombol --}}
                                <div class="mt-auto pt-6 border-t border-slate-100 flex gap-3">

                                    {{-- TOMBOL LEWATI (Baru) --}}
                                    <button type="button"
                                        onclick="document.getElementById('skip-form-{{ $currentPatient->id }}').submit()"
                                        class="px-6 py-4 rounded-2xl border-2 border-slate-200 text-slate-500 font-bold hover:bg-slate-50 hover:text-slate-700 hover:border-slate-300 transition-all">
                                        ↪ Lewati
                                    </button>

                                    {{-- TOMBOL SIMPAN (Utama) --}}
                                    <button type="submit"
                                        class="flex-1 group relative flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-2xl text-white bg-slate-900 hover:bg-mint-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900 transition-all duration-300 shadow-lg shadow-slate-900/20 hover:shadow-mint-600/30 hover:-translate-y-1">
                                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                            <svg class="h-5 w-5 text-slate-500 group-hover:text-mint-200 transition-colors"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </span>
                                        Simpan Rekam Medis & Selesai
                                    </button>
                                </div>
                            </form>

                            {{-- Form Tersembunyi untuk Skip (Agar button type="button" di atas bisa submit form ini) --}}
                            <form id="skip-form-{{ $currentPatient->id }}"
                                action="{{ route('doctor.skip', $currentPatient->id) }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    {{-- TAMPILAN KOSONG (Desain Modern) --}}
                    <div
                        class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-100 flex flex-col items-center justify-center text-center h-full min-h-[500px]">
                        <div class="relative mb-6 group">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-mint-200 to-blue-200 rounded-full blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200">
                            </div>
                            <div
                                class="relative w-24 h-24 bg-white rounded-full flex items-center justify-center border-4 border-slate-50">
                                <span class="text-4xl">👨‍⚕️</span>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-2">Ruang Periksa Siap</h3>
                        <p class="text-slate-500 max-w-sm mx-auto leading-relaxed">
                            Belum ada pasien yang aktif. Silakan pilih pasien dari daftar <span
                                class="font-bold text-slate-700">Antrean Berikutnya</span> di sebelah kanan untuk
                            memulai pemeriksaan.
                        </p>
                    </div>
                @endif
            </div>

            {{-- KOLOM KANAN: LIST ANTREAN --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100 h-full flex flex-col">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-slate-900">Antrean Berikutnya</h3>
                        <span class="bg-mint-100 text-mint-700 px-3 py-1 rounded-full text-xs font-bold">
                            {{ count($nextPatients) }} Orang
                        </span>
                    </div>

                    @if (count($nextPatients) > 0)
                        <div class="space-y-4 overflow-y-auto max-h-[500px] pr-2 custom-scrollbar">
                            @foreach ($nextPatients as $index => $queue)
                                <div
                                    class="flex items-center gap-4 p-4 rounded-2xl hover:bg-slate-50 transition-all border border-transparent hover:border-slate-100 group relative">

                                    <div
                                        class="font-black text-xl text-slate-300 w-8 group-hover:text-mint-500 transition-colors">
                                        {{ $queue->queue_number }}
                                    </div>

                                    <div
                                        class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-500 text-sm">
                                        {{ substr($queue->user->name, 0, 1) }}
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-bold text-slate-900 truncate">{{ $queue->user->name }}</h4>
                                        <p class="text-xs text-slate-400 font-bold truncate">
                                            {{ Str::limit($queue->complaint, 20) }}
                                        </p>
                                    </div>

                                    {{-- TOMBOL PANGGIL (LOGIC) --}}
                                    {{-- Tombol panah kecil ini sekarang berfungsi memanggil pasien --}}
                                    <form action="{{ route('doctor.call', $queue->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" title="Panggil Pasien Ini"
                                            class="p-2 rounded-full bg-slate-50 text-slate-400 hover:bg-mint-500 hover:text-white transition-colors cursor-pointer z-10 relative">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center h-64 text-center">
                            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-slate-400 text-sm font-medium">Tidak ada antrean menunggu.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
