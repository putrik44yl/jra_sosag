<?php

namespace App\Http\Controllers;

use App\Models\Ambulans;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AmbulansController extends Controller
{
    public function index()
    {
        $ambulans = Ambulans::with('anggota')->get();
        return view('ambulans.index', compact('ambulans'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        return view('ambulans.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggota_jra,id_anggota',
            'nama' => 'required|string|max:100',
            'plat' => 'required|string|max:20',
            'tujuan' => 'nullable|string|max:150',
            'status' => 'required|in:tersedia,dipakai,rusak',
        ]);

        Ambulans::create($request->all());

        return redirect()->route('ambulans.index')->with('success', 'Data ambulans berhasil ditambahkan.');
    }

    public function show($id)
    {
        $ambulans = Ambulans::with('anggota')->findOrFail($id);
        return view('ambulans.show', compact('ambulans'));
    }

    public function edit($id)
    {
        $ambulans = Ambulans::findOrFail($id);
        $anggota = Anggota::all();
        return view('ambulans.edit', compact('ambulans', 'anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggota_jra,id_anggota',
            'nama' => 'required|string|max:100',
            'plat' => 'required|string|max:20',
            'tujuan' => 'nullable|string|max:150',
            'status' => 'required|in:tersedia,dipakai,rusak',
        ]);

        $ambulans = Ambulans::findOrFail($id);
        $ambulans->update($request->all());

        return redirect()->route('ambulans.index')->with('success', 'Data ambulans berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ambulans = Ambulans::findOrFail($id);
        $ambulans->delete();

        return redirect()->route('ambulans.index')->with('success', 'Data ambulans berhasil dihapus.');
    }
}
