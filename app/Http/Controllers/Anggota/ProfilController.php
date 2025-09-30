<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Tampilkan profil anggota
     */
    public function index()
    {
        $profil = Profil::where('user_id', auth()->id())->first();

        return view('anggota.profil.index', compact('profil'));
    }

    /**
     * Form tambah profil
     */
    public function create()
    {
        return view('anggota.profil.create');
    }

    /**
     * Simpan profil baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'alamat'         => 'nullable|string',
            'no_hp'          => 'nullable|string|max:20',
            'tanggal_lahir'  => 'nullable|date',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_profil', 'public');
        }

        Profil::create($data);

        return redirect()->route('anggota.profil.index')->with('success', 'Profil berhasil dibuat.');
    }

    /**
     * Form edit profil
     */
    public function edit(Profil $profil)
    {
        if ($profil->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak');
        }

        return view('anggota.profil.edit', compact('profil'));
    }

    /**
     * Update profil
     */
    public function update(Request $request, Profil $profil)
    {
        if ($profil->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak');
        }

        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'alamat'         => 'nullable|string',
            'no_hp'          => 'nullable|string|max:20',
            'tanggal_lahir'  => 'nullable|date',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // hapus foto lama kalau ada
            if ($profil->foto && Storage::disk('public')->exists($profil->foto)) {
                Storage::disk('public')->delete($profil->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_profil', 'public');
        }

        $profil->update($data);

        return redirect()->route('anggota.profil.index')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Hapus profil
     */
    public function destroy(Profil $profil)
    {
        if ($profil->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak');
        }

        if ($profil->foto && Storage::disk('public')->exists($profil->foto)) {
            Storage::disk('public')->delete($profil->foto);
        }

        $profil->delete();

        return redirect()->route('anggota.profil.index')->with('success', 'Profil berhasil dihapus.');
    }
}
