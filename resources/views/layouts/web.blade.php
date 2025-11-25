<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="refresh" content="1200" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'LIMA')</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/homescreen/favicon.ico') }}" />

    <!-- primary meta tags -->
    <meta name="title" content="LIMA - Liga Mahasiswa Indonesia" />
    <meta name="description"
        content="LIMA adalah liga olahraga mahasiswa terbesar di Indonesia, menghadirkan kompetisi resmi antar kampus, mengembangkan potensi atlet muda, dan mempromosikan sportivitas olahraga mahasiswa di tingkat nasional." />
    <meta name="keywords"
        content="Liga Mahasiswa, LIMA, LIMA Indonesia, olahraga mahasiswa, kompetisi olahraga kampus, liga kampus Indonesia, turnamen mahasiswa, basket mahasiswa, futsal mahasiswa, sepak bola mahasiswa, voli mahasiswa, badminton mahasiswa, olahraga kampus, sport mahasiswa Indonesia" />
    <meta name="author" content="LIMA Indonesia" />
    <meta name="copyright" content="LIMA - Liga Mahasiswa. All Rights Reserved" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- user agent crawler -->
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="googlebot-news" content="index, follow" />
    <meta name="msnbot" content="index, follow" />
    <meta name="webcrawlers" content="index, follow" />
    <meta name="spiders" content="index, follow" />

    <!-- open graph facebook -->
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="{{ isset($news->title) ? $news->title : 'LIMA - Liga Mahasiswa Indonesia' }}" />
    <meta property="og:description"
        content="{{ isset($news->content) ? Str::limit(strip_tags($news->content), 150) : 'LIMA adalah liga olahraga antar mahasiswa terbesar di Indonesia yang mempromosikan sportivitas dan prestasi mahasiswa.' }}" />
    <meta property="og:image" content="{{ asset('assets/img/seo-cover/og-facebook.png') }}" />

    <!-- open graph twitter/x -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="{{ url()->current() }}" />
    <meta name="twitter:title" content="{{ isset($news->title) ? $news->title : 'LIMA - Liga Mahasiswa Indonesia' }}" />
    <meta name="twitter:description"
        content="{{ isset($news->content) ? Str::limit(strip_tags($news->content), 150) : 'LIMA adalah liga olahraga antar mahasiswa terbesar di Indonesia yang mempromosikan sportivitas dan prestasi mahasiswa.' }}" />
    <meta name="twitter:image" content="{{ asset('assets/img/seo-cover/og-twitter.png') }}" />

    <!--android add to home screen-->
    <meta name="application-name" content="LIMA" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#E02A26" />
    <link rel="manifest" href="{{ asset('assets/js/data/manifest.json') }}" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/img/homescreen/favicon-16x16.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets/img/homescreen/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ asset('assets/img/homescreen/favicon-96x96.png') }}" />
    <link rel="icon" type="image/png" sizes="144x144"
        href="{{ asset('assets/img/homescreen/android-icon-144x144.png') }}" />
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('assets/img/homescreen/android-icon-192x192.png') }}" />

    <!--windows microsoft-->
    <meta name="msapplication-TileColor" content="#E02A26" />
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/homescreen/ms-icon-144x144.png') }}" />

    <!--apple add to home screen-->
    <meta name="apple-mobile-web-app-title" content="LIMA" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#E02A26" />

    <link rel="apple-touch-icon" href="{{ asset('assets/img/homescreen/apple-icon.png') }}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/homescreen/apple-icon-57x57.png') }}" />
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/homescreen/apple-icon-60x60.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/homescreen/apple-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/homescreen/apple-icon-76x76.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ asset('assets/img/homescreen/apple-icon-114x114.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ asset('assets/img/homescreen/apple-icon-120x120.png') }}" />
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ asset('assets/img/homescreen/apple-icon-144x144.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ asset('assets/img/homescreen/apple-icon-152x152.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/img/homescreen/apple-icon-180x180.png') }}" />
    <link rel="apple-touch-startup-image" href="{{ asset('assets/img/homescreen/apple-icon.png') }}" />

    <!-- ==== schema.org markup (UPGRADED) ==== -->

    <!-- ORGANIZATION SCHEMA -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "LIMA - Liga Mahasiswa Indonesia",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('assets/img/limalogo.png') }}",
      "description": "Organisasi liga olahraga mahasiswa terbesar di Indonesia.",
      "sameAs": [
        "{{ $WebContact->facebook ?? '' }}",
        "{{ $WebContact->instagram ?? '' }}",
        "{{ $WebContact->twitter ?? '' }}",
        "{{ $WebContact->youtube ?? '' }}"
      ],
      "contactPoint": [{
        "@type": "ContactPoint",
        "contactType": "Customer Support",
        "email": "{{ $WebContact->email ?? '' }}",
        "telephone": "{{ $WebContact->phone ?? '' }}",
        "areaServed": "ID"
      }]
    }
    </script>

    <!-- WEBSITE SCHEMA -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "url": "{{ url('/') }}",
      "name": "LIMA - Liga Mahasiswa Indonesia",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ url('/') }}/search?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>

    <!-- LOCAL BUSINESS SCHEMA -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "LIMA Indonesia",
      "image": "{{ asset('assets/img/limalogo.png') }}",
      "url": "{{ url('/') }}",
      "telephone": "{{ $WebContact->phone ?? '' }}",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "ID"
      }
    }
    </script>

    <!-- stylesheets & fonts -->
    <link rel="stylesheet" href="{{ asset('assets/custom/css/web/home.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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
                    <li><a href="{{ route('home') }}"
                            class="{{ $currentRoute === 'home' ? 'active' : '' }}">{{ __('messages.home') }}</a></li>
                    <li><a href="{{ route('about') }}"
                            class="{{ $currentRoute === 'about' ? 'active' : '' }}">{{ __('messages.about_us') }}</a>
                    </li>
                    <li><a href="{{ route('milestones') }}"
                            class="{{ $currentRoute === 'milestones' ? 'active' : '' }}">{{ __('messages.milestone') }}</a>
                    </li>
                    <li><a href="{{ route('gallery') }}"
                            class="{{ $currentRoute === 'gallery' ? 'active' : '' }}">{{ __('messages.gallery') }}</a>
                    </li>
                    <li><a href="{{ route('news') }}"
                            class="{{ $currentRoute === 'news' ? 'active' : '' }}">{{ __('messages.news') }}</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="{{ $currentRoute === 'contact' ? 'active' : '' }}">{{ __('messages.contact') }}</a>
                    </li>
                </ul>
            </nav>

            <!-- Language Dropdown in Navbar -->
            <div class="dropdown navbar-language" id="navbarLanguage">
                <div class="dropdown-label">
                    <i class="fa-solid fa-globe"></i>
                    <span>{{ strtoupper(app()->getLocale()) }}</span>
                </div>
                <div class="dropdown-content">
                    <a href="{{ route('change.language', 'en') }}">English</a>
                    <a href="{{ route('change.language', 'id') }}">Indonesian</a>
                </div>
            </div>

            <button class="menu-toggle" id="menuToggle" aria-label="Open menu">&#9776;</button>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <button class="close-sidebar" id="closeSidebar" aria-label="Close sidebar">&times;</button>
        <ul>
            <li><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
            <li><a href="{{ route('about') }}">{{ __('messages.about_us') }}</a></li>
            <li><a href="{{ route('milestones') }}">{{ __('messages.milestone') }}</a></li>
            <li><a href="{{ route('gallery') }}">{{ __('messages.gallery') }}</a></li>
            <li><a href="{{ route('news') }}">{{ __('messages.news') }}</a></li>
            <li><a href="{{ route('contact') }}">{{ __('messages.contact') }}</a></li>
        </ul>

        <!-- Language Dropdown in Sidebar -->
        <div class="language-select">
            <div class="dropdown">
                <div class="dropdown-label">
                    <i class="fa-solid fa-globe"></i>
                    <span>{{ strtoupper(app()->getLocale()) }}</span>
                </div>
                <div class="dropdown-content">
                    <!-- Prevent page reload using AJAX for language change -->
                    <a href="#" class="change-language" data-lang="en">English</a>
                    <a href="#" class="change-language" data-lang="id">Indonesia</a>
                </div>
            </div>
        </div>
    </aside>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Language change AJAX
            $(document).on('click', '.change-language', function(e) {
                e.preventDefault();
                var lang = $(this).data('lang');
                var url = '{{ route('change.language', ':lang') }}'.replace(':lang', lang);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function() {
                        location.reload();
                    },
                    error: function() {
                        alert('Error changing language. Please try again.');
                    }
                });
            });

            // Dropdown toggle
            $('.dropdown-label').on('click', function(e) {
                e.stopPropagation();
                $(this).next('.dropdown-content').toggle();
            });

            // Prevent dropdown close on inside click
            $(document).on('click', '.dropdown-content', function(e) {
                e.stopPropagation();
            });

            // Hide dropdown on outside click
            $(document).on('click', function() {
                $('.dropdown-content').hide();
            });

            // Cookie Consent Bar logic
            function getCookie(name) {
                const match = document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)');
                return match ? match.pop() : '';
            }

            if (getCookie('cookie_accepted') === '1') {
                $('#cookieConsentBar').hide();
            } else {
                $('#cookieConsentBar').show();
            }

            $('#cookieAcceptBtn').on('click', function() {
                const maxAge = 60 * 60 * 24 * 365;
                document.cookie = "cookie_accepted=1; path=/; max-age=" + maxAge + "; samesite=lax";
                $('#cookieConsentBar').hide();
            });
        });
    </script>

    <!-- Overlay -->
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <div id="cookieConsentBar">
        <div class="cookie-container">
            <p>
                {!! __('messages.cookie_notice', [
                    'policy' =>
                        '<a href="' .
                        route('privacy.policy') .
                        '" class="cookie-policy-link" target="_blank">' .
                        __('messages.privacy_policy') .
                        '</a>',
                ]) !!}
            </p>
            <button id="cookieAcceptBtn">{{ __('messages.accept_cookie') }}</button>
        </div>
    </div>

    <script>
        (function() {

            function getCookie(name) {
                const match = document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)');
                return match ? match.pop() : '';
            }

            if (getCookie('cookie_accepted') === '1') {
                document.getElementById('cookieConsentBar').style.display = 'none';
                return;
            }

            document.getElementById('cookieAcceptBtn').addEventListener('click', function() {
                const maxAge = 60 * 60 * 24 * 365;
                document.cookie = "cookie_accepted=1; path=/; max-age=" + maxAge + "; samesite=lax";
                document.getElementById('cookieConsentBar').style.display = 'none';
            });
        })();
    </script>


    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer-top">
            <div class="footer-left">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/lima-white.png') }}" alt="LIMA Logo" class="footer-logo">
                    </a>
                </div>
                <div class="footer-address">
                    PT. BINA MAHASISWA INDONESIA<br>
                    <p>{{ $WebContact->address ?? 'Alamat belum tersedia.' }}</p>
                </div>
            </div>
            <div class="footer-nav">
                <ul>
                    <li><strong>{{ __('messages.who_are_we') }}</strong></li>
                    <li><a href="{{ route('about') }}">{{ __('messages.about_us') }}</a></li>
                    <li><a href="{{ route('about') }}">{{ __('messages.vision_mission') }}</a></li>
                </ul>
                <ul>
                    <li><strong>{{ __('messages.info') }}</strong></li>
                    <li><a href="{{ route('news') }}">{{ __('messages.news') }}</a></li>
                    <li><a href="{{ route('news') }}">{{ __('messages.press_release') }}</a></li>
                </ul>
                <ul>
                    <li><strong>{{ __('messages.find_us') }}</strong></li>
                    <li><a href="{{ route('contact') }}">{{ __('messages.contact') }}</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-middle">
            <!-- Language Dropdown in Footer -->
            <div class="language-select">
                <i class="fa-solid fa-globe"></i>
                <span>{{ strtoupper(app()->getLocale()) }}</span>
                <div class="dropdown-content">
                    <a href="{{ route('change.language', 'en') }}">English</a>
                    <a href="{{ route('change.language', 'id') }}">Indonesia</a>
                </div>
            </div>

            <div class="socials">
                @if (!empty($WebContact->facebook))
                    <a href="{{ $WebContact->facebook }}" aria-label="Facebook" target="_blank" rel="noopener">
                        <i class="fab fa-facebook-f" style="font-size:24px;"></i>
                    </a>
                @endif
                @if (!empty($WebContact->instagram))
                    <a href="{{ $WebContact->instagram }}" aria-label="Instagram" target="_blank" rel="noopener">
                        <i class="fab fa-instagram" style="font-size:24px;"></i>
                    </a>
                @endif
                @if (!empty($WebContact->twitter))
                    <a href="{{ $WebContact->twitter }}" aria-label="X Twitter" target="_blank" rel="noopener">
                        <i class="fab fa-x-twitter" style="font-size:24px;"></i>
                    </a>
                @endif
                @if (!empty($WebContact->youtube))
                    <a href="{{ $WebContact->youtube }}" aria-label="YouTube" target="_blank" rel="noopener">
                        <i class="fab fa-youtube" style="font-size:24px;"></i>
                    </a>
                @endif
                @if (!empty($WebContact->tiktok))
                    <a href="{{ $WebContact->tiktok }}" aria-label="TikTok" target="_blank" rel="noopener">
                        <i class="fab fa-tiktok" style="font-size:24px;"></i>
                    </a>
                @endif
            </div>
        </div>

        <div class="footer-bottom">
            <div class="privacy-policy"><a
                    href="{{ route('privacy.policy') }}">{{ __('messages.privacy_policy') }}</a></div>
            <div class="copyright">© 2025 Liga Mahasiswa, Inc.</div>
        </div>
    </footer>

</body>

<!-- Sidebar JS -->
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

<script>
    function scrollNews(direction) {
        const container = document.getElementById('newsScroll');
        const scrollAmount = 300;

        container.scrollBy({
            left: direction === 'left' ? -scrollAmount : scrollAmount,
            behavior: 'smooth'
        });
    }
</script>

<script src="https://unpkg.com/scrollreveal" type="text/javascript"></script>
<script src="{{ asset('js/scrollreveal-custom.js') }}"></script>

</html>
