<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto (jika ada)
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('anggota', 'public');
        }

        Anggota::create([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'tgl_daftar' => $request->tgl_daftar,
            'bln_daftar' => $request->bln_daftar,
            'status_keaktifan' => $request->status_keaktifan,
            'status_keanggotaan' => $request->status_keanggotaan,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.anggota_jra.index')->with('success', 'Data anggota berhasil ditambahkan!');
    }

    /**
     * Detail anggota.
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
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $anggota = Anggota::findOrFail($id);

    $dataUpdate = [
        'nama' => $request->nama,
        'no_telp' => $request->no_telp,
        'alamat' => $request->alamat,
        'tgl_daftar' => $request->tgl_daftar,
        'bln_daftar' => $request->bln_daftar,
        'status_keaktifan' => $request->status_keaktifan,
        'status_keanggotaan' => $request->status_keanggotaan,
    ];

    if ($request->hasFile('foto')) {
        if ($anggota->foto && Storage::disk('public')->exists($anggota->foto)) {
            Storage::disk('public')->delete($anggota->foto);
        }

        $dataUpdate['foto'] = $request->file('foto')->store('anggota', 'public');
    }

    $anggota->update($dataUpdate);

    return redirect()->route('admin.anggota_jra.index')
                     ->with('success', 'Data anggota berhasil diperbarui!');
    }


    /**
     * Hapus data anggota.
     */
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);

        // Hapus foto dari storage
        if ($anggota->foto && Storage::disk('public')->exists($anggota->foto)) {
            Storage::disk('public')->delete($anggota->foto);
        }

        $anggota->delete();

        return redirect()->route('admin.anggota_jra.index')->with('success', 'Data anggota berhasil dihapus!');
    }
}
