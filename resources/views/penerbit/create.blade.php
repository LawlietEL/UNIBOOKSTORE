@extends('layouts.main') 
{{-- Menggunakan layout utama --}}

@section('title', 'Tambah Penerbit') 
{{-- Judul halaman --}}

@section('content') 
{{-- Awal konten utama --}}

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
        {{-- Kartu input --}}

        <div class="custom-header bg-primary text-white p-3 d-flex align-items-center" style="border-top-left-radius: 8px; border-top-right-radius: 8px;">
            <span class="fs-3 me-2">🏢</span> 
            <h4 class="mb-0">Tambah Penerbit Baru</h4> 
        </div>

        <div class="card-body"> 
            <form action="{{ route('penerbit.store') }}" method="POST"> 
                @csrf 

                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" name="id" id="id" class="form-control" value="{{ old('id') }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="2" required>{{ old('alamat') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="kota" class="form-label">Kota</label>
                    <input type="text" name="kota" id="kota" class="form-control" value="{{ old('kota') }}" required>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" value="{{ old('telepon') }}" required>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('penerbit.index') }}" class="btn btn-secondary me-2">Kembali</a> 
                    <button type="submit" class="btn btn-success">Simpan</button> 
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Script untuk menghilangkan notifikasi otomatis setelah 2 detik --}}
<script>
    setTimeout(() => {
        const success = document.getElementById('alertSuccess');
        const error = document.getElementById('alertError');
        if (success) success.remove();
        if (error) error.remove();
    }, 2000);
</script>
@endsection
