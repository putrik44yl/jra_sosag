<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAnggotaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Data dummy untuk contoh
        $tugasBulanIni = "Membantu kegiatan pemulasaraan minggu ke-2.";
        $jadwalSopir = "Sopir ambulans: setiap Jumat dan Minggu.";

        return view('anggota.dashboard', compact('user', 'tugasBulanIni', 'jadwalSopir'));
    }
}
