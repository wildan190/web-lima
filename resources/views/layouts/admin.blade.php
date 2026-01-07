<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ICON -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container-fluid">
        <button class="btn btn-outline-light d-lg-none"
                data-bs-toggle="offcanvas"
                data-bs-target="#sidebar">
            <i class="fas fa-bars"></i>
        </button>

        <span class="navbar-brand fw-bold">
            @yield('title','Admin Panel')
        </span>
    </div>
</nav>


<!-- SIDEBAR -->
<div class="offcanvas-lg offcanvas-start bg-dark text-white"
     tabindex="-1"
     id="sidebar">

    <div class="offcanvas-header border-bottom border-secondary">
        <h6 class="m-0">Menu</h6>
        <button class="btn-close btn-close-white d-lg-none"
                data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body p-2">
        @include('layouts.components.sidebar')
    </div>
</div>


<!-- PAGE LAYOUT -->
<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR SPACER DESKTOP -->
        <div class="col-lg-3 col-xl-2 d-none d-lg-block"></div>

        <!-- MAIN CONTENT -->
        <main class="col-12 col-lg-9 col-xl-10 pt-5 mt-3">

            <div class="bg-white shadow-sm rounded-4 p-4">

                @include('layouts.components.admin-breadcrumb')

                @yield('content')

            </div>

        </main>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></scr
