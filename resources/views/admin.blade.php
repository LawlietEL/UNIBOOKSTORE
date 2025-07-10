@extends('layouts.main')

@section('title', 'Admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">📚 Daftar Buku</h1>
        <div>
            <a href="{{ route('buku.create') }}" class="btn btn-success me-2">+ Tambah Buku</a>
            <a href="{{ route('penerbit.index') }}" class="btn btn-primary">📘 Data Penerbit</a>
        </div>
    </div>

    @include('buku.index')
</div>
@endsection
