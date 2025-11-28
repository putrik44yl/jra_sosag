<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|in:foto,video',
            'file' => 'required|file'
        ]);

        // Simpan file ke storage/public/galeri/
        $path = $request->file('file')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'file_path' => $path,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|in:foto,video',
            'file' => 'nullable|file'
        ]);

        $path = $galeri->file_path;

        if ($request->file('file')) {
            // hapus file lama
            Storage::disk('public')->delete($galeri->file_path);

            // upload file baru
            $path = $request->file('file')->store('galeri', 'public');
        }

        $galeri->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'file_path' => $path,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // hapus file
        Storage::disk('public')->delete($galeri->file_path);

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus!');
    }
}
