@extends('layouts.admin')
@section('title', 'Edit Hero')

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Edit Hero</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Current Picture</label>
                    @if ($hero->picture_upload)
                        <div class="mb-2">
                            <img src="{{ Str::startsWith($hero->picture_upload, 'http') ? $hero->picture_upload : asset('storage/' . $hero->picture_upload) }}" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    @else
                        <p class="text-muted mb-3">No picture uploaded.</p>
                    @endif

                    <label for="picture_upload" class="form-label">Change Picture</label>
                    <input type="file" name="picture_upload" class="form-control @error('picture_upload') is-invalid @enderror" id="picture_upload">
                    @error('picture_upload')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" placeholder="Title" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $hero->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" placeholder="Subtitle" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" value="{{ old('subtitle', $hero->subtitle) }}">
                    @error('subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.hero.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection
