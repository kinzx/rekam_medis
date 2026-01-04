<x-app-layout>
    <div class="min-h-screen bg-mint-50 pt-32 pb-12 px-4 sm:px-6 lg:px-8 font-sans">

        <div class="max-w-7xl mx-auto mb-10 flex flex-col md:flex-row justify-between items-end gap-4">
            <div>
                <span class="bg-slate-900 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-2 inline-block">Admin Panel</span>
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900">
                    Control Center 🎛️
                </h1>
                <p class="text-slate-500 mt-2 font-medium">Pantau aktivitas klinik secara real-time.</p>
            </div>
            <button class="bg-mint-500 hover:bg-mint-600 text-white px-6 py-3 bg-slate-900 rounded-xl font-bold shadow-lg shadow-mint-500/20 transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah User Baru
            </button>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden group hover:-translate-y-1 transition-transform">
                <div class="relative z-10">
                    <p class="text-slate-500 font-bold text-sm">Total Pasien</p>
                    <h3 class="text-4xl font-extrabold text-slate-900 mt-2">2,845</h3>
                    <p class="text-mint-500 text-xs font-bold mt-2">↑ 12% bulan ini</p>
                </div>
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-mint-50 rounded-full group-hover:scale-110 transition-transform flex items-center justify-center">
                    <span class="text-4xl">👥</span>
                </div>
            </div>

            <div class="bg-slate-900 p-6 rounded-[2rem] shadow-xl shadow-slate-900/10 relative overflow-hidden text-white group hover:-translate-y-1 transition-transform">
                <div class="relative z-10">
                    <p class="text-slate-400 font-bold text-sm">Dokter Jaga</p>
                    <h3 class="text-4xl font-extrabold mt-2">18</h3>
                    <p class="text-mint-400 text-xs font-bold mt-2">Sedang Online</p>
                </div>
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full group-hover:scale-110 transition-transform flex items-center justify-center">
                    <span class="text-4xl">👨‍⚕️</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden group hover:-translate-y-1 transition-transform">
                <div class="relative z-10">
                    <p class="text-slate-500 font-bold text-sm">Kunjungan Hari Ini</p>
                    <h3 class="text-4xl font-extrabold text-slate-900 mt-2">142</h3>
                    <p class="text-neon-pink text-xs font-bold mt-2">Padat Merayap 🔥</p>
                </div>
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-pink-50 rounded-full group-hover:scale-110 transition-transform flex items-center justify-center">
                    <span class="text-4xl">🏥</span>
                </div>
            </div>

             <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden group hover:-translate-y-1 transition-transform">
                <div class="relative z-10">
                    <p class="text-slate-500 font-bold text-sm">Resep Diproses</p>
                    <h3 class="text-4xl font-extrabold text-slate-900 mt-2">89</h3>
                    <p class="text-blue-500 text-xs font-bold mt-2">Butuh Restock</p>
                </div>
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-blue-50 rounded-full group-hover:scale-110 transition-transform flex items-center justify-center">
                    <span class="text-4xl">💊</span>
                </div>
            </div>

            <div class="lg:col-span-4 bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100 mt-4">
                <h3 class="text-xl font-bold text-slate-900 mb-6">User Terbaru</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-slate-400 text-xs uppercase tracking-wider border-b border-slate-100">
                                <th class="pb-4 font-bold">Nama User</th>
                                <th class="pb-4 font-bold">Role</th>
                                <th class="pb-4 font-bold">Email</th>
                                <th class="pb-4 font-bold">Tanggal Gabung</th>
                                <th class="pb-4 font-bold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-medium text-slate-600">
                            <tr class="group hover:bg-mint-50/50 transition-colors">
                                <td class="py-4 flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-slate-100 overflow-hidden">
                                        <img src="https://i.pravatar.cc/150?u=1" alt="Avatar">
                                    </div>
                                    <span class="text-slate-900 font-bold">Dr. Strange</span>
                                </td>
                                <td class="py-4"><span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">Dokter</span></td>
                                <td class="py-4">strange@medisz.com</td>
                                <td class="py-4">12 Jan 2024</td>
                                <td class="py-4 text-right">
                                    <button class="text-slate-400 hover:text-slate-900 font-bold">Edit</button>
                                </td>
                            </tr>
                            <tr class="group hover:bg-mint-50/50 transition-colors">
                                <td class="py-4 flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-slate-100 overflow-hidden">
                                        <img src="https://i.pravatar.cc/150?u=5" alt="Avatar">
                                    </div>
                                    <span class="text-slate-900 font-bold">Jenniya Karter</span>
                                </td>
                                <td class="py-4"><span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-xs font-bold">Pasien</span></td>
                                <td class="py-4">jen@gmail.com</td>
                                <td class="py-4">Hari ini</td>
                                <td class="py-4 text-right">
                                    <button class="text-slate-400 hover:text-slate-900 font-bold">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
