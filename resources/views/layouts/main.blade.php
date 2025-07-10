<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - UNIBOOKSTORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #343a40;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: white !important;
        }
        .nav-link {
            color: white !important;
        }
        .nav-link:hover {
            color: #f8f9fa !important;
        }

        /* Tambahkan jarak konsisten ke konten utama */
        .content-wrapper {
            padding: 30px;
            margin-top: 1 rem; /* ≈ mt-4 */
        }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">UNIBOOKSTORE</a>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">HOME</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin') }}">ADMIN</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pengadaan') }}">PENGADAAN</a></li>
      </ul>
    </div>
  </div>
</nav>

{{-- Konten halaman --}}
<div class="content-wrapper">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
