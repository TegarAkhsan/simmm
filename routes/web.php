<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Auth::Routes();

Route::get('/', function () {
    return view(auth()->check() ? 'home' : 'auth.login');
})->name('home');

Route::get('/home', function () {
    return view('home'); // Pastikan file home.blade.php ada
})->middleware('auth')->name('home');

Route::get('/dashboard', function () {
    return view('home'); // Menggunakan halaman Dashboard
})->middleware('auth')->name('dashboard');

Route::get('/profile/edit-profile', function () {
    return view('profile.edit-profile');
})->name('profile.edit-profile');

Route::get('/password/change-password', function () {
    return view('password.change-password');
})->name('password.change-password');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


