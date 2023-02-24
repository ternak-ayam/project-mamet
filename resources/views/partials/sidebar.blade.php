<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" style="background-color: #B693FB !important; margin-top:30px;" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @if (Auth::check())
                    @if (Auth::user()->role == 'admin')
                        <a class="nav-link" href="{{ route('dashboard-admin.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Manage Users
                        </a>
                        <a class="nav-link collapsed" href="{{ route('daftar-kelas.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Daftar Kelas
                        </a>
                        <a class="nav-link collapsed" href="{{ route('jadwal-kelas') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list-ul"></i></div>
                            Jadwal Kelas
                        </a>
                    @elseif(Auth::user()->role == 'user')
                        <a class="nav-link" href="{{ route('dashboard-user') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="{{ route('jadwal-kelas-user') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list-ul"></i></div>
                            Jadwal Kelas
                        </a>
                    @elseif(Auth::user()->role == 'topmanajemen')
                        <a class="nav-link" href="{{ route('dashboard-topmanajemen') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                    @endif
                @else
                    <a class="nav-link" href="{{ route('dashboard-nonuser') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                @endif
    </nav>
</div>
