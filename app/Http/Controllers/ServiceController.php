<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   public function index()
{
    $services = \App\Models\Service::latest()->get();
    return view('layanan.index', compact('services'));
}

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|integer|min:0',
        ]);

        Service::create($request->all());

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('layanan.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|integer|min=0',
        ]);

        $service->update($request->all());

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diupdate.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}