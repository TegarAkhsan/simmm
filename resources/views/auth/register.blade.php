@extends('layouts.app')
@section('noFooter')
@section('content')
<div class="container" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-5 col-sm-8">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-header bg-primary text-white text-center rounded-top-4 px-4 py-3">
                    <div class="fs-4 fw-bold">Register Miuw Photobooth</div>
                    <div class="small text-white-50">Buat akun untuk melanjutkan ke layanan photobooth</div>
                </div>


                <div class="card-body px-4 py-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Enter your full name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email"
                                placeholder="example@mail.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="new-password" placeholder="Enter a secure password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-semibold">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Re-type your password">
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary fw-semibold py-2">
                                Register
                            </button>
                        </div>

                        <div class="text-center">
                            <small class="text-muted">Already have an account? <a href="{{ route('login') }}">Login here</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
