@extends('layouts.app')

@section('noFooter')
@section('title', 'Login | Miuw Photobooth')
@endsection

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
  <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%; border-radius: 12px;">
    <div class="text-center mb-4">
      <img src="{{ asset('images/logo-miuw.png') }}" alt="Miuw Photobooth" style="height: 60px;">
      <h2 class="mt-3 fw-bold text-primary">Login Miuw Photobooth</h2>
      <p class="text-muted">Masuk untuk melanjutkan ke layanan photobooth</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf
      
      <div class="mb-3">
        <label for="email" class="form-label fw-semibold">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
          name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan email">
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
          name="password" required placeholder="Masukkan password">
        @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label" for="remember">
            Ingat saya
          </label>
        </div>
        <a href="{{ route('password.request') }}" class="text-primary text-decoration-none">Lupa password?</a>
      </div>

      <button type="submit" class="btn btn-primary w-100 fw-bold">Masuk</button>
    </form>

    <p class="text-center mt-4 text-muted">
      Belum punya akun? 
      <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-semibold">Daftar sekarang</a>
    </p>
  </div>
</div>
@endsection
