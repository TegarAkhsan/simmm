@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-primary fw-bold">Dashboard MiuwPhotobooth</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="mb-5">
        <h2 class="h4 mb-3 border-bottom pb-2 text-secondary">Riwayat Pemesanan</h2>

        @if($bookings->isEmpty())
            <p class="text-muted fst-italic" style="font-size: 0.9rem;">Belum ada riwayat pemesanan.</p>
        @else
        <div class="row g-3">
            @foreach($bookings as $booking)
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0">{{ $booking->user->name ?? 'Nama tidak tersedia' }}</h5>
                            <span class="badge bg-{{ $booking->status == 'success' ? 'success' : ($booking->status == 'pending' ? 'warning' : 'secondary') }} text-capitalize">
                                {{ $booking->status }}
                            </span>
                        </div>

                        <p class="mb-1"><strong>Tanggal Booking:</strong> {{ \Carbon\Carbon::parse($booking->booking_datetime)->format('d M Y, H:i') }}</p>
                        <p class="mb-1"><strong>Paket Booking:</strong> {{ $booking->package->name ?? 'Paket tidak tersedia' }}</p>
                        <p class="mb-1"><strong>Harga:</strong> Rp {{ number_format($booking->package->price ?? 0, 0, ',', '.') }}</p>

                        {{-- Feedback dan rating --}}
                        @if($booking->feedback)
                        <div class="border-top pt-2 mt-3" style="font-size: 0.9rem;">
                            <p class="mb-1">
                                <strong>Rating:</strong>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if($i <= $booking->feedback->rating)
                                        <i class="bi bi-star-fill text-warning"></i>
                                    @else
                                        <i class="bi bi-star text-muted"></i>
                                    @endif
                                @endfor
                                <span class="ms-1">({{ $booking->feedback->rating }} / 5)</span>
                            </p>
                            <p><strong>Feedback:</strong> <em>{{ $booking->feedback->comment }}</em></p>
                            <button class="btn btn-secondary btn-sm" disabled style="font-size: 0.8rem;">Sudah Memberi Feedback</button>
                        </div>
                        @else
                        <form action="{{ route('booking.feedback', $booking) }}" method="POST" class="mt-3" style="font-size: 0.9rem;">
                            @csrf
                            <div class="mb-2">
                                <label for="rating-{{ $booking->id }}" class="form-label fw-semibold">Rating (1-5):</label>
                                <select name="rating" id="rating-{{ $booking->id }}" class="form-select form-select-sm @error('rating') is-invalid @enderror" required>
                                    <option value="" selected disabled>Pilih rating</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('rating')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="comment-{{ $booking->id }}" class="form-label fw-semibold">Feedback:</label>
                                <textarea name="comment" id="comment-{{ $booking->id }}" class="form-control form-control-sm @error('comment') is-invalid @enderror" rows="2" placeholder="Tulis feedback..."></textarea>
                                @error('comment')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm px-3">Kirim</button>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

    </section>

    <section>
        <h2 class="h4 mb-3 border-bottom pb-2 text-secondary">Kelola Foto</h2>
        <a href="{{ route('photos.index') }}" class="btn btn-info px-4 py-2">
            <i class="bi bi-images me-2"></i> Lihat Semua Foto
        </a>
    </section>
</div>
@endsection
