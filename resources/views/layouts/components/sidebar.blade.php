<div class="offcanvas offcanvas-start show bg-black text-white"
     tabindex="-1"
     id="adminSidebar"
     aria-labelledby="adminSidebarLabel"
     style="width: 350px; visibility: visible !important;"
     data-bs-backdrop="false"
     data-bs-scroll="true">

    <div class="offcanvas-header border-bottom border-secondary">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset('assets/img/limalogo.png') }}"
                 alt="Logo"
                 class="rounded-circle bg-white p-1"
                 style="width: 50px; height: 50px; object-fit: contain;">

            <h5 class="offcanvas-title mb-0 fs-6 fw-bold">
                PT. BINA MAHASISWA INDONESIA
            </h5>
        </div>

        <!-- close hanya muncul di mobile -->
        <button type="button"
                class="btn-close btn-close-white d-lg-none"
                data-bs-dismiss="offcanvas"></button>
    </div>


    <div class="offcanvas-body p-0 overflow-auto">

        <nav class="nav flex-column px-3 pt-3">

            <!-- ============ DASHBOARD ============ -->
            <a href="{{ url('admin/dashboard') }}"
               class="nav-link py-2 {{ request()->is('admin/dashboard') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                <i class="fas fa-tachometer-alt me-3"></i> Dashboard
            </a>


            <!-- ============ WEBSITE SETTINGS GROUP TITLE ============ -->
            <div class="text-uppercase small mt-4 mb-2 text-secondary fw-bold">
                Website Settings
            </div>

            <a href="{{ route('admin.web_profile.index') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.web_profile.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                Web Profile
            </a>

            <a href="{{ route('admin.web_contact.index') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.web_contact.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                Web Contact
            </a>

            <a href="{{ route('admin.privacy-policies.edit') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.privacy_policy.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                Privacy Policy
            </a>

            <a href="{{ route('admin.about_banner.create') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.about_banner.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                About Banner
            </a>

            <a href="{{ route('admin.contact_banner.form') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.contact_banner.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                Contact Banner
            </a>

            <a href="{{ route('admin.gallery_banner.create') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.gallery_banner.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                Gallery Banner
            </a>

            <a href="{{ route('admin.milestone_banner.create') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.milestone_banner.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                Milestone Banner
            </a>

            <a href="{{ route('admin.news_banner.create') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.news_banner.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                News Banner
            </a>

            <a href="{{ route('admin.hero.index') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.hero.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                Hero Banner
            </a>



            <!-- ============ SPORTS MANAGEMENT GROUP TITLE ============ -->
            <div class="text-uppercase small mt-4 mb-2 text-secondary fw-bold">
                Sports Management
            </div>

            <a href="{{ route('admin.sports.index') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.sports.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                Sports
            </a>

            <a href="{{ route('admin.galleries.index') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.galleries.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                Gallery
            </a>

            <a href="{{ route('admin.university-coverages.index') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.university-coverages.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                University Coverage
            </a>

            <a href="{{ route('admin.milestones.index') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.milestones.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                Milestone
            </a>

            <a href="{{ route('admin.news.index') }}"
               class="nav-link py-2 {{ request()->routeIs('admin.news.*') ? 'bg-white text-dark fw-bold' : 'text-white-50' }}">
                News
            </a>



            <!-- ============ LOGOUT ============ -->
            <div class="mt-5 px-1">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="btn btn-outline-light w-100 border-white">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        Logout
                    </button>
                </form>
            </div>

        </nav>

    </div>

</div>
