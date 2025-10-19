<?php

namespace App\Http\Controllers;

use App\Models\Tas;
use App\Models\KategoriTas;
use Illuminate\Http\Request;

class TasController extends Controller
{
    public function index()
    {
        $tass = Tas::with('kategori')->get(); 
        return view('home', compact('tass'));
    }

    public function galeri()
    {
        $tass = Tas::all();
        return view('galeri', compact('tass'));
    }

    public function create()
    {
        $kategoris = KategoriTas::all();
        return view('tambah', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'kategori_tas_id' => 'required|exists:kategori_tas,id',
            'harga' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $nama_file = time() . '_' . $request->file('foto')->getClientOriginalName();
        $request->file('foto')->storeAs('public/tas_foto', $nama_file);

        Tas::create([
            'nama' => $request->nama,
            'merk' => $request->merk,
            'kategori_tas_id' => $request->kategori_tas_id,
            'harga' => $request->harga,
            'foto' => $nama_file,
        ]);

        return redirect()->route('home')->with('success', 'Data tas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $tas = Tas::findOrFail($id);
        $kategoris = KategoriTas::all();
        return view('edit', compact('tas', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'kategori_tas_id' => 'required|exists:kategori_tas,id',
            'harga' => 'required|integer',
        ]);

        $tas = Tas::findOrFail($id);
        $tas->update([
            'nama' => $request->nama,
            'merk' => $request->merk,
            'kategori_tas_id' => $request->kategori_tas_id,
            'harga' => $request->harga,
        ]);

        return redirect()->route('home')->with('success', 'Data tas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $tas = Tas::findOrFail($id);
        $tas->delete();

        return redirect()->route('home')->with('success', 'Data tas berhasil dihapus!');
    }
}