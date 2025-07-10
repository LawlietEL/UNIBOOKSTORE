<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenerbitController;
use App\Models\Buku;

// HOME: Tampilkan daftar buku dengan fitur pencarian
Route::get('/', function (Request $request) {
    $query = Buku::with('penerbit');

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('id', 'like', "%{$search}%")
              ->orWhere('nama_buku', 'like', "%{$search}%")
              ->orWhere('kategori', 'like', "%{$search}%");
        });
    }

    $buku = $query->get();
    return view('home', compact('buku'));
})->name('home');

// ADMIN: Halaman pengelolaan data buku
Route::get('/admin', function () {
    $buku = Buku::with('penerbit')->get();
    return view('admin', compact('buku'));
})->name('admin');

// PENGADAAN: Tampilkan daftar buku dengan stok < 10
Route::get('/pengadaan', [BukuController::class, 'pengadaan'])->name('pengadaan');

// Resource route untuk buku & penerbit
Route::resource('buku', BukuController::class);
Route::resource('penerbit', PenerbitController::class);
