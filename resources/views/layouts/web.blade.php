<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIMA</title>
    <link rel="stylesheet" href="{{ asset('assets/custom/css/web/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

    <header class="navbar">
        <div class="container">
            <div class="logo" style="margin-right: auto;">
                <img src="{{ asset('assets/img/limalogo.png') }}" alt="LIMA Logo" class="nav-logo">
            </div>

            <nav class="nav-links" id="navLinks">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Milestone</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Newsroom</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            <div class="navbar-language" id="navbarLanguage">🌐 EN</div>
            <button class="menu-toggle" id="menuToggle" aria-label="Open menu">
                &#9776;
            </button>
        </div>
    </header>

    <aside class="sidebar" id="sidebar">
        <button class="close-sidebar" id="closeSidebar" aria-label="Close sidebar">&times;</button>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Milestone</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Newsroom</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="sidebar-language">🌐 EN</div>
    </aside>

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

    <main>
        @yield('content')
    </main>

    <footer>
        {{-- Bagian 1: Gradien Merah ke Hitam --}}
        <div class="footer-top">
            <div class="footer-left">
                <div class="logo">
                    <img src="{{ asset('assets/img/lima-white.png') }}" alt="LIMA Logo" class="footer-logo">
                </div>
                <div class="footer-address">
                    PT. BINA MAHASISWA INDONESIA<br>
                    Sahid Office Boutique Blok G, Jl. Jend. Sudirman Kav. 86<br>
                    Jakarta Pusat, DKI Jakarta, 10220
                </div>
            </div>
            <div class="footer-nav">
                <ul>
                    <li><strong>Who Are We</strong></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Vision and Mission</a></li>
                </ul>
                <ul>
                    <li><strong>Info</strong></li>
                    <li><a href="#">Newsroom</a></li>
                    <li><a href="#">Press Release</a></li>
                </ul>
                <ul>
                    <li><strong>Find Us</strong></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

        </div>


        {{-- Bagian 2: Bar Putih --}}
        <div class="footer-middle">
    <div class="language-select"><i class="fa-solid fa-globe"></i> English</div>
    <div class="socials">
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" aria-label="X Twitter"><i class="fab fa-x-twitter"></i></a>
        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        <a href="#" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
    </div>
</div>


        {{-- Bagian 3: Footer Hitam Bawah --}}
        <div class="footer-bottom">
            <div class="privacy-policy"><a href="#">Privacy Policy</a></div>
            <div class="copyright">© 2025 Liga Mahasiswa, Inc.</div>
        </div>
    </footer>



</body>

</html>
