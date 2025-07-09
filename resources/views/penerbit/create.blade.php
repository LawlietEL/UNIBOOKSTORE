<!DOCTYPE html>
<html>
<head>
    <title>Tambah Penerbit</title>
</head>
<body>
    <h1>Tambah Penerbit</h1>

    <form action="{{ route('penerbit.store') }}" method="POST">
        @csrf
        <label>ID:</label><br>
        <input type="text" name="id" required><br>
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br>
        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br>
        <label>Kota:</label><br>
        <input type="text" name="kota" required><br>
        <label>Telepon:</label><br>
        <input type="text" name="telepon" required><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
