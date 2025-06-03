<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingFeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\FeedbackController;

// Homepage
Route::get('/', function () {
    return view('home'); // Pastikan file ini ada di resources/views/home.blade.php
})->name('home');

// Dashboard bisa disesuaikan kalau kamu ingin halaman berbeda untuk user login
Route::get('/dashboard', function () {
    return view('home'); // Ganti view lain jika perlu
})->name('dashboard');

// Profil
Route::get('/profile/edit-profile', function () {
    return view('profile.edit-profile');
})->name('profile.edit-profile');

Route::get('/password/change-password', function () {
    return view('password.change-password');
})->name('password.change-password');

// Event & Service
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/services', function () {
    return view('services.index');
})->name('services.index');

Route::resource('rooms', RoomController::class);

// Booking (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

     // Order (Riwayat Pemesanan)
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/{order}/feedback', [FeedbackController::class, 'store'])->name('orders.feedback.store');

    // Kelola Foto
    Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
    Route::get('/photos/{photo}/preview', [PhotoController::class, 'preview'])->name('photos.preview');
    Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
    Route::put('/photos/{photo}', [PhotoController::class, 'update'])->name('photos.update');
    Route::get('/photos/{photo}/print', [PhotoController::class, 'print'])->name('photos.print');
    Route::post('/photos/{photo}/download', [PhotoController::class, 'download'])->name('photos.download');

    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    Route::get('/booking/{id}/payment', [BookingController::class, 'payment'])->name('booking.payment');
    Route::post('/booking/{id}/pay', [BookingController::class, 'processPayment'])->name('booking.processPayment');
    Route::post('/booking/verify-payment', [BookingController::class, 'verifyPayment'])->name('booking.verifyPayment');

    Route::get('/booking/{id}/status', [BookingController::class, 'status'])->name('booking.status');
    Route::get('/booking/{id}/feedback', [BookingController::class, 'showFeedbackForm'])->name('booking.feedback.form');
    Route::post('/booking/{id}/feedback', [BookingController::class, 'submitFeedback'])->name('booking.feedback.submit');

});

// Autentikasi
Auth::routes();

//feedback
Route::post('/booking/{booking}/feedback', [BookingFeedbackController::class, 'store'])
    ->middleware('auth')
    ->name('booking.feedback');