<x-app-layout>
    <div class="min-h-screen bg-mint-50 pt-32 pb-12 px-4 sm:px-6 lg:px-8 font-sans">

        {{-- HEADER --}}
        <div class="max-w-7xl mx-auto mb-10 flex flex-col md:flex-row justify-between items-end gap-4">
            <div>
                <span class="bg-slate-900 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-2 inline-block">Admin Panel</span>
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900">
                    Control Center 🎛️
                </h1>
                <p class="text-slate-500 mt-2 font-medium">Pantau aktivitas & kelola pengguna sistem.</p>
            </div>

            {{-- Tombol Trigger Modal --}}
            {{-- Kita ganti onclick-nya agar memanggil fungsi JS di bawah --}}
            <button onclick="toggleModal('modal-add-user')"
                class="bg-slate-900 hover:bg-mint-600 text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-mint-500/20 transition-all flex items-center gap-2 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah User Baru
            </button>
        </div>

        {{-- ALERT SUCCESS --}}
        @if(session('success'))
            <div class="max-w-7xl mx-auto mb-6">
                <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-2 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        {{-- STATISTIK CARDS --}}
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            {{-- Card 1: Total User (Admin Klinik) --}}
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden group hover:-translate-y-1 transition-transform">
                <div class="relative z-10">
                    <p class="text-slate-500 font-bold text-sm">Admin Klinik</p>
                    <h3 class="text-4xl font-extrabold text-slate-900 mt-2">
                        {{ $users->where('role', 'user')->count() }}
                    </h3>
                    <p class="text-mint-500 text-xs font-bold mt-2">Aktif Mengelola</p>
                </div>
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-mint-50 rounded-full group-hover:scale-110 transition-transform flex items-center justify-center">
                    <span class="text-4xl">👥</span>
                </div>
            </div>

            {{-- Card 2: Total Dokter --}}
            <div class="bg-slate-900 p-6 rounded-[2rem] shadow-xl shadow-slate-900/10 relative overflow-hidden text-white group hover:-translate-y-1 transition-transform">
                <div class="relative z-10">
                    <p class="text-slate-400 font-bold text-sm">Total Dokter</p>
                    <h3 class="text-4xl font-extrabold mt-2">
                        {{ $users->where('role', 'dokter')->count() }}
                    </h3>
                    <p class="text-mint-400 text-xs font-bold mt-2">Terdaftar</p>
                </div>
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full group-hover:scale-110 transition-transform flex items-center justify-center">
                    <span class="text-4xl">👨‍⚕️</span>
                </div>
            </div>

            {{-- Placeholder Stats --}}
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden group hover:-translate-y-1 transition-transform opacity-60">
                <div class="relative z-10">
                    <p class="text-slate-500 font-bold text-sm">Total Pasien</p>
                    <h3 class="text-4xl font-extrabold text-slate-900 mt-2">-</h3>
                    <p class="text-slate-400 text-xs font-bold mt-2">Data Pasien</p>
                </div>
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-pink-50 rounded-full flex items-center justify-center">
                    <span class="text-4xl">🏥</span>
                </div>
            </div>

             <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden group hover:-translate-y-1 transition-transform opacity-60">
                <div class="relative z-10">
                    <p class="text-slate-500 font-bold text-sm">Total Obat</p>
                    <h3 class="text-4xl font-extrabold text-slate-900 mt-2">-</h3>
                    <p class="text-slate-400 text-xs font-bold mt-2">Data Obat</p>
                </div>
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-blue-50 rounded-full flex items-center justify-center">
                    <span class="text-4xl">💊</span>
                </div>
            </div>

        </div>

        {{-- TABEL USER --}}
        <div class="max-w-7xl mx-auto mt-8">
            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100">
                <h3 class="text-xl font-bold text-slate-900 mb-6">Daftar User & Dokter</h3>
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
                            @foreach($users as $user)
                                <tr class="group hover:bg-mint-50/50 transition-colors border-b border-slate-50 last:border-0">
                                    <td class="py-4 flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-slate-100 overflow-hidden border border-slate-200">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff" alt="Avatar">
                                        </div>
                                        <span class="text-slate-900 font-bold">{{ $user->name }}</span>
                                    </td>
                                    <td class="py-4">
                                        @if(strtolower($user->role) == 'dokter')
                                            <span class="bg-slate-900 text-white px-3 py-1 rounded-full text-xs font-bold">Dokter</span>
                                        @else
                                            <span class="bg-mint-100 text-mint-700 px-3 py-1 rounded-full text-xs font-bold">Admin Klinik</span>
                                        @endif
                                    </td>
                                    <td class="py-4">{{ $user->email }}</td>
                                    <td class="py-4">{{ $user->created_at->format('d M Y') }}</td>
                                    <td class="py-4 text-right">
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus user {{ $user->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-600 font-bold text-xs bg-red-50 hover:bg-red-100 px-3 py-1 rounded-lg transition-colors">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if($users->count() == 0)
                                <tr>
                                    <td colspan="5" class="text-center py-10 text-slate-400">Belum ada data user.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    {{-- MODAL TAMBAH USER (Popup) --}}
    {{-- Perhatikan class 'hidden' dan 'fixed inset-0 z-50' --}}
    <div id="modal-add-user" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">

        {{-- Backdrop Gelap (Klik ini untuk tutup) --}}
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="toggleModal('modal-add-user')"></div>

        {{-- Konten Modal --}}
        <div class="relative bg-white rounded-[2rem] shadow-2xl w-full max-w-md overflow-hidden transform scale-100 transition-all z-10">

            {{-- Header Modal --}}
            <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                <h3 class="text-lg font-extrabold text-slate-900">✨ Tambah User Baru</h3>
                <button onclick="toggleModal('modal-add-user')" class="text-slate-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            {{-- Form --}}
            <form action="{{ route('admin.user.store') }}" method="POST" class="p-6 space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                    <input type="text" name="name" required class="w-full rounded-xl border-slate-200 focus:border-mint-500 focus:ring-mint-500 bg-slate-50 font-bold text-slate-800" placeholder="Contoh: Dr. Budi">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email</label>
                    <input type="email" name="email" required class="w-full rounded-xl border-slate-200 focus:border-mint-500 focus:ring-mint-500 bg-slate-50 font-bold text-slate-800" placeholder="email@klinik.com">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Role</label>
                    <div class="relative">
                        <select name="role" required class="w-full rounded-xl border-slate-200 focus:border-mint-500 focus:ring-mint-500 bg-slate-50 font-bold text-slate-800 appearance-none">
                            <option value="" disabled selected>-- Pilih Peran --</option>
                            <option value="dokter">👨‍⚕️ Dokter</option>
                            <option value="user">👤 Admin Klinik (User)</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Password</label>
                        <input type="password" name="password" required class="w-full rounded-xl border-slate-200 focus:border-mint-500 focus:ring-mint-500 bg-slate-50 font-bold text-slate-800" placeholder="******">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Konfirmasi</label>
                        <input type="password" name="password_confirmation" required class="w-full rounded-xl border-slate-200 focus:border-mint-500 focus:ring-mint-500 bg-slate-50 font-bold text-slate-800" placeholder="******">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-slate-900 text-white py-4 rounded-xl font-bold hover:bg-mint-600 hover:-translate-y-1 transition-all shadow-lg shadow-slate-900/20">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- SCRIPT SEDERHANA UNTUK MODAL --}}
    <script>
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
        }
    </script>

</x-app-layout>
