<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - PT. BINA MAHASISWA INDONESIA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    @stack('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
        <div class="container-fluid">
            <button class="btn btn-outline-secondary me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar" aria-controls="adminSidebar">
                <i class="fas fa-bars"></i>
            </button>
            <span class="navbar-brand">@yield('title', 'Admin')</span>
        </div>
    </nav>

    @include('layouts.components.sidebar')

    <main class="container-fluid py-4">
        @include('layouts.components.admin-breadcrumb')
        @yield('content')
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-HoAqNQOgH9Xh8FzXoQ2t1qS4HqN4k1QbP6E9g9mJ2Vx0Z0mS8l6iQjO1bXoPp3aK" crossorigin="anonymous"></script>
@stack('scripts')


</html>
