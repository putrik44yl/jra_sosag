<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    /**
     * Tampilkan semua tugas milik user login.
     */
    public function index()
    {
        $tugas = Tugas::where('user_id', Auth::id())->get();
        return view('anggota.tugas.index', compact('tugas'));
    }

    /**
     * Form tambah tugas.
     */
    public function create()
    {
        return view('anggota.tugas.create');
    }

    /**
     * Simpan tugas baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        Tugas::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    /**
     * Form edit tugas.
     */
    public function edit(Tugas $tugas)
    {
        return view('anggota.tugas.edit', compact('tugas'));
    }

    /**
     * Update tugas.
     */
    public function update(Request $request, Tugas $tugas)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $tugas->update($request->only(['judul', 'deskripsi', 'deadline']));

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    /**
     * Hapus tugas.
     */
    public function destroy(Tugas $tugas)
    {
        $tugas->delete();
        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
