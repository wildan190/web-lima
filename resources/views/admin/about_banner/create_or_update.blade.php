@extends('layouts.admin')

@section('title', 'About Banner')

@section('content')
    <style>
        .form-container {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 8px;
            max-width: 600px;
            margin: 30px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h3 {
            margin-bottom: 20px;
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }

        .form-container label {
            display: block;
            margin-top: 15px;
            font-weight: 500;
            color: #444;
        }

        .form-container input[type="text"],
        .form-container input[type="file"] {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container .btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3490dc;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container .btn:hover {
            background-color: #2779bd;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        img {
            display: block;
            margin-top: 10px;
            max-height: 150px;
            object-fit: contain;
        }
    </style>

    <div class="form-container">
        <h3>About Banner</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.about_banner.store_or_update') }}" enctype="multipart/form-data">
            @csrf

            <label for="upload_picture">Picture</label>

@if (!empty($banner?->upload_picture))
    <div style="margin-bottom: 10px;">
        <img src="{{ $banner->upload_picture }}" alt="Current Image" style="max-height: 200px;">
        <p><small>Current Image from GCS</small></p>
    </div>
@endif

<input type="file" name="upload_picture" id="upload_picture" accept="image/*">



            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $banner->title ?? '') }}">

            <label for="subtitle">Subtitle</label>
            <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $banner->subtitle ?? '') }}">

            <button type="submit" class="btn">Save</button>
        </form>
    </div>
@endsection
