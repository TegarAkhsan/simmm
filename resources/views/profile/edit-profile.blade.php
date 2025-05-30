@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profil</h1>
    <form action="#" method="POST">
        @csrf
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="form-control">
        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
    </form>
</div>
@endsection
