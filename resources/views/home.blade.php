@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-md">
    <div class="container d-flex align-items-center">
        <a class="navbar-brand logo-left" href="#home">
            {{ config('app.name', 'Laravel') }}
        </a>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex gap-3">
                <li class="nav-item"><a class="nav-link" href="#About">ABOUT</a></li>
                <li class="nav-item"><a class="nav-link" href="#Services">SERVICES</a></li>
                <li class="nav-item"><a class="nav-link" href="#Booking">BOOKING</a></li>
            </ul>
        </div>

        <ul class="navbar-nav ms-auto navbar-auth">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @endif
            @else
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




<div class="container">
    <h1 class="welcome-text">Selamat Datang di Photobooth!</h1>
</div>
    <p class="subtitle-text">Jepret, Pose, dan abadikan kenangan indah disini.</p>

<div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/image1.jpg') }}" class="d-block w-100" alt="Gambar 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/image2.jpg') }}" class="d-block w-100" alt="Gambar 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/image3.jpg') }}" class="d-block w-100" alt="Gambar 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>


<section id="About" class="About">
    <h2>TENTANG KAMI</h2>
    <div class="row">
        <div class="about-img">
            <img src="{{ asset('images/image4.jpg') }}" >
        </div>
        <div class="about-text">
            <p>lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
        </div>
    </div>
</section>


<section id="Services" class="Services">
    <h2>LAYANAN KAMI</h2>
    <p>Tambahkan efek dan filter ke foto Anda...</p>
    <div class="container">
    <div class="card-container">
        <div class="card service-card">
            <div class="card-img-container">
                <img src="{{ asset('images/image1.jpg') }}" class="card-img-top" alt="Package 1">
            </div>
            <div class="card-body">
                <h5 class="card-title">Paket Eksklusif</h5>
                <p class="card-text"><strong>Warna Background:</strong> Biru, Merah, Kuning</p>
                <p class="card-text"><strong>Jenis Ruangan:</strong> Studio High-Class</p>
            </div>
        </div>
        
        <div class="card service-card">
            <div class="card-img-container">
                <img src="{{ asset('images/image2.jpg') }}" class="card-img-top" alt="Package 2">
            </div>
            <div class="card-body">
                <h5 class="card-title">Paket Outdoor</h5>
                <p class="card-text"><strong>Warna Background:</strong> Hijau, Coklat, Sunset</p>
                <p class="card-text"><strong>Jenis Ruangan:</strong> Outdoor Spesial</p>
            </div>
        </div>

        <div class="card service-card">
            <div class="card-img-container">
                <img src="{{ asset('images/image3.jpg') }}" class="card-img-top" alt="Package 3">
            </div>
            <div class="card-body">
                <h5 class="card-title">Paket Premium</h5>
                <p class="card-text"><strong>Warna Background:</strong> Emas, Hitam, Silver</p>
                <p class="card-text"><strong>Jenis Ruangan:</strong> Studio VIP</p>
            </div>
        </div>
    </div>
</div>

</section>

<section id="Booking" class="Booking">
    <h2>BOOKING</h2>
    <p>Riwayat pemesanan dan transaksi...</p>
</section>




@endsection
