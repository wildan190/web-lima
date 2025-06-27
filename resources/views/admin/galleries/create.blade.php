@extends('layouts.admin')

@section('title', 'Add New Gallery')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/gallery.css') }}">
@endpush

@section('content')
<div class="gallery-form">
    <h3>Add New Gallery</h3>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="picture_upload">Upload Image</label>
        <input type="file" name="picture_upload" id="picture_upload" required>

        <label for="sport_id">Sport</label>
        <select name="sport_id" id="sport_id" required>
            <option value="">-- Select Sport --</option>
            @foreach (\App\Models\Sport::all() as $sport)
                <option value="{{ $sport->id }}">{{ $sport->name }}</option>
            @endforeach
        </select>

        <label for="description">Description</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>

        <button type="submit" class="btn btn-submit">Save</button>
    </form>
</div>
@endsection
