@extends('layouts.app')

@section('title', 'Kelola Foto')

@section('content')
<div class="container">
    <h1>Kelola Foto</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($photos->count() == 0)
        <p>Belum ada foto yang diupload.</p>
    @else
    <div class="row">
        @foreach ($photos as $photo)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('storage/' . $photo->file_path) }}" class="card-img-top" alt="{{ $photo->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $photo->title }}</h5>
                    <p class="card-text">{{ Str::limit($photo->description, 100) }}</p>
                    <a href="{{ route('photos.preview', $photo) }}" class="btn btn-primary btn-sm">Preview</a>
                    <a href="{{ route('photos.edit', $photo) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('photos.print', $photo) }}" target="_blank" class="btn btn-success btn-sm">Cetak</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
