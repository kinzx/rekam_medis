<x-app-layout>
    <div class="min-h-screen bg-mint-50 pt-24 pb-12 px-4 sm:px-6 lg:px-8 font-sans">
        <div class="max-w-4xl mx-auto">

            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900">Resep Digital 💊</h1>
                    <p class="text-slate-500 mt-1">Daftar obat dari dokter untuk Anda.</p>
                </div>
                <a href="{{ route('dashboard') }}" class="text-sm font-bold text-mint-600 hover:text-mint-700">
                    &larr; Kembali
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($prescriptions as $item)
                <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-slate-100 relative overflow-hidden group hover:-translate-y-1 transition-all">
                    <div class="absolute top-0 right-0 bg-mint-500 text-white px-4 py-1 rounded-bl-2xl text-xs font-bold">
                        {{ $item->created_at->format('d M Y') }}
                    </div>

                    <div class="mb-6 mt-2">
                        <p class="text-sm text-slate-400 font-bold">Dokter Peresep</p>
                        <h3 class="text-lg font-bold text-slate-800">Dr. {{ $item->doctor->name ?? '-' }}</h3>
                    </div>

                    <div class="space-y-3">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Rincian Obat</p>

                        {{-- List Obat --}}
                        <ul class="space-y-2">
                            @foreach($item->medicines as $med)
                            <li class="flex items-start gap-3 bg-slate-50 p-3 rounded-xl">
                                <span class="text-2xl">💊</span>
                                <div>
                                    <p class="font-bold text-slate-800">{{ $med->name }}</p>
                                    {{-- Jika ada instruksi khusus di pivot table --}}
                                    @if($item->prescription)
                                        <p class="text-xs text-slate-500 mt-1">{{ $item->prescription }}</p>
                                    @endif
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach

                @if($prescriptions->isEmpty())
                <div class="col-span-2 text-center py-12 bg-white rounded-[2rem] border border-slate-100 border-dashed">
                    <p class="text-slate-400 font-bold">Belum ada resep obat digital.</p>
                </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
