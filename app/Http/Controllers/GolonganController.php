<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $golongan = Golongan::all(); // Ambil semua data golongan
        return view('golongan.index', compact('golongan')); // Kirim ke view
    }

    public function create()
    {
        return view('golongan.create'); // Tampilkan form tambah
    }

    public function store(Request $request)
    {
        $request->validate([
            'gol_kode' => 'required|max:10|unique:tb_golongan', // Pastikan gol_kode unik
            'gol_nama' => 'required|max:50', // Validasi nama golongan
        ]);

        Golongan::create($request->all()); // Simpan data ke database

        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $golongan = Golongan::findOrFail($id); // Cari data golongan
        return view('golongan.edit', compact('golongan')); // Kirim data ke form edit
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gol_kode' => 'required|max:10|unique:tb_golongan,gol_kode,' . $id . ',gol_id', // Validasi gol_kode saat update
            'gol_nama' => 'required|max:50', // Validasi nama golongan
        ]);

        $golongan = Golongan::findOrFail($id); // Cari data golongan
        $golongan->update($request->all()); // Update data

        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $golongan = Golongan::findOrFail($id); // Cari data golongan
        $golongan->delete(); // Hapus data

        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil dihapus.');
    }
}
