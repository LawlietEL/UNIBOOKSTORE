<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;

class PenerbitController extends Controller
{
    /**
     * Menampilkan semua data penerbit dalam halaman daftar.
     */
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('penerbit.index', compact('penerbit'));
    }

    /**
     * Menampilkan form tambah penerbit baru.
     */
    public function create()
    {
        return view('penerbit.create');
    }

    /**
     * Menyimpan data penerbit ke database.
     * Jika validasi gagal, tetap di halaman form dan tampilkan pesan error.
     * Jika berhasil, tetap di halaman form dan tampilkan notifikasi sukses.
     */
    public function store(Request $request)
    {
        // Validasi inputan dari form
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'telepon' => 'required',
        ]);

        // Simpan data ke database
        Penerbit::create($request->all());

        // Kembali ke halaman form dengan notifikasi sukses
        return redirect()->back()->with('success', 'Data penerbit berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit data penerbit berdasarkan ID.
     */
    public function edit($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('penerbit'));
    }

    /**
     * Memperbarui data penerbit berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($request->all());
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil diperbarui');
    }

    /**
     * Menghapus data penerbit berdasarkan ID.
     */
    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil dihapus');
    }
}
