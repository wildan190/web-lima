<div class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('assets/img/limalogo.png') }}" alt="Logo">
        <h3>PT. BINA MAHASISWA INDONESIA</h3>
    </div>
    <ul class="sidebar-menu">
        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <button type="submit"
                    style="background: none; border: none; color: #ecf0f1; cursor: pointer; padding: 10px; font-size: 14px; width: 100%; text-align: left;">
                    Logout
                </button>
            </form>
        </li>

    </ul>
</div>
