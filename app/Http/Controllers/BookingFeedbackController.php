<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Feedback;

class BookingFeedbackController extends Controller
{
    public function store(Request $request, $bookingId)
    {
        $booking = Booking::where('id', $bookingId)
            ->where('user_id', auth()->id())
            ->where('status', 'completed')
            ->firstOrFail();

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string|max:1000',
        ]);

        Feedback::updateOrCreate(
            ['booking_id' => $booking->id],
            ['rating' => $request->rating, 'feedback' => $request->feedback]
        );

        return redirect()->back()->with('success', 'Feedback berhasil disimpan!');
    }
}
