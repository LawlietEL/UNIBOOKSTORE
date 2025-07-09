<!DOCTYPE html>
<html>
<head>
    <title>Pengadaan Buku</title>
</head>
<body>
    <h1>Daftar Buku Stok Rendah</h1>

    <a href="{{ route('buku.index') }}">⬅ Kembali ke Daftar Buku</a>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nama Buku</th>
            <th>Stok</th>
            <th>Penerbit</th>
        </tr>
        @foreach($buku as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama_buku }}</td>
            <td>{{ $item->stok }}</td>
            <td>{{ $item->penerbit->nama }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
