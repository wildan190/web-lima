<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>LIMA - Liga Mahasiswa Indonesia</title>
    
    <!-- Primary Meta Tags -->
    <meta name="title" content="LIMA - Liga Mahasiswa Indonesia">
    <meta name="description" content="LIMA adalah liga olahraga antar mahasiswa terbesar di Indonesia yang mempromosikan sportivitas dan prestasi mahasiswa.">
    <meta name="keywords" content="Liga Mahasiswa, LIMA, olahraga mahasiswa, turnamen kampus, basket mahasiswa, sepak bola mahasiswa, sport Indonesia">
    <meta name="author" content="LIMA Indonesia">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="LIMA - Liga Mahasiswa Indonesia">
    <meta property="og:description" content="Kompetisi olahraga terbesar antar mahasiswa di Indonesia. LIMA memajukan bakat muda melalui kompetisi profesional.">
    <meta property="og:image" content="{{ asset('assets/img/seo/cover.jpg') }}"> <!-- ubah ke gambar SEO utama -->

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="LIMA - Liga Mahasiswa Indonesia">
    <meta name="twitter:description" content="Kompetisi olahraga terbesar antar mahasiswa di Indonesia. LIMA memajukan bakat muda melalui kompetisi profesional.">
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

    <header class="navbar">
        <div class="container">
            <div class="logo" style="margin-right: auto;">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/limalogo.png') }}" alt="LIMA Logo" class="nav-logo">
                </a>
            </div>

            <nav class="nav-links" id="navLinks">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="#">Milestone</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Newsroom</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </nav>
            <div class="navbar-language" id="navbarLanguage">🌐 EN</div>
            <button class="menu-toggle" id="menuToggle" aria-label="Open menu">
                &#9776;
            </button>
        </div>
    </header>

    @if (!request()->cookie('cookie_consent'))
        <div id="cookieConsentBar">
            <div class="cookie-container">
                <p>
                    We use Cookies on this site to serve you better.
                    Visit our <a href="#" class="cookie-policy-link">Privacy Policy</a> page to learn more.
                    By clicking the "Continue" button, you agree to the use of Cookies on this Site.
                </p>
                <button id="cookieAcceptBtn">Continue</button>
            </div>
        </div>

        <script>
            document.getElementById('cookieAcceptBtn').addEventListener('click', function() {
                document.getElementById('cookieConsentBar').style.display = 'none';

                fetch('{{ route('cookie.accept') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({})
                });
            });
        </script>
    @endif

    <aside class="sidebar" id="sidebar">
        <button class="close-sidebar" id="closeSidebar" aria-label="Close sidebar">&times;</button>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="#">Milestone</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Newsroom</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
        <div class="sidebar-language">🌐 EN</div>
    </aside>

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
                    <li><a href="#">Newsroom</a></li>
                    <li><a href="#">Press Release</a></li>
                </ul>
                <ul>
                    <li><strong>Find Us</strong></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-middle">
            <div class="language-select"><i class="fa-solid fa-globe"></i> English</div>
            <div class="socials">
                @if (!empty($WebContact->facebook))
                    <a href="{{ $WebContact->facebook }}" aria-label="Facebook" target="_blank" rel="noopener"><i
                            class="fab fa-facebook-f"></i></a>
                @endif
                @if (!empty($WebContact->instagram))
                    <a href="{{ $WebContact->instagram }}" aria-label="Instagram" target="_blank" rel="noopener"><i
                            class="fab fa-instagram"></i></a>
                @endif
                @if (!empty($WebContact->twitter))
                    <a href="{{ $WebContact->twitter }}" aria-label="X Twitter" target="_blank" rel="noopener"><i
                            class="fab fa-x-twitter"></i></a>
                @endif
                @if (!empty($WebContact->youtube))
                    <a href="{{ $WebContact->youtube }}" aria-label="YouTube" target="_blank" rel="noopener"><i
                            class="fab fa-youtube"></i></a>
                @endif
                @if (!empty($WebContact->tiktok))
                    <a href="{{ $WebContact->tiktok }}" aria-label="TikTok" target="_blank" rel="noopener"><i
                            class="fab fa-tiktok"></i></a>
                @endif
            </div>
        </div>

        <div class="footer-bottom">
            <div class="privacy-policy"><a href="{{route('privacy.policy')}}">Privacy Policy</a></div>
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
