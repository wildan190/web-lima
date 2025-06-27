<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - PT. BINA MAHASISWA INDONESIA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin.css') }}">
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
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggle = document.getElementById('menu-toggle');
        const sidebar = document.querySelector('.sidebar');

        toggle.addEventListener('click', function () {
            sidebar.classList.toggle('active');
        });

        // Optional: close sidebar when clicking outside (mobile only)
        document.addEventListener('click', function(e) {
            if (!sidebar.contains(e.target) && !toggle.contains(e.target) && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
    });
</script>


</html>
