<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - PT. BINA MAHASISWA INDONESIA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
    <style>
        body { background-color: #f8f9fa; }
        main { min-height: calc(100vh - 70px); }
    </style>
</head>
<body class="bg-light">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm fixed-top">
        <div class="container-fluid">
            <button class="btn btn-primary me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar">
                <i class="fas fa-bars"></i>
            </button>
            <span class="navbar-brand mb-0 h1 fw-bold text-primary">@yield('title', 'Admin Panel')</span>
        </div>
    </nav>

    @include('layouts.components.sidebar')

    <main class="container-fluid pt-5 mt-5">
        <div class="bg-white rounded-3 shadow-sm p-4">
            @include('layouts.components.admin-breadcrumb')
            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>