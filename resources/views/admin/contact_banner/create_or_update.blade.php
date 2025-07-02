@extends('layouts.admin')

@section('title', 'Contact Banner')

@section('content')
    <div class="form-container">
        <h3>Contact Banner</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.contact_banner.store_or_update') }}" enctype="multipart/form-data">
            @csrf

            <label for="upload_picture">Picture</label>
            @if(!empty($banner?->upload_picture))
                <img src="{{ asset('storage/' . $banner->upload_picture) }}" alt="Current Image" style="max-width: 200px; margin-bottom: 10px;">
            @endif
            <input type="file" name="upload_picture" id="upload_picture">

            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $banner->title ?? '') }}">

            <label for="subtitle">Subtitle</label>
            <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $banner->subtitle ?? '') }}">

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
