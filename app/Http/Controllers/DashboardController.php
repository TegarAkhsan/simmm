<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $bookings = Booking::with('feedback')->where('user_id', $user->id)->latest()->get();

        return view('dashboard.index', compact('bookings')); // <-- view yang benar
    }

}
