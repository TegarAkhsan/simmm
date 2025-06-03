<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class BookingController extends Controller
{
    public function create()
    {
        $packages = Package::all();
        $locations = Package::select('location')->distinct()->pluck('location');
        return view('booking.create', compact('packages', 'locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_datetime' => 'required|date|after:now',
            'package_id' => 'required|exists:packages,id',
            'location' => 'required|string',
            'guest_count' => 'required|integer|min:1|max:100',
            'notes' => 'nullable|string|max:500',
        ]);

        $exists = Booking::where('booking_datetime', $request->booking_datetime)->exists();

        if ($exists) {
            return back()->withErrors(['booking_datetime' => 'Waktu ini sudah dibooking.'])->withInput();
        }

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'package_id' => $request->package_id,
            'location' => $request->location,
            'booking_datetime' => $request->booking_datetime,
            'guest_count' => $request->guest_count,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('booking.payment', $booking->id);
    }

    public function payment($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.payment', compact('booking'));
    }

    public function processPayment(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $request->validate([
            'payment_method' => 'required|string',
            'payment_option' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        $invoiceCode = 'INV' . strtoupper(uniqid());
        $expiryTime = now()->addHour();
        $amount = $booking->package->price;

        $payment = Payment::create([
            'booking_id' => $booking->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
            'payment_option' => $request->payment_option,
            'payment_address' => $this->getPaymentAddress($request->payment_method, $request->payment_option),
            'invoice_code' => $invoiceCode,
            'expiry_time' => $expiryTime,
            'amount' => $amount,
        ]);

        // Simpan data ke session (untuk tampilan status pembayaran)
        session([
            'booking_id' => $booking->id,
            'method' => $request->payment_method,
            'option' => $request->payment_option,
            'payment_address' => $payment->payment_address,
            'invoice_code' => $invoiceCode,
            'expiry_time' => $expiryTime->timestamp,
            'amount' => $booking->package->price,
        ]);

        return view('booking.status', [
            'booking' => $booking,
            'payment' => $payment
        ]);
    }



    private function getPaymentAddress($method, $option)
    {
        return match ($option) {
            'BCA' => '1234567890 (A/N PT Photobooth)',
            'BNI' => '5678901234 (A/N PT Photobooth)',
            'DANA' => '089912345678 (A/N PT Photobooth)',
            'OVO' => '081234567890 (A/N PT Photobooth)',
            default => '0000000000 (A/N PT Photobooth)',
        };
    }

    public function verifyPayment(Request $request)
    {
        $request->validate(['invoice_code' => 'required|string']);

        $payment = Payment::where('invoice_code', $request->invoice_code)->first();

        if ($payment) {
            $booking = $payment->booking;

            $booking->update(['status' => 'success']);
            
            // Bisa juga update status payment jika ada field status (tidak wajib)
            // $payment->update(['status' => 'paid']);

            session()->forget(['booking_id', 'method', 'option', 'payment_address', 'invoice_code', 'expiry_time']);

            return redirect()->route('home')->with('success', 'Pembayaran berhasil diverifikasi.');
        }

        return back()->with('error', 'Kode invoice salah atau tidak cocok.');
    }


    public function status($id)
    {
        $booking = Booking::findOrFail($id);
        $payment = Payment::where('booking_id', $id)->first();

        return view('booking.status', compact('booking', 'payment'));
    }


    public function showFeedbackForm($id) 
    {
        $booking = Booking::find($id);
        if (!$booking) {
            abort(404);
        }
        return view('booking.feedback', compact('booking'));
    }

    public function submitFeedback(Request $request, $bookingId)
    {
        // Validasi input
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        // Simpan feedback ke DB
        Feedback::create([
            'booking_id' => $bookingId,
            'user_id' => auth()->id(), // pastikan user sudah login
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? '',
        ]);

        return redirect()->route('dashboard')->with('success', 'Feedback berhasil dikirim');
    }
}
