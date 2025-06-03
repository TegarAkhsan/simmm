<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/custom.css'])
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>


<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container d-flex align-items-center">
                    <a class="navbar-brand logo-left fw-bold text-primary" href="{{ route('home') }}">
                        Miuw Photobooth
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav d-flex gap-3">
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('services.index') }}">Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('booking.create') }}">Booking</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('events.index') }}">Event</a></li>
                        </ul>
                    </div>

                    <ul class="navbar-nav ms-auto navbar-auth d-flex align-items-center gap-2">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="btn btn-outline-primary px-3">Login</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="btn btn-primary px-3">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link fw-bold text-primary">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.edit-profile') }}">Edit Profil</a>
                                    <a class="dropdown-item" href="{{ route('password.change-password') }}">Ganti Kata Sandi</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
    </div>

    <main class="py-4" style="padding-top: 70px;">
        @yield('content')
    </main>

    {{-- Footer --}}
    @hasSection('noFooter')
        {{-- Jika ada section noFooter, footer tidak muncul --}}
    @else

    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row">

            <!-- Tentang Miuw Photobooth -->
            <div class="col-md-4 mb-4">
                <h5 class="text-warning fw-bold mb-3">Miuw Photobooth</h5>
                <p>
                Menyediakan layanan photobooth berkualitas dengan tema kreatif untuk menyempurnakan momen spesialmu.
                </p>
                <p><small>© 2025 Miuw Photobooth. All rights reserved.</small></p>
            </div>

            <!-- Navigasi -->
            <div class="col-md-2 mb-4">
                <h6 class="text-warning fw-bold mb-3">Navigasi</h6>
                <ul class="list-unstyled">
                <li><a href="#home" class="text-white text-decoration-none">Home</a></li>
                <li><a href="{{ route('services.index') }}" class="text-white text-decoration-none">Layanan</a></li>
                <li><a href="#Booking" class="text-white text-decoration-none">Booking</a></li>
                <li><a href="#about" class="text-white text-decoration-none">Tentang Kami</a></li>
                <li><a href="#contact}" class="text-white text-decoration-none">Kontak</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-md-3 mb-4">
                <h6 class="text-warning fw-bold mb-3">Kontak Kami</h6>
                <p><i class="bi bi-geo-alt-fill me-2"></i>Jl. Merdeka No.123, Surabaya</p>
                <p><i class="bi bi-telephone-fill me-2"></i>+62 812 3456 7890</p>
                <p><i class="bi bi-envelope-fill me-2"></i>info@miuwphotobooth.com</p>
            </div>

            <!-- Sosial Media -->
            <div class="col-md-3 mb-4">
                <h6 class="text-warning fw-bold mb-3">Sosial Media</h6>
                <a href="https://instagram.com/miuwphotobooth" target="_blank" class="text-white me-3 fs-4"><i class="bi bi-instagram"></i></a>
                <a href="https://facebook.com/miuwphotobooth" target="_blank" class="text-white me-3 fs-4"><i class="bi bi-facebook"></i></a>
                <a href="https://twitter.com/miuwphotobooth" target="_blank" class="text-white me-3 fs-4"><i class="bi bi-twitter"></i></a>
                <a href="https://youtube.com/miuwphotobooth" target="_blank" class="text-white fs-4"><i class="bi bi-youtube"></i></a>
            </div>

            </div>
        </div>
    </footer>
    @endif

</body>
</html>
