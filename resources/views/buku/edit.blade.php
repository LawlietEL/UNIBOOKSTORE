<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>ID:</label><br>
        <input type="text" name="id" value="{{ $buku->id }}" readonly><br>
        <label>Nama Buku:</label><br>
        <input type="text" name="nama_buku" value="{{ $buku->nama_buku }}" required><br>
        <label>Kategori:</label><br>
        <input type="text" name="kategori" value="{{ $buku->kategori }}" required><br>
        <label>Harga:</label><br>
        <input type="number" name="harga" value="{{ $buku->harga }}" required><br>
        <label>Stok:</label><br>
        <input type="number" name="stok" value="{{ $buku->stok }}" required><br>
        <label>Penerbit:</label><br>
        <select name="penerbit_id" required>
            @foreach($penerbit as $p)
                <option value="{{ $p->id }}" {{ $buku->penerbit_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
            @endforeach
        </select><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
