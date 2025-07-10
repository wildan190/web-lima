@extends('layouts.admin')

@section('title', 'News Banner')

@section('content')
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn-submit {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #2c3e50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>

    <div class="form-container">
        <h3>News Banner</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.news_banner.store_or_update') }}" enctype="multipart/form-data">
            @csrf

            <label for="upload_picture">Picture</label>

            @if (!empty($newsBanner?->upload_picture))
                <div style="margin-bottom: 10px;">
                    <img src="{{ $newsBanner->upload_picture }}" alt="Current Image" style="max-width: 200px;">
                    <p><small>Current Image from GCS</small></p>
                </div>
            @endif

            <input type="file" name="upload_picture" id="upload_picture">


            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $newsBanner->title ?? '') }}">

            <label for="subtitle">Subtitle</label>
            <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $newsBanner->subtitle ?? '') }}">

            <button type="submit" class="btn-submit">Save</button>
        </form>
    </div>
@endsection
