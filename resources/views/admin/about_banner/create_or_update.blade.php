@extends('layouts.admin')

@section('title', 'About Banner')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.about_banner.store_or_update') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="upload_picture" class="form-label">Picture</label>

            <div class="card shadow-sm">
                <div class="card-body">
                    @if (!empty($banner?->upload_picture))
                        <div class="text-center mb-3">
                            <img src="{{ $banner->upload_picture }}" alt="Current Image" class="img-fluid rounded"
                                style="width: 100%; height: 200px; object-fit: cover;">
                            <p><small>Current Image from GCS</small></p>
                        </div>
                    @else
                        <p class="text-center text-muted">No image uploaded</p>
                    @endif
                </div>
            </div>

            <input type="file" name="upload_picture" class="form-control mt-3" id="upload_picture" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title"
                value="{{ old('title', $banner->title ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" name="subtitle" class="form-control" id="subtitle"
                value="{{ old('subtitle', $banner->subtitle ?? '') }}">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection
