<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\Jadwall;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;

class DashboardAnggotaController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // ambil data sesuai user login
        $profil = Profil::where('user_id', $userId)->first();
        $jumlahTugas = Tugas::where('user_id', $userId)->count();
        $jumlahJadwal = Jadwall::where('user_id', $userId)->count();

        return view('anggota.dashboard', compact('profil', 'jumlahTugas', 'jumlahJadwal'));
    }
}
