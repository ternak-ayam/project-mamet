<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" style="background-color: #B693FB !important; margin-top:30px; "
        id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @if (Auth::check())
                    @if (Auth::user()->role == 'admin')
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Menu Admin
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('dashboard-admin.index') }}">Jadwal Kelas</a>
                                <a class="nav-link" href="{{ route('gambar-kegiatan-kelas') }}">Gambar Kelas</a>
                                <a class="nav-link" href="{{ route('list-member') }}">List Member</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Menu Laporan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="{{ route('data-kelas') }}">
                                    Laporan Data Kelas
                                </a>
                                <a class="nav-link collapsed" href="{{ route('peserta-kelas') }}">
                                    Laporan Peserta Kelas
                                </a>
                            </nav>
                        </div>
                    @elseif(Auth::user()->role == 'user')
                        <a class="nav-link" href="{{ route('dashboard-user') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="{{ route('jadwal-kelas-user') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list-ul"></i></div>
                            Laporan History Kelas
                        </a>
                    @elseif(Auth::user()->role == 'adminweb')
                        <a class="nav-link" href="{{ route('dashboard-adminweb') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Menu Laporan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="{{ route('adminweb-peserta-kelas') }}">
                                    Laporan Peserta Kelas
                                </a>
                            </nav>
                        </div>
                    @elseif(Auth::user()->role == 'topmanajemen')
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Menu Laporan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="{{ route('dashboard-topmanajemen') }}">
                                    Laporan Data Kelas
                                </a>
                                <a class="nav-link collapsed" href="{{ route('peserta-kelas-topmanajemen') }}">
                                    Laporan Peserta Kelas
                                </a>
                            </nav>
                        </div>
                    @endif
                @else
                    <a class="nav-link" href="{{ route('dashboard-nonuser') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                @endif
    </nav>
</div>
