@extends('layouts.app')

@section('title', 'Booking | Miuw Photobooth')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary mb-2">📸 Booking Photobooth</h2>
        <p class="text-muted">Lengkapi detail untuk melakukan reservasi dan lihat ringkasan pembayaranmu</p>
    </div>

    <div class="row justify-content-center">
        {{-- Form Booking --}}
        <div class="col-lg-7 mb-4">
            <form method="POST" action="{{ route('booking.store') }}" class="bg-white shadow-sm p-4 rounded-4">
                @csrf

                {{-- Tanggal & Jam --}}
                <div class="mb-3">
                    <label for="booking_datetime" class="form-label fw-semibold">Tanggal & Jam</label>
                    <input type="datetime-local" id="booking_datetime" name="booking_datetime"
                        class="form-control @error('booking_datetime') is-invalid @enderror"
                        value="{{ old('booking_datetime') }}" required>
                    @error('booking_datetime')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Pilih Paket --}}
                <div class="mb-3">
                    <label for="package_id" class="form-label fw-semibold">Pilih Paket</label>
                    <select id="package_id" name="package_id" class="form-select @error('package_id') is-invalid @enderror" required>
                        <option value="" disabled {{ old('package_id') ? '' : 'selected' }}>-- Pilih Paket --</option>
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}" {{ old('package_id') == $package->id ? 'selected' : '' }}>
                                {{ $package->package_name }} - Rp{{ number_format($package->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    @error('package_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Pilih Ruangan --}}
                <div class="mb-3">
                    <label for="location" class="form-label fw-semibold">Pilih Ruangan</label>
                    <select id="location" name="location" class="form-select @error('location') is-invalid @enderror" required>
                        <option value="" disabled {{ old('location') ? '' : 'selected' }}>-- Pilih Ruangan --</option>
                        @foreach($locations as $loc)
                            <option value="{{ $loc }}" {{ old('location') == $loc ? 'selected' : '' }}>{{ $loc }}</option>
                        @endforeach
                    </select>
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Jumlah Orang --}}
                <div class="mb-3">
                    <label for="guest_count" class="form-label fw-semibold">Jumlah Orang</label>
                    <input type="number" id="guest_count" name="guest_count" min="1" max="100"
                        class="form-control @error('guest_count') is-invalid @enderror"
                        value="{{ old('guest_count', 1) }}" required>
                    @error('guest_count')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Catatan --}}
                <div class="mb-3">
                    <label for="notes" class="form-label fw-semibold">Catatan Tambahan (opsional)</label>
                    <textarea id="notes" name="notes" rows="3"
                        class="form-control @error('notes') is-invalid @enderror"
                        placeholder="Misal: tema acara, kebutuhan khusus">{{ old('notes') }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <button type="submit" class="btn btn-primary w-100 py-2 fs-5">Lanjut ke Pembayaran</button>
            </form>
        </div>

        {{-- Ringkasan Pembayaran --}}
        <div class="col-lg-5">
            <div class="bg-light p-4 shadow-sm rounded-4 sticky-top" style="top: 100px;">
                <h5 class="fw-semibold mb-3">💳 Ringkasan Pembayaran</h5>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Paket</span>
                        <strong id="summary-package">-</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Harga</span>
                        <strong id="summary-price">Rp0</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Jumlah Orang</span>
                        <strong id="summary-guest">1</strong>
                    </li>
                </ul>
                <div class="text-end">
                    <span class="text-muted">Harga dapat berubah sesuai pilihan</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script Dinamis --}}
<script>
    const packageSelect = document.getElementById('package_id');
    const guestCount = document.getElementById('guest_count');
    const summaryPackage = document.getElementById('summary-package');
    const summaryPrice = document.getElementById('summary-price');
    const summaryGuest = document.getElementById('summary-guest');

    const packages = @json($packages);

    function updateSummary() {
        const selectedId = packageSelect.value;
        const guest = guestCount.value;

        const selectedPackage = packages.find(p => p.id == selectedId);
        if (selectedPackage) {
            summaryPackage.textContent = selectedPackage.package_name;
            summaryPrice.textContent = 'Rp' + parseInt(selectedPackage.price).toLocaleString('id-ID');
        } else {
            summaryPackage.textContent = '-';
            summaryPrice.textContent = 'Rp0';
        }

        summaryGuest.textContent = guest;
    }

    packageSelect.addEventListener('change', updateSummary);
    guestCount.addEventListener('input', updateSummary);
    window.addEventListener('DOMContentLoaded', updateSummary);
</script>
@endsection
