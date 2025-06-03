@extends('layouts.app')

@section('title', 'Home | Miuw Photobooth')

@section('content')
<!-- Hero Section -->
<section id="home" class="home py-5 text-white" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('images/image1.jpg') }}') center/cover no-repeat;">
    <div class="container text-center d-flex flex-column justify-content-center align-items-center" style="min-height: 90vh;">
        <h1 class="display-3 fw-bold mb-3 animate__animated animate__fadeInDown">
            Selamat Datang di <span class="text-warning">Miuw Photobooth</span>
        </h1>
        <p class="lead mb-4 w-75 animate__animated animate__fadeInUp" style="color: #ffffff;">
            Hadir untuk menyempurnakan setiap momen berhargamu. Dengan berbagai pilihan tema kreatif, latar unik, dan kualitas foto terbaik, Miuw Photobooth siap menjadikan acara spesialmu lebih berkesan dan penuh warna.
        </p>
        <a class="btn btn-warning btn-lg px-4 animate__animated animate__zoomIn hero-text" href="{{ route('services.index') }}">
            Lihat Layanan Kami
        </a>

    </div>
</section>

<!-- About Section -->
<section id="about" class="about py-5 bg-light">
    <div class="container">
       <h2 class="text-center mb-4" style="color: #007bff;">Tentang Miuw Photobooth</h2>
        <div class="row align-items-center">
            <div class="col-md-6 mb-3 mb-md-0">
                <img src="{{ asset('images/image4.jpg') }}" class="img-fluid rounded shadow" alt="Tentang Miuw Photobooth">
            </div>
            <div class="col-md-6">
                <p class="fs-5 mb-3">
                    Miuw Photobooth hadir untuk mengabadikan setiap momen berharga Anda dengan sentuhan kreativitas dan gaya yang unik. 
                    Kami percaya setiap foto memiliki cerita, dan kami siap membantu Anda mengekspresikan cerita tersebut dengan berbagai pilihan tema dan latar yang menarik.
                </p>
                <p class="fs-5 mb-3">
                    Layanan kami mencakup setup photobooth yang fleksibel, mulai dari studio indoor yang elegan hingga lokasi outdoor yang eksotis, 
                    lengkap dengan berbagai efek dan filter foto berkualitas tinggi untuk hasil yang memukau.
                </p>
                <p class="fs-5">
                    Baik untuk acara pernikahan, ulang tahun, corporate event, maupun gathering bersama teman dan keluarga, Miuw Photobooth adalah pilihan tepat untuk menciptakan kenangan tak terlupakan. Yuk, abadikan momen spesialmu bersama kami!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4" style="color: #007bff;">Layanan Kami</h2>
        <p class="mb-5">Pilih paket yang sesuai dengan gaya dan kebutuhan Anda. Tambahkan filter, efek, dan latar menarik untuk pengalaman yang tak terlupakan!</p>

        <div class="row justify-content-center">
            <!-- Paket Eksklusif -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/image1.jpg') }}" class="card-img-top" alt="Paket Eksklusif">
                    <div class="card-body">
                        <h5 class="card-title">Paket Eksklusif</h5>
                        <p class="card-text"><strong>Background:</strong> Biru, Merah, Kuning</p>
                        <p class="card-text"><strong>Ruangan:</strong> Studio High-Class</p>
                        <p class="card-text">Cocok untuk acara resmi dan profesional seperti seminar, konferensi, dan gala dinner. Ruangan dengan pencahayaan premium dan background elegan membuat setiap hasil foto tampak mewah.</p>
                    </div>
                </div>
            </div>

            <!-- Paket Outdoor -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/image2.jpg') }}" class="card-img-top" alt="Paket Outdoor">
                    <div class="card-body">
                        <h5 class="card-title">Paket Outdoor</h5>
                        <p class="card-text"><strong>Background:</strong> Hijau, Coklat, Sunset</p>
                        <p class="card-text"><strong>Ruangan:</strong> Outdoor Spesial</p>
                        <p class="card-text">Nikmati sesi foto di luar ruangan dengan latar alam yang asri dan natural. Paket ini ideal untuk pesta ulang tahun, pernikahan outdoor, dan gathering komunitas.</p>
                    </div>
                </div>
            </div>

            <!-- Paket Premium -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/image3.jpg') }}" class="card-img-top" alt="Paket Premium">
                    <div class="card-body">
                        <h5 class="card-title">Paket Premium</h5>
                        <p class="card-text"><strong>Background:</strong> Emas, Hitam, Silver</p>
                        <p class="card-text"><strong>Ruangan:</strong> Studio VIP</p>
                        <p class="card-text">Paket terbaik dengan konsep studio VIP, cocok untuk acara eksklusif dan personal seperti prewedding, anniversary, dan sesi foto keluarga. Dapatkan hasil foto dengan kualitas terbaik dan sentuhan artistik.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="Booking" class="Booking py-5" style="background: #f8f9fa;">
  <div class="container">
    <h2 class="text-center mb-5" style="font-weight: 700; color: #0d6efd; font-size: 2.8rem;">
      Booking Miuw Photobooth
    </h2>
    <p class="text-center mb-5 fs-5 text-secondary">
      Pesan photobooth untuk acara spesialmu dengan mudah dan cepat.
    </p>

    <div class="row g-4 justify-content-center mb-5">
      <!-- Card Tata Cara Booking -->
      <div class="col-md-5 col-lg-4">
        <div class="card shadow-sm rounded-4 border-0 h-100">
          <div class="card-body">
            <h4 class="card-title mb-4 text-primary fw-bold">Tata Cara Booking</h4>
            <ol class="mb-0" style="line-height: 1.6; font-size: 1.1rem; color: #333;">
              <li>Pilih tanggal & waktu yang tersedia di halaman pemesanan.</li>
              <li>Pilih paket photobooth sesuai kebutuhanmu.</li>
              <li>Isi data lengkap pemesan dan lokasi acara.</li>
              <li>Pilih metode pembayaran yang kamu inginkan.</li>
              <li>Konfirmasi booking dengan menginput kode invoice yang dikirim otomatis.</li>
            </ol>
          </div>
        </div>
      </div>

      <!-- Card Tata Cara Pembayaran -->
      <div class="col-md-5 col-lg-4">
        <div class="card shadow-sm rounded-4 border-0 h-100">
          <div class="card-body">
            <h4 class="card-title mb-4 text-primary fw-bold">Tata Cara Pembayaran</h4>
            <ul class="mb-0" style="line-height: 1.6; font-size: 1.1rem; color: #333;">
              <li>Pembayaran via <strong>Bank Transfer</strong>, <strong>E-Wallet</strong>, atau <strong>Cash</strong>.</li>
              <li>Sistem akan tampilkan <strong>QR code</strong> atau <strong>rekening tujuan</strong> setelah booking.</li>
              <li>Masukkan <strong>kode invoice</strong> di halaman konfirmasi pembayaran.</li>
              <li>Pembayaran diverifikasi otomatis maksimal <strong>1 jam</strong> setelah booking.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center">
      <a href="http://127.0.0.1:8000/login" class="btn btn-primary btn-lg px-5 py-3 shadow-sm" 
         style="border-radius: 50px; font-weight: 600; font-size: 1.25rem; transition: transform 0.3s ease;">
        Booking Sekarang
      </a>
    </div>
  </div>
</section>




@endsection
