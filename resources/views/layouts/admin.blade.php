<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - PT. BINA MAHASISWA INDONESIA</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')

<style>
/* ====== GLOBAL ====== */
body{
    background:#f2f2f2;
    color:#000;
}

/* ====== NAVBAR ====== */
.navbar{
    background:#000 !important;
    color:#fff;
    z-index:1030;
}
.navbar .navbar-brand{
    color:#fff !important;
}
.navbar .btn{
    background:#fff;
    color:#000;
}

/* ====== SIDEBAR ====== */
#adminSidebar{
    background:#111 !important;
    color:#fff;
}

/* Hapus shadow bawaan offcanvas */
.offcanvas{
    box-shadow:none !important;
}

/* Link Style */
#adminSidebar .nav-link{
    color:#bbb !important;
}
#adminSidebar .nav-link.active{
    background:#fff !important;
    color:#000 !important;
    font-weight:bold;
}

/* collapsible icon */
#adminSidebar .dropdown-toggle::after{
    filter:invert(1);
}

/* ====== DESKTOP MODE ====== */
@media (min-width: 992px){

    /* jadikan sidebar fixed */
    #adminSidebar{
        position:fixed;
        top:56px; /* tinggi navbar */
        bottom:0;
        transform:none !important;
        visibility:visible !important;
        z-index:1020;
    }

    /* geser konten */
    main.container-fluid{
        margin-left:350px;
        padding-top:90px;
    }

    /* hilangkan backdrop */
    .offcanvas-backdrop{
        display:none !important;
    }

    /* tombol hamburger hilang */
    .navbar .btn[data-bs-toggle="offcanvas"]{
        display:none;
    }
}

/* ====== CONTENT CARD ====== */
.bg-white{
    background:#fff !important;
    color:#000;
}
</style>

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top shadow-sm">
  <div class="container-fluid">

      <button class="btn d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar">
          <i class="fas fa-bars"></i>
      </button>

      <span class="navbar-brand fw-bold">
        @yield('title', 'Admin Panel')
      </span>

  </div>
</nav>


@include('layouts.components.sidebar')


<!-- MAIN CONTENT -->
<main class="container-fluid">

    <div class="bg-white rounded-3 shadow-sm p-4">

        @include('layouts.components.admin-breadcrumb')

        @yield('content')

    </div>

</main>


<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>
