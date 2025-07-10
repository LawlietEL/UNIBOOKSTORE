@extends('layouts.main')

@section('title', 'Home')

@section('content')
<div class="container">
    <h1 class="text-primary mb-4">📚 Daftar Buku</h1>

    <form method="GET" action="{{ route('home') }}" class="mb-4 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari berdasarkan ID, Nama, Kategori, atau Penerbit..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>

    @include('buku.index')
</div>
@endsection
