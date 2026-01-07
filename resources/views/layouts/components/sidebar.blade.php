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

            <h5 class="offcanvas-title mb-0 fs-6 fw-bold" id="adminSidebarLabel">
                PT. BINA MAHASISWA INDONESIA
            </h5>
        </div>

        <!-- Tombol close hanya muncul di mobile -->
        <button type="button"
                class="btn-close btn-close-white d-lg-none"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>


    <div class="offcanvas-body p-0 overflow-auto">
        <nav class="nav flex-column nav-pills px-3 pt-3">

            <!-- Dashboard -->
            <a href="{{ url('admin/dashboard') }}"
               class="nav-link {{ request()->is('admin/dashboard') ? 'active text-dark bg-white' : 'text-white-50' }}">
                <i class="fas fa-tachometer-alt me-3"></i> Dashboard
            </a>


            <!-- Website Settings -->
            <div class="nav-item dropdown mt-2">
                <a class="nav-link dropdown-toggle
                   {{ request()->is('admin/web_*') || request()->is('admin/privacy*') || request()->is('admin/*banner*') || request()->is('admin/hero*') ? 'active text-dark bg-white' : 'text-white-50' }}"
                   data-bs-toggle="collapse"
                   href="#websiteSettings"
                   role="button">

                    <i class="fas fa-cogs me-3"></i>
                    Website Settings
                </a>

                <div class="collapse
                    {{ request()->is('admin/web_*') || request()->is('admin/privacy*') || request()->is('admin/*banner*') || request()->is('admin/hero*') ? 'show' : '' }}"
                    id="websiteSettings">

                    <nav class="nav flex-column ms-4">

                        <a href="{{ route('admin.web_profile.index') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.web_profile.*') ? 'active text-white bg-dark' : '' }}">
                           Web Profile
                        </a>

                        <a href="{{ route('admin.web_contact.index') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.web_contact.*') ? 'active text-white bg-dark' : '' }}">
                           Web Contact
                        </a>

                        <a href="{{ route('admin.privacy-policies.edit') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.privacy_policy.*') ? 'active text-white bg-dark' : '' }}">
                           Privacy Policy
                        </a>

                        <a href="{{ route('admin.about_banner.create') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.about_banner.*') ? 'active text-white bg-dark' : '' }}">
                           About Banner
                        </a>

                        <a href="{{ route('admin.contact_banner.form') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.contact_banner.*') ? 'active text-white bg-dark' : '' }}">
                           Contact Banner
                        </a>

                        <a href="{{ route('admin.gallery_banner.create') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.gallery_banner.*') ? 'active text-white bg-dark' : '' }}">
                           Gallery Banner
                        </a>

                        <a href="{{ route('admin.milestone_banner.create') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.milestone_banner.*') ? 'active text-white bg-dark' : '' }}">
                           Milestone Banner
                        </a>

                        <a href="{{ route('admin.news_banner.create') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.news_banner.*') ? 'active text-white bg-dark' : '' }}">
                           News Banner
                        </a>

                        <a href="{{ route('admin.hero.index') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.hero.*') ? 'active text-white bg-dark' : '' }}">
                           Hero Banner
                        </a>

                    </nav>
                </div>
            </div>



            <!-- Sports Management -->
            <div class="nav-item dropdown mt-2">
                <a class="nav-link dropdown-toggle
                   {{ request()->is('admin/sports*') || request()->is('admin/galleries*') || request()->is('admin/university*') || request()->is('admin/milestones*') || request()->is('admin/news*') ? 'active text-dark bg-white' : 'text-white-50' }}"
                   data-bs-toggle="collapse"
                   href="#sportsManagement"
                   role="button">

                    <i class="fas fa-trophy me-3"></i>
                    Sports Management
                </a>

                <div class="collapse
                    {{ request()->is('admin/sports*') || request()->is('admin/galleries*') || request()->is('admin/university*') || request()->is('admin/milestones*') || request()->is('admin/news*') ? 'show' : '' }}"
                    id="sportsManagement">

                    <nav class="nav flex-column ms-4">

                        <a href="{{ route('admin.sports.index') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.sports.*') ? 'active text-white bg-dark' : '' }}">
                           Sports
                        </a>

                        <a href="{{ route('admin.galleries.index') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.galleries.*') ? 'active text-white bg-dark' : '' }}">
                           Gallery
                        </a>

                        <a href="{{ route('admin.university-coverages.index') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.university-coverages.*') ? 'active text-white bg-dark' : '' }}">
                           University Coverage
                        </a>

                        <a href="{{ route('admin.milestones.index') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.milestones.*') ? 'active text-white bg-dark' : '' }}">
                           Milestone
                        </a>

                        <a href="{{ route('admin.news.index') }}"
                           class="nav-link text-white-50 py-2 {{ request()->routeIs('admin.news.*') ? 'active text-white bg-dark' : '' }}">
                           News
                        </a>

                    </nav>
                </div>
            </div>


            <!-- Logout -->
            <div class="mt-5 px-3">
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
