{{-- Menggunakan layout utama --}}
@extends('layouts.main')

{{-- Judul halaman untuk <title> --}}
@section('title', 'Edit Penerbit')

{{-- Konten halaman --}}
@section('content')
<div class="container mt-3">
    <div class="card shadow">
        {{-- Header berwarna biru dengan ikon dan judul --}}
        <div class="custom-header" style="background-color: #0d6efd; padding: 15px 20px; color: white; border-top-left-radius: 8px; border-top-right-radius: 8px; display: flex; align-items: center;">
            <span class="icon" style="font-size: 2rem; margin-right: 10px;">📘</span>
            <span class="title" style="font-size: 1.5rem; font-weight: bold;">Edit Penerbit</span>
        </div>

        {{-- Body berisi form --}}
        <div class="card-body">
            {{-- Form update data penerbit --}}
            <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
                @csrf {{-- Token keamanan --}}
                @method('PUT') {{-- Method spoofing untuk update --}}

                {{-- ID Penerbit (readonly agar tidak bisa diubah) --}}
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" name="id" id="id" class="form-control" value="{{ $penerbit->id }}" readonly>
                </div>

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $penerbit->nama }}" required>
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="2" required>{{ $penerbit->alamat }}</textarea>
                </div>

                {{-- Kota --}}
                <div class="mb-3">
                    <label for="kota" class="form-label">Kota</label>
                    <input type="text" name="kota" id="kota" class="form-control" value="{{ $penerbit->kota }}" required>
                </div>

                {{-- Telepon --}}
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" value="{{ $penerbit->telepon }}" required>
                </div>

                {{-- Tombol aksi --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ route('penerbit.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
