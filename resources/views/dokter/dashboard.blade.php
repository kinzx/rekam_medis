<x-app-layout>
    <div class="min-h-screen bg-mint-50 py-12 px-4 sm:px-6 lg:px-8 font-sans">

        <div class="max-w-7xl mx-auto mb-8">
            <h1 class="text-3xl font-extrabold text-slate-900">
                Halo, <span class="text-mint-600">Dr. {{ Auth::user()->name }}</span> 🩺
            </h1>
            <p class="text-slate-500 font-medium">Siap melayani pasien hari ini?</p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2">
                <div class="bg-white rounded-[3rem] p-10 shadow-2xl shadow-mint-500/10 border border-slate-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 bg-mint-500 text-white px-6 py-3 rounded-bl-[2rem] font-bold tracking-wider">
                        SEDANG DIPERIKSA
                    </div>

                    <div class="flex flex-col md:flex-row gap-8 items-start mt-4">
                        <img src="https://i.pravatar.cc/300?u=5" class="w-32 h-32 rounded-[2rem] object-cover bg-slate-100" alt="Pasien">
                        <div class="flex-1">
                            <h2 class="text-4xl font-extrabold text-slate-900 mb-2">Budi Santoso</h2>
                            <p class="text-slate-400 font-bold mb-6">Pria, 35 Tahun • Poli Umum</p>

                            <div class="bg-mint-50 p-6 rounded-3xl border border-mint-100 mb-8">
                                <p class="text-xs font-bold text-mint-600 uppercase mb-2">Keluhan Utama</p>
                                <p class="text-slate-700 font-medium text-lg">"Demam tinggi sudah 3 hari, disertai pusing hebat dan mual."</p>
                            </div>

                            <div class="flex gap-4">
                                <button class="flex-1 bg-slate-900 text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-slate-800 transition-all">
                                    Input Rekam Medis
                                </button>
                                <button class="px-6 py-4 rounded-2xl font-bold border-2 border-slate-100 hover:bg-slate-50 text-slate-400 hover:text-slate-600">
                                    Lewati
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100 h-full">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-slate-900">Antrian Berikutnya</h3>
                        <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-xs font-bold">5 Orang</span>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center gap-4 p-4 rounded-2xl hover:bg-mint-50 transition-colors cursor-pointer border border-transparent hover:border-mint-100">
                            <div class="font-extrabold text-xl text-slate-300 w-8">02</div>
                            <img src="https://i.pravatar.cc/100?u=8" class="w-12 h-12 rounded-full bg-slate-200" alt="">
                            <div>
                                <h4 class="font-bold text-slate-900">Siti Aminah</h4>
                                <p class="text-xs text-slate-400 font-bold">Sakit Gigi</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-4 rounded-2xl hover:bg-mint-50 transition-colors cursor-pointer border border-transparent hover:border-mint-100">
                            <div class="font-extrabold text-xl text-slate-300 w-8">03</div>
                            <img src="https://i.pravatar.cc/100?u=9" class="w-12 h-12 rounded-full bg-slate-200" alt="">
                            <div>
                                <h4 class="font-bold text-slate-900">Joko Widodo</h4>
                                <p class="text-xs text-slate-400 font-bold">Check Up</p>
                            </div>
                        </div>

                         <div class="flex items-center gap-4 p-4 rounded-2xl hover:bg-mint-50 transition-colors cursor-pointer border border-transparent hover:border-mint-100">
                            <div class="font-extrabold text-xl text-slate-300 w-8">04</div>
                            <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-400">?</div>
                            <div>
                                <h4 class="font-bold text-slate-900">Anonim</h4>
                                <p class="text-xs text-slate-400 font-bold">Demam</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
