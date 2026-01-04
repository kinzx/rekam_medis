<x-app-layout>
    <div class="min-h-screen bg-mint-50 pt-32 pb-12 px-4 sm:px-6 lg:px-8 font-sans">

        <div class="max-w-7xl mx-auto mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900">
                    Apotek & Farmasi 💊
                </h1>
                <p class="text-slate-500 font-medium">Kelola resep dan stok obat.</p>
            </div>
            <div class="bg-white px-6 py-3 rounded-2xl font-bold shadow-sm text-slate-600 flex items-center gap-3">
                <span>Stok Kritis:</span>
                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs">Paracetamol (Low)</span>
            </div>
        </div>

        <div class="max-w-7xl mx-auto">
            <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                Resep Masuk Baru
                <span class="bg-neon-pink text-white px-2 py-1 rounded-lg text-xs animate-pulse">3 Baru</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">

                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-mint-500/10 transition-all group">
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex gap-3 items-center">
                            <div class="w-10 h-10 bg-mint-100 rounded-full flex items-center justify-center text-mint-600 font-bold">
                                💊
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Budi Santoso</h4>
                                <p class="text-xs text-slate-400">Dr. Strange</p>
                            </div>
                        </div>
                        <span class="text-xs font-bold bg-slate-100 px-3 py-1 rounded-full">10:45 AM</span>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-sm border-b border-dashed border-slate-100 pb-2">
                            <span class="text-slate-600">Amoxicillin 500mg</span>
                            <span class="font-bold">1 Strip</span>
                        </div>
                        <div class="flex justify-between text-sm border-b border-dashed border-slate-100 pb-2">
                            <span class="text-slate-600">Paracetamol</span>
                            <span class="font-bold">1 Botol</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-600">Vitamin C</span>
                            <span class="font-bold">1 Strip</span>
                        </div>
                    </div>

                    <button class="w-full bg-slate-900 text-white py-3 rounded-xl font-bold group-hover:bg-mint-500 transition-colors">
                        Siapkan Obat
                    </button>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-mint-500/10 transition-all group">
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex gap-3 items-center">
                            <div class="w-10 h-10 bg-mint-100 rounded-full flex items-center justify-center text-mint-600 font-bold">
                                💊
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Siti Aminah</h4>
                                <p class="text-xs text-slate-400">Dr. Sarah</p>
                            </div>
                        </div>
                        <span class="text-xs font-bold bg-slate-100 px-3 py-1 rounded-full">10:50 AM</span>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-sm border-b border-dashed border-slate-100 pb-2">
                            <span class="text-slate-600">Ponstan 500mg</span>
                            <span class="font-bold">1 Strip</span>
                        </div>
                    </div>

                    <button class="w-full bg-slate-900 text-white py-3 rounded-xl font-bold group-hover:bg-mint-500 transition-colors">
                        Siapkan Obat
                    </button>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
