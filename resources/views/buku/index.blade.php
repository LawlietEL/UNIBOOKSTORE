<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku - UNIBOOKSTORE</title>
</head>
<body>
    <h1>Daftar Buku</h1>

    <a href="{{ route('buku.create') }}">+ Tambah Buku</a> | 
    <a href="{{ route('pengadaan') }}">📦 Pengadaan Buku</a> |
    <a href="{{ route('penerbit.index') }}">📚 Data Penerbit</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nama Buku</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Penerbit</th>
            <th>Aksi</th>
        </tr>
        @foreach($buku as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama_buku }}</td>
            <td>{{ $item->kategori }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->stok }}</td>
            <td>{{ $item->penerbit->nama }}</td>
            <td>
                <a href="{{ route('buku.edit', $item->id) }}">Edit</a> |
                <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
