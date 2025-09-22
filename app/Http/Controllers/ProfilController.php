<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Auth::user()->profil; // ambil profil user yg login
        return view('profil.index', compact('profil'));
    }

    public function create()
    {
        return view('profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        Profil::create([
            'user_id' => Auth::id(),
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('profil.index')->with('success', 'Profil berhasil dibuat');
    }

    public function edit(Profil $profil)
    {
        return view('profil.edit', compact('profil'));
    }

    public function update(Request $request, Profil $profil)
    {
        $request->validate([
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $profil->update($request->all());

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diupdate');
    }
}
