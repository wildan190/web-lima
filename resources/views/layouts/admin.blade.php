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

body{
    background:#f2f2f2;
    color:#000;
    overflow-x:hidden;   /* ⛔ cegah scroll horizontal */
}

/* ===== NAVBAR ===== */
.navbar{
    background:#000 !important;
    color:#fff;
}

/* ===== SIDEBAR ===== */
#adminSidebar{
    background:#111 !important;
    color:#fff;
    width:280px !important;   /* ⛔ fix width */
}

.offcanvas{
    box-shadow:none !important;
}

#adminSidebar .nav-link{
    color:#bbb !important;
}
#adminSidebar .nav-link.active{
    background:#fff !important;
    color:#000 !important;
}

/* ===== DESKTOP MODE ===== */
@media (min-width: 992px){

    #adminSidebar{
        position:fixed;
        top:56px;
        bottom:0;
        transform:none !important;
        visibility:visible !important;
        z-index:1020;
    }

    main.container-fluid{
        margin-left:280px !important; /* ⛔ sama dengan sidebar */
        padding-top:90px;
        max-width:calc(100% - 280px);
    }

    .offcanvas-backdrop{
        display:none !important;
    }

    .navbar .btn[data-bs-toggle="offcanvas"]{
        display:none;
    }
}

/* chart container */
.chart-container{
    width:100%;
    max-width:100%;
}

/* prevent bootstrap row overflow */
.row{
    margin-right:0;
    margin-left:0;
}

</style>

</head>
<body>

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

<main class="container-fluid">
    <div class="bg-white rounded-3 shadow-sm p-4">

        @include('layouts.components.admin-breadcrumb')

        @yield('content')

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>
