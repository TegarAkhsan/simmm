@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 480px;">
    <h1 class="mb-4 text-center">Ganti Kata Sandi</h1>

    <form action="#" method="POST" novalidate>
        @csrf

        {{-- Kata Sandi Lama --}}
        <div class="mb-3">
            <label for="old_password" class="form-label">Kata Sandi Lama</label>
            <input
                type="password"
                id="old_password"
                name="old_password"
                class="form-control @error('old_password') is-invalid @enderror"
                required
            >
            @error('old_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kata Sandi Baru --}}
        <div class="mb-3">
            <label for="new_password" class="form-label">Kata Sandi Baru</label>
            <input
                type="password"
                id="new_password"
                name="new_password"
                class="form-control @error('new_password') is-invalid @enderror"
                required
            >
            @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Konfirmasi Kata Sandi Baru (Opsional tapi disarankan) --}}
        <div class="mb-4">
            <label for="new_password_confirmation" class="form-label">Konfirmasi Kata Sandi Baru</label>
            <input
                type="password"
                id="new_password_confirmation"
                name="new_password_confirmation"
                class="form-control"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Ganti Kata Sandi
        </button>
    </form>
</div>
@endsection
