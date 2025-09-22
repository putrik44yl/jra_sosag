<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Tampilkan semua jadwal milik user login.
     */
    public function index()
    {
        $jadwals = Jadwal::where('user_id', Auth::id())->get();
        return view('anggota.jadwal.index', compact('jadwals'));
    }

    /**
     * Form tambah jadwal.
     */
    public function create()
    {
        return view('anggota.jadwal.create');
    }

    /**
     * Simpan jadwal baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|string|max:50',
            'kegiatan' => 'required|string|max:255',
            'waktu' => 'required|string|max:50',
        ]);

        Jadwal::create([
            'user_id' => Auth::id(),
            'hari' => $request->hari,
            'kegiatan' => $request->kegiatan,
            'waktu' => $request->waktu,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Form edit jadwal.
     */
    public function edit(Jadwal $jadwal)
    {
        return view('anggota.jadwal.edit', compact('jadwal'));
    }

    /**
     * Update jadwal.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'hari' => 'required|string|max:50',
            'kegiatan' => 'required|string|max:255',
            'waktu' => 'required|string|max:50',
        ]);

        $jadwal->update($request->only(['hari', 'kegiatan', 'waktu']));

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Hapus jadwal.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
