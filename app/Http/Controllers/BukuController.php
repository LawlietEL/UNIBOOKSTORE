<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Penerbit;

class BukuController extends Controller
{
    /**
     * Menampilkan halaman admin berisi daftar seluruh buku.
     * Data relasi penerbit ditampilkan dengan eager loading.
     */
    public function index()
    {
        $buku = Buku::with('penerbit')->get();
        return view('admin', compact('buku'));
    }

    /**
     * Menampilkan form tambah buku baru.
     * Mengambil semua data penerbit untuk dropdown.
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        return view('buku.create', compact('penerbit'));
    }

    /**
     * Menyimpan data buku setelah form tambah disubmit.
     * Jika data tidak lengkap, validasi akan gagal dan kembali ke form.
     * Jika berhasil, tetap di form tambah buku dengan pesan sukses.
     */
    public function store(Request $request)
    {
        // Validasi form input
        $request->validate([
            'id' => 'required',
            'nama_buku' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'penerbit_id' => 'required',
        ], [
            'required' => 'Data buku belum lengkap, silahkan lengkapi!'
        ]);

        // Simpan ke database jika valid
        Buku::create($request->all());

        // Kembali ke halaman tambah buku dengan notifikasi sukses
        return redirect()->back()->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit buku.
     * Mengambil data buku berdasarkan ID dan seluruh penerbit.
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $penerbit = Penerbit::all();
        return view('buku.edit', compact('buku', 'penerbit'));
    }

    /**
     * Menyimpan hasil edit buku berdasarkan ID.
     * Redirect kembali ke halaman admin dengan notifikasi sukses.
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Menghapus buku berdasarkan ID.
     * Redirect ke admin dengan pesan sukses.
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }

    /**
     * Menampilkan daftar buku yang stok-nya kurang dari 10.
     * Halaman digunakan untuk kebutuhan pengadaan.
     */
    public function pengadaan()
    {
        $buku = Buku::with('penerbit')->where('stok', '<', 10)->get();
        return view('pengadaan', compact('buku'));
    }
}
