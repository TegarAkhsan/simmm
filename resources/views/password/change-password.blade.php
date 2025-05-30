@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ganti Kata Sandi</h1>
    <form action="#" method="POST">
        @csrf
        <label for="old_password">Kata Sandi Lama:</label>
        <input type="password" id="old_password" name="old_password" class="form-control">

        <label for="new_password">Kata Sandi Baru:</label>
        <input type="password" id="new_password" name="new_password" class="form-control">

        <button type="submit" class="btn btn-primary mt-3">Ganti Kata Sandi</button>
    </form>
</div>
@endsection
