@if(request()->has('search') && $buku->isEmpty())
    <div class="alert alert-warning">
        Buku yang Anda cari tidak ada.
    </div>
@else
    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Buku</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Penerbit</th>
                @unless(request()->routeIs('home'))
                    <th>Aksi</th>
                @endunless
            </tr>
        </thead>
        <tbody>
        @foreach($buku as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_buku }}</td>
                <td>{{ $item->kategori }}</td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->penerbit->nama }}</td>
                @unless(request()->routeIs('home'))
                    <td>
                        <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('buku.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                    </td>
                @endunless
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
