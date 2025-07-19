@extends('layouts.admin')

@section('title', 'Contact Banner')

@section('content')
    <div class="mb-3">
        

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.contact_banner.store_or_update') }}" enctype="multipart/form-data">
            @csrf
    <div class="mb-3">
            <label for="upload_picture" class="form-label">Picture</label>
            <div class="card shadow-sm">
                <div class="card-body">
            @if (!empty($banner?->upload_picture))
                <div style="margin-bottom: 10px;">
                    <img src="{{ $banner->upload_picture }}" alt="Current Image" style="max-width: 200px;">
                    <p><small>Current image from Google Cloud Storage</small></p>
                </div>
    </div>
            @endif
</div>
</div>

            <input type="file" name="upload_picture" class="form-control" id="upload_picture">


            <label for="title" class="form-label">Title</label>
            <input type="text" placeholder="Title" name="title" class="form-control" id="title" value="{{ old('title', $banner->title ?? '') }}">

            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" placeholder="Subtitle" name="subtitle" class="form-control" id="subtitle" value="{{ old('subtitle', $banner->subtitle ?? '') }}">

            <button type="submit" class="btn btn-primary">Save</button>
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
