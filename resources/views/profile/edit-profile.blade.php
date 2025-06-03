@extends('layouts.app')

@section('content')
<div class="container py-4" style="max-width: 700px;">
    <h1 class="mb-4 text-center">Edit Profil Miuw Photobooth</h1>

    <form action="{{ route('profile.edit-profile') }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        {{-- Nama Lengkap --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', Auth::user()->name) }}"
                class="form-control @error('name') is-invalid @enderror"
                required
                autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', Auth::user()->email) }}"
                class="form-control @error('email') is-invalid @enderror"
                required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nomor Telepon --}}
        <div class="mb-3">
            <label for="phone" class="form-label">Nomor Telepon</label>
            <input
                type="tel"
                id="phone"
                name="phone"
                value="{{ old('phone', Auth::user()->phone ?? '') }}"
                class="form-control @error('phone') is-invalid @enderror"
                placeholder="0812xxxxxxx">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Bio Singkat --}}
        <div class="mb-3">
            <label for="bio" class="form-label">Tentang Saya</label>
            <textarea
                id="bio"
                name="bio"
                rows="3"
                class="form-control @error('bio') is-invalid @enderror"
                placeholder="Ceritakan sedikit tentang Anda...">{{ old('bio', Auth::user()->bio ?? '') }}</textarea>
            @error('bio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Metode Pembayaran --}}
        <div class="mb-3">
            <label for="payment_method" class="form-label">Metode Pembayaran Favorit</label>
            <select
                id="payment_method"
                name="payment_method"
                class="form-select @error('payment_method') is-invalid @enderror"
            >
                <option value="" disabled selected>Pilih metode pembayaran</option>
                @php
                    $methods = ['Bank Transfer - BRI', 'Bank Transfer - BCA', 'OVO', 'GoPay', 'Dana', 'Cash'];
                    $selectedMethod = old('payment_method', Auth::user()->payment_method ?? '');
                @endphp
                @foreach($methods as $method)
                    <option value="{{ $method }}" {{ $selectedMethod === $method ? 'selected' : '' }}>
                        {{ $method }}
                    </option>
                @endforeach
            </select>
            @error('payment_method')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="address" class="form-label">Alamat Lengkap</label>
            <textarea
                id="address"
                name="address"
                rows="2"
                class="form-control @error('address') is-invalid @enderror"
                placeholder="Jl. Contoh No. 123, Kota, Provinsi">{{ old('address', Auth::user()->address ?? '') }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal Lahir --}}
        <div class="mb-3">
            <label for="birthdate" class="form-label">Tanggal Lahir</label>
            <input
                type="date"
                id="birthdate"
                name="birthdate"
                value="{{ old('birthdate', Auth::user()->birthdate ?? '') }}"
                class="form-control @error('birthdate') is-invalid @enderror">
            @error('birthdate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Social Media --}}
        <div class="mb-3">
            <label for="instagram" class="form-label">Instagram</label>
            <input
                type="text"
                id="instagram"
                name="instagram"
                value="{{ old('instagram', Auth::user()->instagram ?? '') }}"
                class="form-control @error('instagram') is-invalid @enderror"
                placeholder="misal: @username">
            @error('instagram')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol Submit --}}
        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
    </form>
</div>
@endsection
