<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemulasaraan;

class PemulasaraansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemulasaraan = Pemulasaraan::all();
        return view('pemulasaraan.index', compact('pemulasaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemulasaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_almarhum' => 'required|string|max:255',
            'tgl_permintaan' => 'required|date',
            'tgl_pemulasaraan' => 'nullable|date',
            'status' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Pemulasaraan::create($request->all());

        return redirect()->route('pemulasaraan.index')
                         ->with('success', 'Data pemulasaraan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemulasaraan = Pemulasaraan::findOrFail($id);
        return view('pemulasaraan.show', compact('pemulasaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemulasaraan = Pemulasaraan::findOrFail($id);
        return view('pemulasaraan.edit', compact('pemulasaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_almarhum' => 'required|string|max:255',
            'tgl_permintaan' => 'required|date',
            'tgl_pemulasaraan' => 'nullable|date',
            'status' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $pemulasaraan = Pemulasaraan::findOrFail($id);
        $pemulasaraan->update($request->all());

        return redirect()->route('pemulasaraan.index')
                         ->with('success', 'Data pemulasaraan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemulasaraan = Pemulasaraan::findOrFail($id);
        $pemulasaraan->delete();

        return redirect()->route('pemulasaraan.index')
                         ->with('success', 'Data pemulasaraan berhasil dihapus.');
    }
}
