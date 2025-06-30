@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/web-profile.css') }}">
@endpush

@extends('layouts.admin')

@section('title', 'Web Profile Settings')

@section('content')
    <div class="web-profile-container">
        <h3>Web Profile Settings</h3>

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.web_profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="web_name">Web Name</label>
            <input type="text" name="web_name" id="web_name" value="{{ old('web_name', $profile->web_name ?? '') }}" required>

            <label for="logo">Logo (image)</label>
            <input type="file" name="logo" id="logo">
            @if(!empty($profile->logo))
                <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo">
            @endif

            <label for="history">History</label>
            <textarea name="history" id="history">{{ old('history', $profile->history ?? '') }}</textarea>

            <label for="about">About</label>
            <textarea name="about" id="about">{{ old('about', $profile->about ?? '') }}</textarea>

            <label for="vision">Vision</label>
            <textarea name="vision" id="vision">{{ old('vision', $profile->vision ?? '') }}</textarea>

            <label for="mission">Mission</label>
            <textarea name="mission" id="mission">{{ old('mission', $profile->mission ?? '') }}</textarea>

            <button type="submit">Save Profile</button>
        </form>
    </div>
@endsection
