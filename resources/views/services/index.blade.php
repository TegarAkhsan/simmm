@extends('layouts.app')

@section('title', 'Layanan | Miuw Photobooth')

@section('content')
<section id="services" class="services py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4" style="color: #007bff;">Layanan Kami</h2>
        <p class="mb-5 fs-5 text-secondary">
            Pilih paket photobooth yang sesuai dengan gaya dan kebutuhan acara Anda. 
            Setiap paket dilengkapi dengan berbagai filter, efek khusus, dan latar belakang yang menarik untuk menciptakan pengalaman berfoto yang tak terlupakan bersama keluarga dan teman.
        </p>

        <div class="row justify-content-center">
            <!-- Paket Eksklusif -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-primary">
                    <img src="{{ asset('images/image1.jpg') }}" class="card-img-top" alt="Paket Eksklusif">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Paket Eksklusif</h5>
                        <p class="card-text"><strong>Background:</strong> Biru, Merah, Kuning</p>
                        <p class="card-text"><strong>Ruangan:</strong> Studio High-Class</p>
                        <p class="card-text text-muted">
                            Cocok untuk acara resmi dan profesional seperti seminar, konferensi, dan gala dinner. 
                            Ruangan dengan pencahayaan premium dan background elegan membuat setiap hasil foto tampak mewah.
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <a href="#booking" class="btn btn-primary w-100">Pesan Paket Eksklusif</a>
                    </div>
                </div>
            </div>

            <!-- Paket Outdoor -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-success">
                    <img src="{{ asset('images/image2.jpg') }}" class="card-img-top" alt="Paket Outdoor">
                    <div class="card-body">
                        <h5 class="card-title text-success">Paket Outdoor</h5>
                        <p class="card-text"><strong>Background:</strong> Hijau, Coklat, Sunset</p>
                        <p class="card-text"><strong>Ruangan:</strong> Outdoor Spesial</p>
                        <p class="card-text text-muted">
                            Nikmati sesi foto di luar ruangan dengan latar alam yang asri dan natural. 
                            Paket ini ideal untuk pesta ulang tahun, pernikahan outdoor, dan gathering komunitas.
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <a href="#booking" class="btn btn-success w-100">Pesan Paket Outdoor</a>
                    </div>
                </div>
            </div>

            <!-- Paket Premium -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-warning">
                    <img src="{{ asset('images/image3.jpg') }}" class="card-img-top" alt="Paket Premium">
                    <div class="card-body">
                        <h5 class="card-title text-warning">Paket Premium</h5>
                        <p class="card-text"><strong>Background:</strong> Emas, Hitam, Silver</p>
                        <p class="card-text"><strong>Ruangan:</strong> Studio VIP</p>
                        <p class="card-text text-muted">
                            Paket terbaik dengan konsep studio VIP, cocok untuk acara eksklusif dan personal seperti prewedding, anniversary, dan sesi foto keluarga. 
                            Dapatkan hasil foto dengan kualitas terbaik dan sentuhan artistik.
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <a href="#booking" class="btn btn-warning w-100 text-white">Pesan Paket Premium</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
