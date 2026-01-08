<x-app-layout>
    <div class="min-h-screen bg-mint-50 pt-32 pb-12 px-4 sm:px-6 lg:px-8 font-sans">

        <div class="max-w-7xl mx-auto mb-8">
            <h1 class="text-3xl font-extrabold text-slate-900">
                Edit Layanan
            </h1>
            <p class="text-slate-500 font-medium">Perbarui data layanan di bawah ini.</p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2">
                <div class="bg-white rounded-[3rem] p-10 shadow-2xl shadow-mint-500/10 border border-slate-100">
                    <form action="{{ route('layanan.update', $service) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-slate-700 mb-2" for="name">
                                Nama Layanan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-mint-500 focus:border-transparent" required value="{{ old('name', $service->name) }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-bold text-slate-700 mb-2" for="description">
                                Deskripsi
                            </label>
                            <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-mint-500 focus:border-transparent">{{ old('description', $service->description) }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-bold text-slate-700 mb-2" for="price">
                                Harga (Rp)
                            </label>
                            <input type="number" name="price" id="price" min="0" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-mint-500 focus:border-transparent" value="{{ old('price', $service->price) }}" placeholder="0">
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="flex-1 bg-slate-900 text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-slate-800 transition-all">
                                Update
                            </button>
                            <a href="{{ route('layanan.index') }}" class="px-6 py-4 rounded-2xl font-bold border-2 border-slate-100 hover:bg-slate-50 text-slate-400 hover:text-slate-600">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100 h-full">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-slate-900">Info</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="p-4 rounded-2xl bg-mint-50 border border-mint-100">
                            <p class="text-sm text-slate-700">
                                Perubahan akan disimpan.
                            </p>
                        </div>
                        <form action="{{ route('layanan.destroy', $service) }}" method="POST" onsubmit="return confirm('Hapus layanan ini? Data tidak bisa dikembalikan.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full py-3 px-4 bg-red-50 text-red-600 font-bold rounded-2xl hover:bg-red-100 transition">
                                Hapus Layanan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>