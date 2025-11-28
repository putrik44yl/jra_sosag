<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemakaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemakamanController extends Controller
{
    public function index()
    {
        $data = Pemakaman::with('user')->latest()->get();
        return view('admin.pemakaman.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pemakaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'blok' => 'required',
            'nama_almarhum' => 'required',
            'tempat_tanggal_lahir' => 'required',
            'tanggal_meninggal' => 'required|date',
        ]);

        Pemakaman::create([
            'blok' => $request->blok,
            'nama_almarhum' => $request->nama_almarhum,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
            'tanggal_meninggal' => $request->tanggal_meninggal,
            'keluarga_almarhum' => $request->keluarga_almarhum,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::id(), // Admin yg input
        ]);

        return redirect()->route('admin.pemakaman.index')
                         ->with('success', 'Data pemakaman berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Pemakaman::findOrFail($id);
        return view('admin.pemakaman.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'blok' => 'required',
            'nama_almarhum' => 'required',
            'tempat_tanggal_lahir' => 'required',
            'tanggal_meninggal' => 'required|date',
        ]);

        $data = Pemakaman::findOrFail($id);

        $data->update([
            'blok' => $request->blok,
            'nama_almarhum' => $request->nama_almarhum,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
            'tanggal_meninggal' => $request->tanggal_meninggal,
            'keluarga_almarhum' => $request->keluarga_almarhum,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.pemakaman.index')
                         ->with('success', 'Data pemakaman berhasil diperbarui');
    }

    public function destroy($id)
    {
        Pemakaman::findOrFail($id)->delete();

        return redirect()->route('admin.pemakaman.index')
                         ->with('success', 'Data pemakaman berhasil dihapus');
    }
}
