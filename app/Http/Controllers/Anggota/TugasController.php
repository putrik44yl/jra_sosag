<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::where('user_id', Auth::id())->get();
        return view('anggota.tugas.index', compact('tugas'));
    }

    public function create()
    {
        return view('anggota.tugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        Tugas::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'status' => 'pending',
        ]);

        return redirect()->route('anggota.tugas.index')->with('success', 'Tugas berhasil ditambahkan');
    }

    public function edit(Tugas $tuga)
    {
        return view('anggota.tugas.edit', compact('tuga'));
    }

    public function update(Request $request, Tugas $tuga)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'status' => 'required|in:pending,selesai',
        ]);

        $tuga->update($request->all());

        return redirect()->route('anggota.tugas.index')->with('success', 'Tugas berhasil diperbarui');
    }

    public function destroy(Tugas $tuga)
    {
        $tuga->delete();
        return redirect()->route('anggota.tugas.index')->with('success', 'Tugas berhasil dihapus');
    }
}
