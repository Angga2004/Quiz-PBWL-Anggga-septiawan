<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Golongan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index()
    {
        $pelanggan = Pelanggan::all(); // Ambil semua data pelanggan
        return view('pelanggan.index', compact('pelanggan'));
    }

    // Menampilkan form tambah pelanggan
    public function create()
    {
        $golongan = Golongan::all(); // Ambil semua data golongan
        return view('pelanggan.create', compact('golongan'));
    }

    // Menyimpan data pelanggan baru
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'pel_nama' => 'required|string|max:255',
            'pel_alamat' => 'required|string',
            'pel_id_gol' => 'required|exists:golongan,gol_id',
        ]);

        // Menyimpan data pelanggan
        Pelanggan::create($validated);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Menampilkan form edit pelanggan
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id); // Ambil data pelanggan berdasarkan ID
        $golongan = Golongan::all(); // Ambil semua data golongan
        return view('pelanggan.edit', compact('pelanggan', 'golongan'));
    }

    // Mengupdate data pelanggan
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'pel_nama' => 'required|string|max:255',
            'pel_alamat' => 'required|string',
            'pel_id_gol' => 'required|exists:golongan,gol_id',
        ]);

        // Menemukan dan mengupdate data pelanggan
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($validated);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    // Menghapus data pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
