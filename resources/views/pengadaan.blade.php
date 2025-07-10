@extends('layouts.main')

@section('title', 'Pengadaan')

@section('content')
<div class="container mt-2">
    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h4 class="mb-0">📦 Daftar Buku Stok Rendah</h4>
        </div>
        <div class="card-body">
            @if($buku->isEmpty())
                <div class="alert alert-success">
                    Semua stok buku aman! Tidak ada pengadaan yang dibutuhkan saat ini.
                </div>
            @else
                <table class="table table-bordered table-hover bg-white">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Kategori</th>
                            <th>Nama Buku</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>ID Penerbit</th>
                            <th>Penerbit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buku as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->nama_buku }}</td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td><span class="badge bg-danger">{{ $item->stok }}</span></td>
                            <td>{{ $item->penerbit->id }}</td>
                            <td>{{ $item->penerbit->nama }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
