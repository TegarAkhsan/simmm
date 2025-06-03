@extends('layouts.app')

@section('title', 'Cetak Foto')

@section('content')
<div class="container text-center">
    <h1>Cetak Foto: {{ $photo->title }}</h1>

    <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->title }}" class="img-fluid mb-3" style="max-width: 600px;">

    <p>{{ $photo->description }}</p>

    <button onclick="window.print()" class="btn btn-primary">Cetak</button>
    <a href="{{ route('photos.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
