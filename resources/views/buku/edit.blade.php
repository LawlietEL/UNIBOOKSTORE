<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Edit Buku</h2>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')
        <div class="mb-3"><label>ID</label><input type="text" name="id" value="{{ $buku->id }}" class="form-control" readonly></div>
        <div class="mb-3"><label>Nama Buku</label><input type="text" name="nama_buku" value="{{ $buku->nama_buku }}" class="form-control" required></div>
        <div class="mb-3"><label>Kategori</label><input type="text" name="kategori" value="{{ $buku->kategori }}" class="form-control" required></div>
        <div class="mb-3"><label>Harga</label><input type="number" name="harga" value="{{ $buku->harga }}" class="form-control" required></div>
        <div class="mb-3"><label>Stok</label><input type="number" name="stok" value="{{ $buku->stok }}" class="form-control" required></div>
        <div class="mb-3">
            <label>Penerbit</label>
            <select name="penerbit_id" class="form-select">
                @foreach($penerbit as $p)
                    <option value="{{ $p->id }}" {{ $buku->penerbit_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
