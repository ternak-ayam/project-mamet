<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark"
    style="background-color:white !important; text-color:#B693FB">

    <a class="navbar-brand ps-3" style="font-weight:400" href="{{ route('dashboard-admin.index') }}">Go Kreatif</a>

    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>

    <!-- Navbar Brand-->
    @if (Auth::check())
        @if (Auth::user()->role == 'admin')
            <a class="navbar-brand ps-3" href="{{ route('dashboard-admin.index') }}">Halaman Staf Administrator</a>
        @elseif(Auth::user()->role == 'user')
            <a class="navbar-brand ps-3" href="{{ route('dashboard-user') }}">Halaman Member</a>
        @elseif(Auth::user()->role == 'topmanajemen')
            <a class="navbar-brand ps-3" href="{{ route('dashboard-topmanajemen') }}">Halaman Top Manajemen</a>
        @endif
    @else
        <a class="navbar-brand ps-3" href="{{ route('dashboard-nonuser') }}">Halaman Non Member</a>
    @endif
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group mt-3">
            @if (Auth::check())
                <p class="text-light">Welcome {{ Auth::user()->name }}</p>
            @else
                <p class="text-light">Welcome NonUser</p>
            @endif
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
                @if (Auth::check())
                    @if (Auth::user()->role == 'user')
                        <li><a class="dropdown-item" href="{{ route('edit-profile', Auth::user()->id) }}">Profile</a></li>
                    @endif
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @else
                @endif
            </ul>
        </li>
    </ul>
</nav>
