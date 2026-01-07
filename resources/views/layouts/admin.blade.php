<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... head lain ... -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        /* Sidebar selalu terbuka di desktop (lg ke atas) */
        @media (min-width: 992px) {
            #adminSidebar {
                transform: translateX(0) !important; /* Pastikan tidak tersembunyi */
                position: fixed;
                top: 0;
                bottom: 0;
                z-index: 1020;
            }

            /* Geser content utama agar tidak tertutup sidebar */
            main.container-fluid {
                margin-left: 350px; /* Sesuaikan dengan lebar sidebar */
                transition: margin-left 0.3s ease;
            }

            /* Navbar tombol hamburger tidak perlu di desktop */
            .navbar .btn[data-bs-toggle="offcanvas"] {
                display: none;
            }
        }

        /* Optional: tambah transisi halus saat resize */
        main.container-fluid {
            transition: margin-left 0.3s ease;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm fixed-top">
        <div class="container-fluid">
            <button class="btn btn-primary me-3 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar">
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>