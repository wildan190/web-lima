<div class="offcanvas offcanvas-start show bg-black text-white"
     id="adminSidebar"
     style="width:350px;visibility:visible!important"
     data-bs-backdrop="false"
     data-bs-scroll="true">

    <div class="offcanvas-header border-bottom border-secondary">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset('assets/img/limalogo.png') }}"
                 class="rounded-circle bg-white p-1"
                 style="width:50px;height:50px;object-fit:contain">

            <h5 class="mb-0 fs-6 fw-bold">
                PT. BINA MAHASISWA INDONESIA
            </h5>
        </div>

        <button class="btn-close btn-close-white d-lg-none"
                data-bs-dismiss="offcanvas"></button>
    </div>


    <div class="offcanvas-body p-3">

        <nav class="nav flex-column">

            <!-- DASHBOARD -->
            <a href="{{ url('admin/dashboard') }}"
               class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>


            <!-- TITLE -->
            <div class="menu-title">Website Settings</div>

            <a href="{{ route('admin.web_profile.index') }}"
               class="nav-link {{ request()->routeIs('admin.web_profile.*') ? 'active' : '' }}">
               Web Profile
            </a>

            <a href="{{ route('admin.web_contact.index') }}"
               class="nav-link {{ request()->routeIs('admin.web_contact.*') ? 'active' : '' }}">
               Web Contact
            </a>

            <a href="{{ route('admin.privacy-policies.edit') }}"
               class="nav-link {{ request()->routeIs('admin.privacy_policy.*') ? 'active' : '' }}">
               Privacy Policy
            </a>

            <a href="{{ route('admin.about_banner.create') }}"
               class="nav-link {{ request()->routeIs('admin.about_banner.*') ? 'active' : '' }}">
               About Banner
            </a>

            <a href="{{ route('admin.contact_banner.form') }}"
               class="nav-link {{ request()->routeIs('admin.contact_banner.*') ? 'active' : '' }}">
               Contact Banner
            </a>

            <a href="{{ route('admin.gallery_banner.create') }}"
               class="nav-link {{ request()->routeIs('admin.gallery_banner.*') ? 'active' : '' }}">
               Gallery Banner
            </a>

            <a href="{{ route('admin.milestone_banner.create') }}"
               class="nav-link {{ request()->routeIs('admin.milestone_banner.*') ? 'active' : '' }}">
               Milestone Banner
            </a>

            <a href="{{ route('admin.news_banner.create') }}"
               class="nav-link {{ request()->routeIs('admin.news_banner.*') ? 'active' : '' }}">
               News Banner
            </a>

            <a href="{{ route('admin.hero.index') }}"
               class="nav-link {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
               Hero Banner
            </a>


            <!-- TITLE -->
            <div class="menu-title">Sports Management</div>

            <a href="{{ route('admin.sports.index') }}"
               class="nav-link {{ request()->routeIs('admin.sports.*') ? 'active' : '' }}">
               Sports
            </a>

            <a href="{{ route('admin.galleries.index') }}"
               class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
               Gallery
            </a>

            <a href="{{ route('admin.university-coverages.index') }}"
               class="nav-link {{ request()->routeIs('admin.university-coverages.*') ? 'active' : '' }}">
               University Coverage
            </a>

            <a href="{{ route('admin.milestones.index') }}"
               class="nav-link {{ request()->routeIs('admin.milestones.*') ? 'active' : '' }}">
               Milestone
            </a>

            <a href="{{ route('admin.news.index') }}"
               class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
               News
            </a>


            <!-- LOGOUT -->
            <div class="mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-light w-100">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        Logout
                    </button>
                </form>
            </div>

        </nav>

    </div>

</div>
