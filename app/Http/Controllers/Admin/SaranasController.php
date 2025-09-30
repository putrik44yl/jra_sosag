<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sarana;

class SaranasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sarana = Sarana::all();
        return view('admin.sarana.index', compact('sarana'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sarana.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sarana' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|in:baik,rusak ringan,rusak berat',
            'keterangan' => 'nullable|string',
        ]);

        Sarana::create($request->all());

        return redirect()->route('admin.sarana.index')->with('success', 'Data sarana berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sarana = Sarana::findOrFail($id);
        return view('admin.sarana.show', compact('sarana'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sarana = Sarana::findOrFail($id);
        return view('admin.sarana.edit', compact('sarana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_sarana' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|in:baik,rusak ringan,rusak berat',
            'keterangan' => 'nullable|string',
        ]);

        $sarana = Sarana::findOrFail($id);
        $sarana->update($request->all());

        return redirect()->route('admin.sarana.index')->with('success', 'Data sarana berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sarana = Sarana::findOrFail($id);
        $sarana->delete();

        return redirect()->route('admin.sarana.index')->with('success', 'Data sarana berhasil dihapus.');
    }
}
