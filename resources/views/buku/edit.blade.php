{{-- Extend layout utama --}}
@extends('layouts.main')

{{-- Atur judul halaman (untuk <title> di layout) --}}
@section('title', 'Edit Buku')

{{-- Konten utama halaman --}}
@section('content')
<div class="container mt-5">
    <div class="card shadow">
        {{-- Bagian header berwarna biru dengan ikon dan judul --}}
        <div class="custom-header" style="background-color: #0d6efd; padding: 15px 20px; color: white; border-top-left-radius: 8px; border-top-right-radius: 8px; display: flex; align-items: center;">
            <span class="icon" style="font-size: 2rem; margin-right: 10px;">📗</span>
            <span class="title" style="font-size: 1.5rem; font-weight: bold;">Edit Buku</span>
        </div>

        {{-- Card Body berisi form --}}
        <div class="card-body">
            {{-- Form untuk update buku --}}
            <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                @csrf {{-- Token keamanan agar form tidak bisa dikirim dari luar --}}
                @method('PUT') {{-- Metode form diubah menjadi PUT untuk update data --}}

                {{-- ID Buku (read-only karena ID tidak boleh diubah) --}}
                <div class="mb-3">
                    <label for="id" class="form-label">ID Buku</label>
                    <input type="text" name="id" id="id" class="form-control" value="{{ $buku->id }}" readonly>
                </div>

                {{-- Nama Buku --}}
                <div class="mb-3">
                    <label for="nama_buku" class="form-label">Nama Buku</label>
                    <input type="text" name="nama_buku" id="nama_buku" class="form-control" value="{{ $buku->nama_buku }}" required>
                </div>

                {{-- Kategori --}}
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control" value="{{ $buku->kategori }}" required>
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" value="{{ $buku->harga }}" required>
                </div>

                {{-- Stok --}}
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control" value="{{ $buku->stok }}" required>
                </div>

                {{-- Dropdown untuk memilih penerbit --}}
                <div class="mb-3">
                    <label for="penerbit_id" class="form-label">Penerbit</label>
                    <select name="penerbit_id" id="penerbit_id" class="form-select" required>
                        @foreach($penerbit as $p)
                            {{-- Pilihan otomatis terpilih jika sama dengan data yang tersimpan --}}
                            <option value="{{ $p->id }}" {{ $buku->penerbit_id == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol aksi: Batal kembali ke admin, Submit untuk update --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
