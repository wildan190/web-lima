@extends('layouts.admin')

@section('title', 'Edit Gallery')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/gallery.css') }}">
@endpush

@section('content')
<div class="gallery-form">
    <h3>Edit Gallery</h3>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="picture_upload">Current Image</label>
        <img src="{{ asset('storage/' . $gallery->picture_upload) }}" class="preview-image" alt="Current Image">

        <label for="picture_upload">Change Image (optional)</label>
        <input type="file" name="picture_upload" id="picture_upload">

        <label for="sport_id">Sport</label>
        <select name="sport_id" id="sport_id" required>
            <option value="">-- Select Sport --</option>
            @foreach ($sports as $sport)
                <option value="{{ $sport->id }}" {{ $gallery->sport_id == $sport->id ? 'selected' : '' }}>
                    {{ $sport->name }}
                </option>
            @endforeach
        </select>

        <label for="description">Description</label>
        <textarea name="description" id="description">{{ old('description', $gallery->description) }}</textarea>

        <button type="submit" class="btn btn-submit">Update</button>
    </form>
</div>
@endsection
