<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku</h1>

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <label>ID:</label><br>
        <input type="text" name="id" required><br>
        <label>Nama Buku:</label><br>
        <input type="text" name="nama_buku" required><br>
        <label>Kategori:</label><br>
        <input type="text" name="kategori" required><br>
        <label>Harga:</label><br>
        <input type="number" name="harga" required><br>
        <label>Stok:</label><br>
        <input type="number" name="stok" required><br>
        <label>Penerbit:</label><br>
        <select name="penerbit_id" required>
            @foreach($penerbit as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
