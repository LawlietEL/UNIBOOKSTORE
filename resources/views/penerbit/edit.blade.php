<!DOCTYPE html>
<html>
<head>
    <title>Edit Penerbit</title>
</head>
<body>
    <h1>Edit Penerbit</h1>

    <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>ID:</label><br>
        <input type="text" name="id" value="{{ $penerbit->id }}" readonly><br>
        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $penerbit->nama }}" required><br>
        <label>Alamat:</label><br>
        <textarea name="alamat" required>{{ $penerbit->alamat }}</textarea><br>
        <label>Kota:</label><br>
        <input type="text" name="kota" value="{{ $penerbit->kota }}" required><br>
        <label>Telepon:</label><br>
        <input type="text" name="telepon" value="{{ $penerbit->telepon }}" required><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
