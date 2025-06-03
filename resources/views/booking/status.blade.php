@extends('layouts.app')

@section('title', 'Status Pembayaran | Miuw Photobooth')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6 font-[Poppins]">
    <h2 class="text-3xl font-extrabold text-center text-indigo-700 mb-8">💸 Status Pembayaran Booking</h2>

    <div class="bg-white rounded-2xl shadow-xl p-8 space-y-6 text-gray-800 border border-gray-200">

        {{-- Informasi Pembayaran --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-3">
                <p><span class="font-semibold">Metode Pembayaran:</span> {{ $payment->payment_method ?? '-' }} - {{ $payment->payment_option ?? '-' }}</p>
                <p><span class="font-semibold">Alamat Pembayaran:</span> {{ $payment->payment_address ?? '-' }}</p>
                <p><span class="font-semibold">Kode Invoice:</span> <span class="text-indigo-700 font-mono">{{ $payment->invoice_code ?? '-' }}</span></p>
                <p><span class="font-semibold">Total:</span> <span class="text-green-600 font-bold">Rp{{ number_format($payment->amount ?? 0, 0, ',', '.') }}</span></p>
            </div>

            {{-- Countdown Waktu --}}
            <div class="bg-red-50 border-l-4 border-red-600 p-4 rounded-xl shadow-md flex flex-col justify-center items-start md:items-end">
                <h5 class="text-red-800 font-semibold text-lg mb-1">⏰ Batas Waktu Pembayaran</h5>
                @if($booking->status === 'success')
                    <div class="text-green-600 font-bold">✅ Sudah Dibayar</div>
                @else
                    <div id="timer" class="text-2xl font-extrabold text-red-600"></div>
                @endif
            </div>
        </div>

        {{-- QR Code Pembayaran --}}
        @if($payment->qr_code_url && $booking->status !== 'success')
            <div class="flex justify-center">
                <img src="{{ $payment->qr_code_url }}" alt="QR Code" class="w-64 h-64 object-contain rounded-lg border border-gray-300 shadow-md">
            </div>
        @endif

        {{-- Instruksi Pembayaran --}}
        @if($booking->status !== 'success')
            <div>
                <h5 class="font-semibold text-lg mb-3">Langkah-langkah Pembayaran:</h5>
                <ol class="list-decimal list-inside space-y-1 text-gray-700">
                    <li>Buka aplikasi atau ATM sesuai metode pembayaran.</li>
                    <li>Masukkan alamat pembayaran atau scan QR Code di atas.</li>
                    <li>Masukkan nominal sebesar <span class="font-bold text-green-600">Rp{{ number_format($payment->amount ?? 0, 0, ',', '.') }}</span>.</li>
                    <li>Konfirmasi dan selesaikan transaksi.</li>
                    <li>Masukkan kode invoice di bawah untuk konfirmasi pembayaran.</li>
                </ol>
            </div>
        @endif

        {{-- Form Konfirmasi Pembayaran --}}
        @if($booking->status === 'success')
            <div class="text-green-600 font-bold text-lg text-center">
                ✅ Pembayaran telah berhasil diverifikasi!
            </div>
        @else
            <form action="{{ route('booking.verifyPayment') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                <div>
                    <label for="invoice_code" class="block font-medium text-gray-700 mb-1">Masukkan Kode Invoice</label>
                    <input type="text" name="invoice_code" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out shadow">
                    Konfirmasi Pembayaran
                </button>
            </form>
        @endif

    </div>
</div>

{{-- Countdown Script --}}
@if($booking->status !== 'success')
<script>
    const expiryTime = {{ \Carbon\Carbon::parse($payment->expiry_time)->timestamp ?? now()->addHour()->timestamp }} * 1000;

    let timerInterval = setInterval(function () {
        const now = new Date().getTime();
        const distance = expiryTime - now;

        const timerElement = document.getElementById('timer');
        const submitBtn = document.querySelector('form button[type="submit"]');

        if (distance < 0) {
            clearInterval(timerInterval);
            if (timerElement) timerElement.innerHTML = "Waktu pembayaran sudah habis.";
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.classList.add("opacity-50", "cursor-not-allowed");
            }
            return;
        }

        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        if (timerElement) timerElement.innerHTML = `${minutes} menit ${seconds} detik`;
    }, 1000);
</script>
@endif
@endsection
