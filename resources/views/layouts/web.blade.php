<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LIMA')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}">

    <!-- Primary Meta Tags -->
    <meta name="title" content="LIMA - Liga Mahasiswa Indonesia">
    <meta name="description"
        content="LIMA adalah liga olahraga antar mahasiswa terbesar di Indonesia yang mempromosikan sportivitas dan prestasi mahasiswa.">
    <meta name="keywords"
        content="Liga Mahasiswa, LIMA, olahraga mahasiswa, turnamen kampus, basket mahasiswa, sepak bola mahasiswa, sport Indonesia">
    <meta name="author" content="LIMA Indonesia">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="LIMA - Liga Mahasiswa Indonesia">
    <meta property="og:description"
        content="Kompetisi olahraga terbesar antar mahasiswa di Indonesia. LIMA memajukan bakat muda melalui kompetisi profesional.">
    <meta property="og:image" content="{{ asset('assets/img/seo/cover.jpg') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="LIMA - Liga Mahasiswa Indonesia">
    <meta name="twitter:description"
        content="Kompetisi olahraga terbesar antar mahasiswa di Indonesia. LIMA memajukan bakat muda melalui kompetisi profesional.">
    <meta name="twitter:image" content="{{ asset('assets/img/seo/cover.jpg') }}">

    <!-- Schema.org Markup -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "LIMA - Liga Mahasiswa Indonesia",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('assets/img/limalogo.png') }}",
      "sameAs": [
        "{{ $WebContact->facebook ?? '' }}",
        "{{ $WebContact->instagram ?? '' }}",
        "{{ $WebContact->twitter ?? '' }}",
        "{{ $WebContact->youtube ?? '' }}"
      ]
    }
    </script>

    <!-- Stylesheets & Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/custom/css/web/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    @php
        $currentRoute = Route::currentRouteName();
    @endphp

    <style>
        .nav-links ul {
            display: flex;
            list-style: none;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        .nav-links ul li a {
            color: #111;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            padding: 8px 12px;
            border-bottom: 2px solid transparent;
            transition: color 0.3s ease, border-bottom 0.3s ease;
        }

        .nav-links ul li a.active {
            color: #e02a26;
            border-bottom: 2px solid #e02a26;
        }

        .nav-links ul li a:hover {
            color: #e02a26;
        }

        /* Dropdown Styling */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* Icon Styling */
        .dropdown-content a {
            font-size: 16px;
            padding: 8px 16px;
        }

        .navbar-language i {
            font-size: 20px;
            cursor: pointer;
        }

        .dropdown-label {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dropdown-label i {
            font-size: 20px;
        }

        .dropdown-label span {
            font-size: 16px;
        }

        /* Mobile Adjustments */
        @media (max-width: 768px) {
            .navbar-language {
                display: none;
                /* Hide language dropdown in navbar for mobile */
            }

            .sidebar .language-select {
                display: block;
                /* Show language dropdown in sidebar */
                padding: 16px;
            }
        }
    </style>

    <header class="navbar">
        <div class="container">
            <div class="logo" style="margin-right: auto;">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/limalogo.png') }}" alt="LIMA Logo" class="nav-logo">
                </a>
            </div>

            <nav class="nav-links" id="navLinks">
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ $currentRoute === 'home' ? 'active' : '' }}">Home</a>
                    </li>
                    <li><a href="{{ route('about') }}" class="{{ $currentRoute === 'about' ? 'active' : '' }}">About
                            Us</a></li>
                    <li><a href="{{ route('milestones') }}"
                            class="{{ $currentRoute === 'milestones' ? 'active' : '' }}">Milestone</a></li>
                    <li><a href="{{ route('gallery') }}"
                            class="{{ $currentRoute === 'gallery' ? 'active' : '' }}">Gallery</a></li>
                    <li><a href="{{ route('news') }}"
                            class="{{ $currentRoute === 'news' ? 'active' : '' }}">Newsroom</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="{{ $currentRoute === 'contact' ? 'active' : '' }}">Contact</a></li>
                </ul>
            </nav>

            <!-- Language Dropdown in Navbar -->
            <div class="dropdown navbar-language" id="navbarLanguage">
                <div class="dropdown-label">
                    <i class="fa-solid fa-globe"></i>
                    <span>English</span> <!-- Default Language -->
                </div>
                <div class="dropdown-content">
                    <a href="#">🇬🇧 English</a>
                    <a href="#">🇮🇩 Indonesia</a>
                </div>
            </div>

            <button class="menu-toggle" id="menuToggle" aria-label="Open menu">
                &#9776;
            </button>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <button class="close-sidebar" id="closeSidebar" aria-label="Close sidebar">&times;</button>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('milestones') }}">Milestone</a></li>
            <li><a href="{{ route('gallery') }}">Gallery</a></li>
            <li><a href="{{ route('news') }}">Newsroom</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>

        <!-- Language Dropdown in Sidebar -->
        <div class="language-select">
            <i class="fa-solid fa-globe"></i>
            <span>English</span> <!-- Default Language -->
            <div class="dropdown-content">
                <a href="#">🇬🇧 English</a>
                <a href="#">🇮🇩 Indonesia</a>
            </div>
        </div>
    </aside>

    <!-- Overlay -->
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer-top">
            <div class="footer-left">
                <div class="logo">
                    <img src="{{ asset('assets/img/lima-white.png') }}" alt="LIMA Logo" class="footer-logo">
                </div>
                <div class="footer-address">
                    PT. BINA MAHASISWA INDONESIA<br>
                    <p>{{ $WebContact->address ?? 'Alamat belum tersedia.' }}</p>
                </div>
            </div>
            <div class="footer-nav">
                <ul>
                    <li><strong>Who Are We</strong></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="#">Vision and Mission</a></li>
                </ul>
                <ul>
                    <li><strong>Info</strong></li>
                    <li><a href="{{ route('news') }}">Newsroom</a></li>
                    <li><a href="#">Press Release</a></li>
                </ul>
                <ul>
                    <li><strong>Find Us</strong></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-middle">
            <!-- Language Dropdown in Footer -->
            <div class="language-select">
                <i class="fa-solid fa-globe"></i>
                <span>English</span> <!-- Default Language -->
                <div class="dropdown-content">
                    <a href="#">🇬🇧 English</a>
                    <a href="#">🇮🇩 Indonesia</a>
                </div>
            </div>

            <div class="socials">
                @if (!empty($WebContact->facebook))
                    <a href="{{ $WebContact->facebook }}" aria-label="Facebook" target="_blank" rel="noopener">
                        <img src="{{ asset('assets/img/sosmed/fb.svg') }}" alt="Facebook"
                            style="width:24px; height:24px;" />
                    </a>
                @endif
                @if (!empty($WebContact->instagram))
                    <a href="{{ $WebContact->instagram }}" aria-label="Instagram" target="_blank" rel="noopener">
                        <img src="{{ asset('assets/img/sosmed/ig.svg') }}" alt="Instagram"
                            style="width:24px; height:24px;" />
                    </a>
                @endif
                @if (!empty($WebContact->twitter))
                    <a href="{{ $WebContact->twitter }}" aria-label="X Twitter" target="_blank" rel="noopener">
                        <img src="{{ asset('assets/img/sosmed/x.svg') }}" alt="X Twitter"
                            style="width:24px; height:24px;" />
                    </a>
                @endif
                @if (!empty($WebContact->youtube))
                    <a href="{{ $WebContact->youtube }}" aria-label="YouTube" target="_blank" rel="noopener">
                        <img src="{{ asset('assets/img/sosmed/youtube.svg') }}" alt="YouTube"
                            style="width:24px; height:24px;" />
                    </a>
                @endif
                @if (!empty($WebContact->tiktok))
                    <a href="{{ $WebContact->tiktok }}" aria-label="TikTok" target="_blank" rel="noopener">
                        <img src="{{ asset('assets/img/sosmed/tiktok.svg') }}" alt="TikTok"
                            style="width:24px; height:24px;" />
                    </a>
                @endif
            </div>
        </div>

        <div class="footer-bottom">
            <div class="privacy-policy"><a href="{{ route('privacy.policy') }}">Privacy Policy</a></div>
            <div class="copyright">© 2025 Liga Mahasiswa, Inc.</div>
        </div>
    </footer>

</body>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const closeSidebar = document.getElementById('closeSidebar');

    menuToggle.addEventListener('click', () => {
        sidebar.classList.add('active');
    });

    closeSidebar.addEventListener('click', () => {
        sidebar.classList.remove('active');
    });

    window.addEventListener('click', function(e) {
        if (sidebar.classList.contains('active') && !sidebar.contains(e.target) && e.target !== menuToggle) {
            sidebar.classList.remove('active');
        }
    });
</script>

</html>
