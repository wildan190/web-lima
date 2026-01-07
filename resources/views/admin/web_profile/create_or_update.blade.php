@push('styles')
<link rel="stylesheet" href="{{ asset('assets/custom/css/admin/web-profile.css') }}">
@endpush

@extends('layouts.admin')

@section('title', 'Web Profile Settings')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('admin.web_profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <!-- TITLE -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input 
                    type="text"
                    name="title"
                    id="title"
                    class="form-control"
                    placeholder="Title"
                    value="{{ old('title', $banner->title ?? '') }}">
            </div>


            <!-- SUBTITLE -->
            <div class="mb-3">
                <label for="subtitle" class="form-label">Subtitle</label>
                <input 
                    type="text"
                    name="subtitle"
                    id="subtitle"
                    class="form-control"
                    placeholder="Subtitle"
                    value="{{ old('subtitle', $banner->subtitle ?? '') }}">
            </div>


            <!-- WEB NAME -->
            <div class="mb-3">
                <label for="web_name" class="form-label">Web Name</label>
                <input 
                    type="text"
                    name="web_name"
                    id="web_name"
                    class="form-control"
                    placeholder="Nama Web"
                    value="{{ old('web_name', $profile->web_name ?? '') }}"
                    required>
            </div>


            <!-- LOGO -->
            <div class="mb-3">
                <label for="logo" class="form-label">Logo (image)</label>
                <input 
                    type="file"
                    name="logo"
                    id="logo"
                    class="form-control">
            </div>

            @if (!empty($profile->logo))
                <img src="{{ $profile->logo }}" 
                     alt="Logo" 
                     class="img-fluid mt-2" 
                     style="max-height: 80px;">
            @endif


            <!-- TEXT SECTIONS -->
            <div class="mb-3">
                <label for="history" class="form-label">History</label>
                <textarea 
                    name="history"
                    id="history"
                    class="form-control"
                    rows="3">{{ old('history', $profile->history ?? '') }}</textarea>
            </div>


            <div class="mb-3">
                <label for="about" class="form-label">About</label>
                <textarea 
                    name="about"
                    id="about"
                    class="form-control"
                    rows="3">{{ old('about', $profile->about ?? '') }}</textarea>
            </div>


            <div class="mb-3">
                <label for="vision" class="form-label">Vision</label>
                <textarea 
                    name="vision"
                    id="vision"
                    class="form-control"
                    rows="3">{{ old('vision', $profile->vision ?? '') }}</textarea>
            </div>


            <div class="mb-3">
                <label for="mission" class="form-label">Mission</label>
                <textarea 
                    name="mission"
                    id="mission"
                    class="form-control"
                    rows="3">{{ old('mission', $profile->mission ?? '') }}</textarea>
            </div>


            <!-- BUTTON -->
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    Save Web Profile
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
