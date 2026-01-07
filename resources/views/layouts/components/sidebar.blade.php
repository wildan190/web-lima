<div class="offcanvas offcanvas-start" tabindex="-1" id="adminSidebar" aria-labelledby="adminSidebarLabel">
    <div class="offcanvas-header">
        <div class="d-flex align-items-center gap-2">
            <img src="{{ asset('assets/img/limalogo.png') }}" alt="Logo" class="rounded" style="width:48px;height:48px;object-fit:contain;">
            <h5 class="offcanvas-title" id="adminSidebarLabel">PT. BINA MAHASISWA INDONESIA</h5>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="list-group list-group-flush">
            <a href="{{ url('admin/dashboard') }}" class="list-group-item list-group-item-action {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <div class="px-3 pt-3 text-uppercase small text-muted">Website Settings</div>
            <a href="{{ route('admin.web_profile.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.web_profile.*') ? 'active' : '' }}">
                <i class="fas fa-cog me-2"></i> Web Profile
            </a>
            <a href="{{ route('admin.web_contact.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.web_contact.*') ? 'active' : '' }}">
                <i class="fas fa-address-book me-2"></i> Web Contact
            </a>
            <a href="{{ route('admin.privacy-policies.edit') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.privacy_policy.*') ? 'active' : '' }}">
                <i class="fas fa-shield-alt me-2"></i> Privacy Policy
            </a>
            <a href="{{ route('admin.about_banner.create') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.about_banner.*') ? 'active' : '' }}">
                <i class="fas fa-image me-2"></i> About Banner
            </a>
            <a href="{{ route('admin.contact_banner.form') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.contact_banner.*') ? 'active' : '' }}">
                <i class="fas fa-envelope-open-text me-2"></i> Contact Banner
            </a>
            <a href="{{ route('admin.gallery_banner.create') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.gallery_banner.*') ? 'active' : '' }}">
                <i class="fas fa-flag me-2"></i> Gallery Banner
            </a>
            <a href="{{ route('admin.milestone_banner.create') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.milestone_banner.*') ? 'active' : '' }}">
                <i class="fas fa-flag me-2"></i> Milestone Banner
            </a>
            <a href="{{ route('admin.news_banner.create') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.news_banner.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper me-2"></i> News Banner
            </a>
            <a href="{{ route('admin.hero.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
                <i class="fas fa-images me-2"></i> Hero Banner
            </a>
            <div class="px-3 pt-3 text-uppercase small text-muted">Sports Management</div>
            <a href="{{ route('admin.sports.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.sports.*') ? 'active' : '' }}">
                <i class="fas fa-football-ball me-2"></i> Sports
            </a>
            <a href="{{ route('admin.galleries.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                <i class="fas fa-images me-2"></i> Gallery
            </a>
            <a href="{{ route('admin.university-coverages.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.university-coverages.*') ? 'active' : '' }}">
                <i class="fas fa-university me-2"></i> University Coverage
            </a>
            <a href="{{ route('admin.milestones.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.milestones.*') ? 'active' : '' }}">
                <i class="fas fa-flag-checkered me-2"></i> Milestone
            </a>
            <a href="{{ route('admin.news.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper me-2"></i> News
            </a>
            <div class="px-3 pt-3 text-uppercase small text-muted">Account</div>
            <form action="{{ route('logout') }}" method="POST" class="px-3 py-2">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>
