@extends('layouts.app')

@section('title', 'Edit Foto')

@section('content')
<div class="container">
    <h1>Edit Foto</h1>

    <form action="{{ route('photos.update', $photo) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $photo->title) }}" required>
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $photo->description) }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Ganti Foto (opsional)</label>
            <input type="file" id="file" name="file" class="form-control" accept="image/*">
            @error('file')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('photos.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
