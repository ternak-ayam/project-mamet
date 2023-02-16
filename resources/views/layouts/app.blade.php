<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://demo.getstisla.com/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/css/components.css">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand fw-bold" href="#page-top">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">

                </ul>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
                        <span class="d-flex align-items-center">
                            <span class="small">Login</span>
                        </span>
                    </a>
                @else
                    @if(Auth::user()->role == "admin")
                        <a href="{{ route('dashboard-admin.index') }}"
                           class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0 mx-1">
                            <span class="d-flex align-items-center">
                                <span class="small">Dashboard</span>
                            </span>
                        </a>
                    @else
                        <a href="{{ route('dashboard-user') }}"
                           class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0 mx-1">
                            <span class="d-flex align-items-center">
                                <span class="small">Dashboard</span>
                            </span>
                        </a>
                    @endif
                @endguest
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="bg-black text-center py-5">
        <div class="container px-5">
            <div class="text-white-50 small">
                <div class="mb-2">© {{ config('app.name') }} {{ now()->format('Y') }}. All Rights Reserved.</div>
                <a href="#!">Privacy</a>
                <span class="mx-1">·</span>
                <a href="#!">Terms</a>
                <span class="mx-1">·</span>
                <a href="#!">FAQ</a>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
