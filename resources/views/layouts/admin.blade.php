<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - PT. BINA MAHASISWA INDONESIA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/custom/css/sidebar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    @stack('styles')
</head>

<body>
    <div class="admin-container">
        @include('layouts.components.sidebar')

        <div class="admin-content">
            <div class="admin-header">
                <button class="menu-toggle" id="menu-toggle">&#9776;</button>
                <h2>@yield('title', 'Dashboard')</h2>
            </div>

            <div class="admin-body">
                @yield('content')
                @stack('scripts')
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggle = document.getElementById('menu-toggle');
        const sidebar = document.querySelector('.sidebar');

        toggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });

        document.addEventListener('click', function(e) {
            if (!sidebar.contains(e.target) && !toggle.contains(e.target) && sidebar.classList.contains(
                    'active')) {
                sidebar.classList.remove('active');
            }
        });
    });
</script>


</html>
