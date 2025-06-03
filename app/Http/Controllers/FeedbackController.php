<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Cek jika user punya order ini
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

        // Buat feedback baru atau update jika sudah ada
        $feedback = Feedback::updateOrCreate(
            ['order_id' => $order->id, 'user_id' => Auth::id()],
            ['rating' => $request->rating, 'comment' => $request->comment]
        );

        return redirect()->back()->with('success', 'Feedback berhasil disimpan!');
    }
}
