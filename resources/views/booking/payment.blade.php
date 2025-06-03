@extends('layouts.app')

@section('title', 'Pembayaran Booking')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-success mb-2">💰 Pembayaran Booking</h2>
        <p class="text-muted">Isi detail pembayaran dan selesaikan proses booking</p>
    </div>

    <div class="row justify-content-center">
        {{-- Form Pembayaran --}}
        <div class="col-lg-7 mb-4">
            <form action="{{ route('booking.processPayment', $booking->id) }}" method="POST" class="bg-white p-4 shadow-sm rounded-4">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name ?? '') }}" required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email ?? '') }}" required>
                </div>

                {{-- Nomor HP --}}
                <div class="mb-3">
                    <label for="phone" class="form-label fw-semibold">Nomor HP</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>

                {{-- Metode Pembayaran --}}
                <div class="mb-3">
                    <label for="payment_method" class="form-label fw-semibold">Metode Pembayaran</label>
                    <select id="payment_method" name="payment_method" class="form-select" required onchange="togglePaymentOptions()">
                        <option value="">-- Pilih Metode --</option>
                        <option value="Cash">Cash</option>
                        <option value="Bank">Bank</option>
                        <option value="E-Wallet">E-Wallet</option>
                    </select>
                </div>

                {{-- Pilihan Pembayaran --}}
                <div class="mb-3" id="payment_option_container" style="display: none;">
                    <label for="payment_option" class="form-label fw-semibold">Pilihan Pembayaran</label>
                    <select id="payment_option" name="payment_option" class="form-select" required></select>
                </div>

                {{-- Kode Promo --}}
                <div class="mb-3">
                    <label for="promo_code" class="form-label fw-semibold">Kode Promo (opsional)</label>
                    <input type="text" name="promo_code" class="form-control" value="{{ old('promo_code') }}">
                </div>

                {{-- Tombol Bayar --}}
                <button type="submit" class="btn btn-success w-100 py-2 fs-5">Bayar</button>
            </form>
        </div>

        {{-- Ringkasan Booking & Pembayaran --}}
        <div class="col-lg-5">
            <div class="bg-light p-4 shadow-sm rounded-4 sticky-top" style="top: 100px;">
                <h5 class="fw-semibold mb-3">📋 Ringkasan Booking</h5>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tanggal & Jam</span>
                        <strong>{{ \Carbon\Carbon::parse($booking->booking_datetime)->translatedFormat('d F Y H:i') }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Ruangan</span>
                        <strong>{{ $booking->location }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Paket</span>
                        <strong>{{ $booking->package->package_name }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Harga</span>
                        <strong>Rp{{ number_format($booking->package->price, 0, ',', '.') }}</strong>
                    </li>
                </ul>
                <div class="text-muted text-end small">* Harga belum termasuk potongan promo (jika ada)</div>
            </div>
        </div>
    </div>
</div>

{{-- Script Dinamis --}}
<script>
function togglePaymentOptions() {
    const method = document.getElementById('payment_method').value;
    const optionSelect = document.getElementById('payment_option');
    const container = document.getElementById('payment_option_container');
    optionSelect.innerHTML = '';

    let options = [];
    if (method === 'Cash') {
        options = ['Cash'];
    } else if (method === 'Bank') {
        options = ['BCA', 'BTN', 'CIMBNIAGA', 'MANDIRI', 'BJB', 'BANKJATIM', 'BRI', 'BNI'];
    } else if (method === 'E-Wallet') {
        options = ['Shopeepay', 'DANA', 'GoPay', 'OVO'];
    }

    if (options.length > 0) {
        container.style.display = 'block';
        options.forEach(function(opt) {
            const option = document.createElement('option');
            option.value = opt;
            option.text = opt;
            optionSelect.add(option);
        });
    } else {
        container.style.display = 'none';
    }
}
</script>
@endsection
