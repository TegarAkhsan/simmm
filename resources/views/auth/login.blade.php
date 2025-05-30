@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control">

        <label for="password">Kata Sandi:</label>
        <input type="password" id="password" name="password" class="form-control">

        <button type="submit" class="btn btn-primary mt-3">Login</button>
    </form>
</div>
@endsection
