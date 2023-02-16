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
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">{{ config('app.name') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('register') }}">Register</a></li>
                    </ul>
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
                        <span class="d-flex align-items-center">
                            <span class="small">Login</span>
                        </span>
                    </a>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
        <div class="simple-footer">
            Copyright © {{ config('app.name') }} {{ now()->format('Y') }}
        </div>
    </div>
</body>
</html>
