@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/web-profile.css') }}">
@endpush

@extends('layouts.admin')

@section('title', 'Web Profile Settings')

@section('content')

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.web_profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    <div class="mb-3>
        <labael for="title" class="form-label">Title</label>
        <input type="text" placeholder="Titile" name="title" class="form-control" id="title"
        value="{{ old('title', $banner->title ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="subtitile" class="form-label">Subtitle</label>
        <input type="text" placeholder="Subtitle" name="subtitle" class="form-control" id="subtitle"
        value="{{ old('subtitle', $banner->subtitle ?? '') }}">
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

    <div class="mb-3">
            <label class="form-label" for="web_name">Web Name</label>
            <input type="text" placeholder="Nama Web" name="web_name" class="form-control id="web_name" value="{{ old('web_name', $profile->web_name ?? '') }}"
                required>
    </div>

    <div class="mb-3">
            <label class="form-label" for="logo">Logo (image)</label>
            <input type="file" name="logo" class="form-control" id="logo">
    </div>
            @if (!empty($profile->logo))
                <img src="{{ $profile->logo }}" alt="Logo" style="max-height: 80px; margin-top: 10px;">
            @endif

        <div class="mb-3">
            <label for="history" class="form-label">History</label>
            <textarea name="history" class="form-control" id="history">{{ old('history', $profile->history ?? '') }}</textarea>

            <label for="about" class="form-label">About</label>
            <textarea name="about" class="form-control" id="about">{{ old('about', $profile->about ?? '') }}</textarea>

            <label for="vision" class="form-label">Vision</label>
            <textarea name="vision" class="form-control" id="vision">{{ old('vision', $profile->vision ?? '') }}</textarea>

            <label for="mission" class="form-label">Mission</label>
            <textarea name="mission" class="form-control" id="mission">{{ old('mission', $profile->mission ?? '') }}</textarea>
<div class="mt-3">
            <button type="submit" class="btn btn-primary">Save Profile</button>
</div>
    </div>
        </form>
    
@endsection
