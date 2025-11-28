<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// panggil semua model admin
use App\Models\Anggota;
use App\Models\Pemulasaraan;
use App\Models\Ambulans;
use App\Models\PenggunaAmbulans;
use App\Models\Sarana;
use App\Models\PenggunaSarana;
use App\Models\Pemakaman;
use App\Models\Galeri;

class FrontendController extends Controller
{
    public function welcome()
    {
        // AMBIL SEMUA DATA ADMIN
        $anggota = Anggota::latest()->take(6)->get();
        $pemulasaraan = Pemulasaraan::latest()->take(6)->get();
        $ambulans = Ambulans::latest()->take(6)->get();
        $penggunaAmbulans = PenggunaAmbulans::latest()->take(6)->get();
        $sarana = Sarana::latest()->take(6)->get();
        $penggunaSarana = PenggunaSarana::latest()->take(6)->get();
        $pemakaman = Pemakaman::latest()->take(6)->get();
        $galeri = Galeri::latest()->take(8)->get(); // FOTO & VIDEO

        return view('welcome', compact(
            'anggota',
            'pemulasaraan',
            'ambulans',
            'penggunaAmbulans',
            'sarana',
            'penggunaSarana',
            'pemakaman',
            'galeri'
        ));
    }
}
