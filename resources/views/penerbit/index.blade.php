<!DOCTYPE html>
<html>
<head>
    <title>Daftar Penerbit</title>
</head>
<body>
    <h1>Data Penerbit</h1>

    <a href="{{ route('penerbit.create') }}">+ Tambah Penerbit</a> |
    <a href="{{ route('buku.index') }}">📖 Data Buku</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        @foreach($penerbit as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->kota }}</td>
            <td>{{ $p->telepon }}</td>
            <td>
                <a href="{{ route('penerbit.edit', $p->id) }}">Edit</a> |
                <form action="{{ route('penerbit.destroy', $p->id) }}" method="POST" style="display:inline">
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
