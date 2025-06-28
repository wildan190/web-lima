<div class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('assets/img/limalogo.png') }}" alt="Logo">
        <h3>PT. BINA MAHASISWA INDONESIA</h3>
    </div>

    <ul class="sidebar-menu">

        {{-- === DASHBOARD === --}}
        <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ url('admin/dashboard') }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>

        {{-- === WEBSITE SETTINGS === --}}
        <li class="sidebar-section-title">Website Settings</li>

        <li class="{{ request()->routeIs('admin.web_profile.*') ? 'active' : '' }}">
            <a href="{{ route('admin.web_profile.index') }}">
                <i class="fas fa-cog"></i> Web Profile
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.web_contact.*') ? 'active' : '' }}">
            <a href="{{ route('admin.web_contact.index') }}">
                <i class="fas fa-address-book"></i> Web Contact
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.privacy_policy.*') ? 'active' : '' }}">
            <a href="{{ route('admin.privacy-policies.edit') }}">
                <i class="fas fa-shield-alt"></i> Privacy Policy
            </a>
        </li>

        {{-- === SPORTS MANAGEMENT === --}}
        <li class="sidebar-section-title">Sports Management</li>

        <li class="{{ request()->routeIs('admin.sports.*') ? 'active' : '' }}">
            <a href="{{ route('admin.sports.index') }}">
                <i class="fas fa-football-ball"></i> Sports
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
            <a href="{{ route('admin.galleries.index') }}">
                <i class="fas fa-images"></i> Gallery
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.university-coverages.*') ? 'active' : '' }}">
            <a href="{{ route('admin.university-coverages.index') }}">
                <i class="fas fa-university"></i> University Coverage
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.milestones.*') ? 'active' : '' }}">
            <a href="{{ route('admin.milestones.index') }}">
                <i class="fas fa-flag-checkered"></i> Milestone
            </a>
        </li>

        {{-- === ACCOUNT === --}}
        <li class="sidebar-section-title">Account</li>

        <li>
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <button type="submit"
                    style="background: none; border: none; color: #ecf0f1; cursor: pointer; padding: 10px; font-size: 14px; width: 100%; text-align: left;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </li>

    </ul>
</div>
