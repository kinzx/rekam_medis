<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Queue;    // <--- TAMBAHKAN INI
use App\Models\Medicine; // <--- TAMBAHKAN INI
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SuperAdminController extends Controller
{
    // 1. TAMPILKAN DASHBOARD & LIST USER
    public function index()
    {
        // Ambil semua user kecuali diri sendiri (superadmin yang sedang login)
        $users = User::where('id', '!=', auth()->id())->latest()->get();
        $totalPasien = Queue::count();
        $totalObat = Medicine::count();

        return view('admin.dashboard', compact('users', 'totalPasien', 'totalObat'));
    }

    // 2. TAMBAH USER BARU
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => strtolower($request->role), // Pastikan huruf kecil
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }

    // 3. HAPUS USER
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }
}
