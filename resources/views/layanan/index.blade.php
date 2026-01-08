<x-app-layout>
    <div class="min-h-screen bg-mint-50 pt-32 pb-12 px-4 sm:px-6 lg:px-8 font-sans">

        <div class="max-w-7xl mx-auto mb-8">
            <h1 class="text-3xl font-extrabold text-slate-900">
                Daftar Layanan
            </h1>
            <p class="text-slate-500 font-medium">Kelola layanan medis yang tersedia.</p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2">
                <div class="bg-white rounded-[3rem] p-10 shadow-2xl shadow-mint-500/10 border border-slate-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 bg-mint-500 text-white px-6 py-3 rounded-bl-[2rem] font-bold tracking-wider">
                        LAYANAN TERDAFTAR
                    </div>

                    <div class="mt-4">
                        @if($services->count())
                            <div class="space-y-4">
                                @foreach($services as $service)
                                    <div class="flex items-center justify-between p-4 rounded-2xl hover:bg-mint-50 transition-colors cursor-pointer border border-transparent hover:border-mint-100">
                                        <div>
                                            <h4 class="font-bold text-slate-900">{{ $service->name }}</h4>
                                            <p class="text-xs text-slate-500">{{ $service->description ?? '–' }}</p>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <span class="text-sm font-bold text-mint-600">
                                                Rp {{ number_format($service->price ?? 0, 0, ',', '.') }}
                                            </span>
                                            <a href="{{ route('layanan.edit', $service) }}" class="text-slate-500 hover:text-mint-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('layanan.destroy', $service) }}" method="POST" onsubmit="return confirm('Hapus layanan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-slate-500 hover:text-red-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011.198 2H9zm-1 6a1 1 0 100 2 1 1 0 000-2zm3 0a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8 text-slate-400">
                                Belum ada layanan.
                            </div>
                        @endif
                    </div>

                    <div class="mt-6 flex gap-4">
                        <a href="{{ route('layanan.create') }}" class="flex-1 bg-mint-600 text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-mint-500 transition-all text-center">
                            + Tambah Layanan
                        </a>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100 h-full">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-slate-900">Statistik</h3>
                        <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-xs font-bold">{{ $services->count() }} Layanan</span>
                    </div>

                    <div class="space-y-4">
                        <div class="p-4 rounded-2xl bg-mint-50 border border-mint-100">
                            <p class="text-xs font-bold text-mint-600 uppercase mb-1">Total Harga</p>
                            <p class="text-lg font-bold text-slate-900">
                                Rp {{ number_format($services->sum('price'), 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <p class="text-xs font-bold text-slate-600 uppercase mb-1">Rata-rata Harga</p>
                            <p class="text-lg font-bold text-slate-900">
                                Rp {{ $services->count() > 0 ? number_format($services->avg('price'), 0, ',', '.') : '0' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>