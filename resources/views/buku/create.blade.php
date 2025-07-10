{{-- Gunakan layout utama --}}
@extends('layouts.main')

{{-- Judul halaman --}}
@section('title', 'Tambah Buku')

{{-- Konten --}}
@section('content')
<div class="container mt-3">

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div id="alertSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Notifikasi error validasi --}}
    @if($errors->any())
        <div id="alertError" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="card shadow">
        {{-- Header --}}
        <div class="custom-header" style="background-color: #218c5f; padding: 15px 20px; color: white; border-top-left-radius: 8px; border-top-right-radius: 8px; display: flex; align-items: center;">
            <span class="icon" style="font-size: 2.2rem; margin-right: 10px;">📘</span>
            <span class="title" style="font-size: 1.75rem; font-weight: bold;">Tambah Buku Baru</span>
        </div>

        {{-- Form --}}
        <div class="card-body">
            <form action="{{ route('buku.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="id" class="form-label">ID Buku</label>
                    <input type="text" name="id" id="id" class="form-control" value="{{ old('id') }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control" value="{{ old('kategori') }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_buku" class="form-label">Nama Buku</label>
                    <input type="text" name="nama_buku" id="nama_buku" class="form-control" value="{{ old('nama_buku') }}" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" required>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') }}" required>
                </div>

                <div class="mb-3">
                    <label for="penerbit_id" class="form-label">Penerbit</label>
                    <select name="penerbit_id" id="penerbit_id" class="form-select" required>
                        <option disabled selected>-- Pilih Penerbit --</option>
                        @foreach($penerbit as $p)
                            <option value="{{ $p->id }}" {{ old('penerbit_id') == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Script agar notifikasi hilang otomatis --}}
<script>
    setTimeout(() => {
        const success = document.getElementById('alertSuccess');
        const error = document.getElementById('alertError');
        if (success) success.remove();
        if (error) error.remove();
    }, 2000);
</script>
@endsection
