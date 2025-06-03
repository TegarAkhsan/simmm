@extends('layouts.app')

@section('title', 'Event & Promo | Miuw Photobooth')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-3 text-primary fw-bold">📸 Event & Promo Spesial dari Miuw Photobooth</h1>
    <p class="text-center mb-5 fs-5 text-muted">Temukan berbagai penawaran spesial, event seru, dan voucher diskon yang bisa kamu gunakan untuk mengabadikan momen terbaikmu bersama Miuw Photobooth!</p>

    <div class="row">
        @forelse($events as $event)
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100 hover-shadow transition" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <h4 class="card-title fw-bold text-primary mb-0"><i class="bi bi-camera2 me-2"></i>{{ $event['title'] }}</h4>
                            <span class="badge bg-warning text-dark px-3 py-2">
                                <i class="bi bi-calendar-event me-1"></i>
                                @php
                                    \Carbon\Carbon::setLocale('id');
                                    try {
                                        [$start, $end] = explode(' - ', $event['date']);
                                        $start = \Carbon\Carbon::parse($start)->translatedFormat('d F Y');
                                        $end = \Carbon\Carbon::parse($end)->translatedFormat('d F Y');
                                        $dateRange = "$start - $end";
                                    } catch (Exception $e) {
                                        $dateRange = $event['date'];
                                    }
                                @endphp
                                {{ $dateRange }}
                            </span>
                        </div>

                        <p class="card-text text-secondary mb-3" style="min-height: 80px;">
                            {{ $event['description'] }}
                        </p>

                        @if(isset($event['voucher']) && $event['voucher'])
                            <div class="bg-light border rounded p-3 mb-3 d-flex align-items-center gap-3">
                                <i class="bi bi-ticket-perforated-fill fs-3 text-success"></i>
                                <div>
                                    <strong class="text-dark">Voucher Diskon:</strong>
                                    <div class="fs-5 text-uppercase">{{ $event['voucher'] }}</div>
                                    <small class="text-muted">Gunakan saat booking untuk potongan harga!</small>
                                </div>
                            </div>
                        @endif

                        <a href="#booking" class="btn btn-outline-primary w-100 mt-auto">
                            <i class="bi bi-arrow-right-circle me-1"></i> Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <strong>Oops!</strong> Saat ini belum ada event atau promo yang tersedia. Cek kembali di lain waktu ya! 💫
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
