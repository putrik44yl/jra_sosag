<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pemulasaraan;
use App\Models\Anggota;
use App\Models\Ambulans;
use App\Models\Pemakaman;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;

        if (!$q) {
            return redirect()->back()->with('error', 'Masukkan kata kunci pencarian');
        }

        // PEMULASARAAN
        $pemulasaraan = Pemulasaraan::where(function ($query) use ($q) {
            $query->where('nama_almarhum', 'like', "%{$q}%")
                ->orWhere('tgl_permintaan', 'like', "%{$q}%")
                ->orWhere('tgl_pemulasaraan', 'like', "%{$q}%")
                ->orWhere('status', 'like', "%{$q}%")
                ->orWhere('lokasi', 'like', "%{$q}%")
                ->orWhere('keterangan', 'like', "%{$q}%");
        })->get();

        // ANGGOTA
        $anggota = Anggota::where(function ($query) use ($q) {
            $query->where('nama', 'like', "%{$q}%")
                ->orWhere('no_telp', 'like', "%{$q}%")
                ->orWhere('alamat', 'like', "%{$q}%")
                ->orWhere('tgl_daftar', 'like', "%{$q}%")
                ->orWhere('bln_daftar', 'like', "%{$q}%")
                ->orWhere('status_keaktifan', 'like', "%{$q}%")
                ->orWhere('status_keanggotaan', 'like', "%{$q}%");
        })->get();

        // AMBULANS
        $ambulans = Ambulans::where(function ($query) use ($q) {
            $query->where('nama', 'like', "%{$q}%")
                ->orWhere('plat', 'like', "%{$q}%")
                ->orWhere('tujuan', 'like', "%{$q}%")
                ->orWhere('status', 'like', "%{$q}%");
        })->get();

        // PEMAKAMAN
        $pemakaman = Pemakaman::where(function ($query) use ($q) {
            $query->where('blok', 'like', "%{$q}%")
                ->orWhere('nama_almarhum', 'like', "%{$q}%")
                ->orWhere('tempat_tanggal_lahir', 'like', "%{$q}%")
                ->orWhere('tanggal_meninggal', 'like', "%{$q}%")
                ->orWhere('keluarga_almarhum', 'like', "%{$q}%")
                ->orWhere('keterangan', 'like', "%{$q}%");
        })->get();

        // RETURN VIEW
        return view('admin.search.index', [
            'q' => $q,
            'pemulasaraan' => $pemulasaraan,
            'anggota' => $anggota,
            'ambulans' => $ambulans,
            'pemakaman' => $pemakaman,
        ]);
    }
}
