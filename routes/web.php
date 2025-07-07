<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenerbitController;

// Halaman utama menampilkan daftar buku
Route::get('/', [BukuController::class, 'index'])->name('home');

// Resource route untuk buku (CRUD otomatis)
Route::resource('buku', BukuController::class);

// Resource route untuk penerbit
Route::resource('penerbit', PenerbitController::class);

// Halaman pengadaan buku (stok rendah)
Route::get('/pengadaan', [BukuController::class, 'pengadaan'])->name('pengadaan');
