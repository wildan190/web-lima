@extends('layouts.admin')

@section('title', 'Contact Banner')

@section('content')

    <div class="mb-3">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- FORM DITAMBAHKAN KARENA HILANG -->
        <form method="POST" action="{{ route('admin.contact_banner.store_or_update') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="upload_picture" class="form-label">Picture</label>

                <div class="card shadow-sm">
                    <div class="card-body">

                        @php
                            $imageUrl = null;
                            if (!empty($banner?->upload_picture)) {
                                // Jika sudah berupa full URL (Google Cloud Storage)
                                if (Str::startsWith($banner->upload_picture, 'http')) {
                                    $imageUrl = $banner->upload_picture;
                                } else {
                                    // Jika hanya path, buat URL storage
                                    $imageUrl = Storage::url($banner->upload_picture);
                                }
                            }
                        @endphp

                        @if ($imageUrl)
                            <div class="text-center mb-3">
                                <img src="{{ $imageUrl }}" alt="Current Image" class="img-fluid rounded"
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

            <label for="title" class="form-label">Title</label>
            <input type="text" placeholder="Title" name="title" class="form-control" id="title"
                value="{{ old('title', $banner->title ?? '') }}">

            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" placeholder="Subtitle" name="subtitle" class="form-control" id="subtitle"
                value="{{ old('subtitle', $banner->subtitle ?? '') }}">

            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
@endsection

<style>
    .form-container {
        max-width: 600px;
        margin: auto;
    }

    label {
        display: block;
        margin-top: 15px;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
    }

    .btn-primary {
        margin-top: 20px;
        background-color: #3490dc;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #2779bd;
    }

    .alert-success {
        background-color: #d4edda;
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
        color: #155724;
    }
</style>
