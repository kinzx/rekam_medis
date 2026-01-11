<x-app-layout>
    <div class="min-h-screen bg-mint-50 pt-24 pb-12 px-4 sm:px-6 lg:px-8 font-sans">
        <div class="max-w-4xl mx-auto">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900">Riwayat Berobat 🕒</h1>
                    <p class="text-slate-500 mt-1">Daftar kunjungan medis Anda sebelumnya.</p>
                </div>
                <a href="{{ route('dashboard') }}" class="text-sm font-bold text-mint-600 hover:text-mint-700">
                    &larr; Kembali
                </a>
            </div>

            <div class="space-y-6">
                @foreach ($history as $item)
                    <div
                        class="bg-white rounded-[2rem] p-6 shadow-sm border border-slate-100 flex flex-col md:flex-row gap-6 hover:shadow-md transition-all">

                        {{-- Tanggal --}}
                        <div
                            class="bg-mint-50 rounded-2xl p-4 flex flex-col items-center justify-center min-w-[100px] text-center border border-mint-100">
                            <span
                                class="text-xs font-bold text-mint-600 uppercase">{{ $item->created_at->format('M') }}</span>
                            <span class="text-3xl font-black text-slate-800">{{ $item->created_at->format('d') }}</span>
                            <span class="text-xs font-bold text-slate-400">{{ $item->created_at->format('Y') }}</span>
                        </div>

                        {{-- Detail --}}
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="text-xl font-bold text-slate-800">{{ $item->poli_id ?? 'Poli Umum' }}
                                    </h3>
                                    <p class="text-slate-500 text-sm font-medium">Dr. {{ $item->doctor->name ?? '-' }}
                                    </p>
                                </div>
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                    Selesai
                                </span>
                            </div>

                            <div class="bg-slate-50 rounded-xl p-4 mt-3">
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Diagnosa
                                    Dokter</p>
                                <p class="text-slate-800 font-medium">"{{ $item->diagnosis }}"</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if ($history->isEmpty())
                    <div class="text-center py-12 bg-white rounded-[2rem] border border-slate-100 border-dashed">
                        <p class="text-slate-400 font-bold">Belum ada riwayat pemeriksaan.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
