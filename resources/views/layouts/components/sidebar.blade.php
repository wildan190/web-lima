<div class="offcanvas offcanvas-start show"
     id="adminSidebar"
     style="width:350px;visibility:visible!important;background:#0d0d0d;color:white"
     data-bs-backdrop="false"
     data-bs-scroll="true">

<style>
/* =========================
   SIDEBAR DESIGN
========================= */

#adminSidebar{
    border-right:1px solid #2b2b2b;
    font-family: "Segoe UI", Arial;
}

/* Header */
#adminSidebar .offcanvas-header{
    padding:18px 18px;
}

/* LOGO */
#adminSidebar img{
    border-radius:14px;
}

/* Section Title */
.menu-title{
    font-size:11px;
    letter-spacing:1px;
    color:#b3b3b3;
    margin:18px 4px 8px 4px;
    text-transform:uppercase;
    font-weight:700;
}

/* Divider Line */
.menu-divider{
    border-bottom:1px solid #2e2e2e;
    margin:10px 0 4px 0;
}

/* MENU WRAPPER */
.nav.flex-column{
    gap:4px;
}

/* MENU BUTTON STYLE */
#adminSidebar .nav-link{
    color:#dcdcdc !important;
    background:#161616;
    border:1px solid #222;
    border-radius:12px;
    padding:10px 14px;
    margin:2px 0;
    display:flex;
    align-items:center;
    gap:12px;
    font-size:14px;
    font-weight:500;
    transition:all .15s ease-in-out;
}

/* ICON WIDTH */
#adminSidebar .nav-link i{
    width:18px;
    text-align:center;
}

/* HOVER */
#adminSidebar .nav-link:hover{
    background:#1f1f1f;
    border-color:#333;
    color:#fff !important;
}

/* ACTIVE */
#adminSidebar .nav-link.active{
    background:white !important;
    color:black !important;
    font-weight:700;
    border-color:white;
}

/* Logout button */
#adminSidebar .btn-outline-light{
    border-radius:14px;
    font-weight:600;
}

/* Mobile close button */
.btn-close{
    filter:invert(1);
}
</style>


<!-- ================= HEADER ================= -->
    <div class="offcanvas-header border-bottom border-secondary">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset('assets/img/limalogo.png') }}"
                 class="bg-white p-1"
                 style="width:50px;height:50px;object-fit:contain">

            <h5 class="mb-0 fs-6 fw-bold">
                PT. BINA MAHASISWA INDONESIA
            </h5>
        </div>

        <button class="btn-close d-lg-none" data-bs-dismiss="offcanvas"></button>
    </div>


<!-- ================= BODY ================= -->
    <div class="offcanvas-body p-3">

        <nav class="nav flex-column">


            <!-- DASHBOARD -->
            <div class="menu-title">Main</div>

            <a href="{{ url('admin/dashboard') }}"
               class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>


            <div class="menu-divider"></div>


            <!-- WEBSITE -->
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



            <div class="menu-divider"></div>


            <!-- SPORTS -->
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
