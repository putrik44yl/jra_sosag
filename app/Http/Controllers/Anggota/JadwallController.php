<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Jadwall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwallController extends Controller
{
    public function index()
    {
        $jadwalls = Jadwall::where('user_id', Auth::id())->get();
        return view('anggota.jadwalls.index', compact('jadwalls'));
    }

    public function create()
    {
        return view('anggota.jadwalls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
        ]);

        Jadwall::create([
            'user_id' => Auth::id(),
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('anggota.jadwalls.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit(Jadwall $jadwall)
    {
        return view('anggota.jadwalls.edit', compact('jadwall'));
    }

    public function update(Request $request, Jadwall $jadwall)
    {
        $request->validate([
            'kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $jadwall->update($request->all());

        return redirect()->route('anggota.jadwalls.index')->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy(Jadwall $jadwall)
    {
        $jadwall->delete();
        return redirect()->route('anggota.jadwalls.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
