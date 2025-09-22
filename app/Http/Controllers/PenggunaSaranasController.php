<?php

namespace App\Http\Controllers;

use App\Models\PenggunaSarana;
use App\Models\Anggota;
use App\Models\Sarana;
use Illuminate\Http\Request;

class PenggunaSaranasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = PenggunaSarana::with(['anggota', 'sarana'])->get();
        return view('pengguna_sarana.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggota = Anggota::all();
        $sarana = Sarana::all();
        return view('pengguna_sarana.create', compact('anggota', 'sarana'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggota_jra,id_anggota',
            'id_sarana' => 'required|exists:sarana,id_sarana',
            'tanggal_pakai' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        PenggunaSarana::create($request->all());

        return redirect()->route('pengguna_sarana.index')->with('success', 'Data pengguna sarana berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengguna = PenggunaSarana::with(['anggota', 'sarana'])->findOrFail($id);
        return view('pengguna_sarana.show', compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengguna = PenggunaSarana::findOrFail($id);
        $anggota = Anggota::all();
        $sarana = Sarana::all();
        return view('pengguna_sarana.edit', compact('pengguna', 'anggota', 'sarana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggota_jra,id_anggota',
            'id_sarana' => 'required|exists:sarana,id_sarana',
            'tanggal_pakai' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $pengguna = PenggunaSarana::findOrFail($id);
        $pengguna->update($request->all());

        return redirect()->route('pengguna_sarana.index')->with('success', 'Data pengguna sarana berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = PenggunaSarana::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('pengguna_sarana.index')->with('success', 'Data pengguna sarana berhasil dihapus.');
    }
}
