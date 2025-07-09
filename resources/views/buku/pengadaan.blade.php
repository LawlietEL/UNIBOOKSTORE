<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pengadaan Buku - UNIBOOKSTORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h4 class="mb-0">📦 Daftar Buku Stok Rendah</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('buku.index') }}" class="btn btn-secondary mb-3">← Kembali ke Daftar Buku</a>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
