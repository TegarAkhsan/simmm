@extends('layouts.app')

@section('title', 'Preview Foto')

@section('content')
<div class="container">
    <h1>Preview Foto: {{ $photo->title }}</h1>

    <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->title }}" class="img-fluid mb-3">

    <p>{{ $photo->description }}</p>

    <a href="{{ route('photos.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
