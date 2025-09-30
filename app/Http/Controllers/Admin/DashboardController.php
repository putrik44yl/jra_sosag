<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Pemulasaraan;
use App\Models\Ambulans;
use App\Models\PenggunaAmbulans;
use App\Models\Sarana;
use App\Models\PenggunaSarana;

class DashboardController extends Controller
{
    public function index()
    {
        return view('layouts.dashboard', [
            'jumlahUsers'          => User::count(),
            'jumlahAnggota'        => Anggota::count(),
            'jumlahPemulasaraan'   => Pemulasaraan::count(),
            'jumlahAmbulan'        => Ambulans::count(),
            'jumlahPenggunaAmbulan'=> PenggunaAmbulans::count(),
            'jumlahSarana'         => Sarana::count(),
            'jumlahPenggunaSarana' => PenggunaSarana::count(),
        ]);
    }
}
