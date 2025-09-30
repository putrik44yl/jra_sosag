<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenggunaAmbulans;
use App\Models\Ambulans;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaAmbulansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data pengguna ambulans dengan relasi
        $pengguna = PenggunaAmbulans::with(['ambulans', 'anggota', 'user'])->get();

        // kirim ke view
       return view('admin.pengguna_ambulans.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ambulans = Ambulans::all();
        $anggota = Anggota::all();
        $users = User::all();

        return view('admin.pengguna_ambulans.create', compact('ambulans', 'anggota', 'users'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_ambulans' => 'required|exists:ambulans,id_ambulans',
            'id_user' => 'required|exists:users,id',
            'id_anggota' => 'required|exists:anggota_jra,id_anggota',
            'tgl_penggunaan' => 'required|date',
            'tujuan' => 'nullable|string|max:150',
            'status' => 'required|in:menunggu,berjalan,selesai,dibatalkan',
        ]);

        PenggunaAmbulans::create($request->all());

        return redirect()->route('admin.pengguna_ambulans.index')->with('success', 'Data pengguna ambulans berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penggunaAmbulans = PenggunaAmbulans::with(['ambulans', 'anggota', 'user'])->findOrFail($id);
        return view('admin.pengguna_ambulans.show', compact('penggunaAmbulans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penggunaAmbulans = PenggunaAmbulans::findOrFail($id);
        $ambulans = Ambulans::all();
        $anggota = Anggota::all();
        $users = User::all();

        return view('admin.pengguna_ambulans.edit', compact('penggunaAmbulans', 'ambulans', 'anggota', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_ambulans' => 'required|exists:ambulans,id_ambulans',
            'id_user' => 'required|exists:users,id',
            'id_anggota' => 'required|exists:anggota_jra,id_anggota',
            'tgl_penggunaan' => 'required|date',
            'tujuan' => 'nullable|string|max:150',
            'status' => 'required|in:menunggu,berjalan,selesai,dibatalkan',
        ]);

        $penggunaAmbulans = PenggunaAmbulans::findOrFail($id);
        $penggunaAmbulans->update($request->all());

        return redirect()->route('admin.pengguna_ambulans.index')->with('success', 'Data pengguna ambulans berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penggunaAmbulans = PenggunaAmbulans::findOrFail($id);
        $penggunaAmbulans->delete();

        return redirect()->route('admin.pengguna_ambulans.index')->with('success', 'Data pengguna ambulans berhasil dihapus.');
    }
}
