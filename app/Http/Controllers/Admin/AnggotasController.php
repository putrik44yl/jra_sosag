<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotasController extends Controller
{
    /**
     * Tampilkan semua data anggota.
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('admin.anggota_jra.index', compact('anggota'));
    }

    /**
     * Tampilkan form tambah anggota.
     */
    public function create()
    {
        return view('admin.anggota_jra.create');
    }

    /**
     * Simpan data anggota baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'tgl_daftar' => 'required|date',
            'bln_daftar' => 'required|string|max:20',
            'status_keaktifan' => 'required|in:aktif,nonaktif',
            'status_keanggotaan' => 'required|in:baru,lama,berhenti',
        ]);

        Anggota::create($request->all());

        return redirect()->route('admin.anggota_jra.index')->with('success', 'Data anggota berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail 1 anggota.
     */
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin.anggota_jra.show', compact('anggota'));
    }

    /**
     * Tampilkan form edit anggota.
     */
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin.anggota_jra.edit', compact('anggota'));
    }

    /**
     * Update data anggota.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'tgl_daftar' => 'required|date',
            'bln_daftar' => 'required|string|max:20',
            'status_keaktifan' => 'required|in:aktif,nonaktif',
            'status_keanggotaan' => 'required|in:baru,lama,berhenti',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all());

        return redirect()->route('admin.anggota_jra.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    /**
     * Hapus data anggota.
     */
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('admin.anggota_jra.index')->with('success', 'Data anggota berhasil dihapus!');
    }
}
