<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <link rel="shortcut icon" href="favicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/landing/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/landing/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/assets/landing/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/landing/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/landing/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/landing/css/flatpickr.min.css') }}">

    <title>JeWePe Mading</title>
</head>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <div class="row g-0 align-items-center">
                        <div class="col-2">
                            <a href="{{route('home')}}" class="logo m-0 float-start">JeWePe<span
                                    class="text-primary">.</span></a>
                        </div>
                        <div class="col-8 text-center">
                            <form action="#" class="search-form d-inline-block d-lg-none">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="bi-search"></span>
                            </form>

                            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                <li class="active"><a href="{{route('home')}}">Beranda</a></li>
                                @if (auth()->check())
                                    <!-- Pengguna sudah login, tampilkan dashboard link -->
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                @else
                                    <!-- Pengguna belum login, tampilkan login link -->
                                    <li><a href="{{ route('login.form') }}">Login</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>
@yield('navbar')
