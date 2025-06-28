@extends('layouts.admin')

@section('title', 'Edit Milestone')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/milestone.css') }}">
@endpush

@section('content')
<div class="milestone-form">
    <h3>Edit Milestone</h3>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.milestones.update', $milestone->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="year">Year</label>
        <input type="text" name="year" value="{{ old('year', $milestone->year) }}" required>

        <label for="sport_id">Sport</label>
        <select name="sport_id" required>
            <option value="">-- Select Sport --</option>
            @foreach ($sports as $sport)
                <option value="{{ $sport->id }}" {{ old('sport_id', $milestone->sport_id) == $sport->id ? 'selected' : '' }}>
                    {{ $sport->name }}
                </option>
            @endforeach
        </select>

        <label for="location">Location</label>
        <input type="text" name="location" value="{{ old('location', $milestone->location) }}" required>

        <label for="description">Description</label>
        <textarea name="description" required>{{ old('description', $milestone->description) }}</textarea>

        <label for="picture_upload">Picture</label>
        @if ($milestone->picture_upload)
            <img src="{{ asset('storage/' . $milestone->picture_upload) }}" alt="Milestone Image" class="preview-image">
        @endif
        <input type="file" name="picture_upload" accept="image/*">

        <button type="submit" class="btn btn-submit">Update</button>
    </form>
</div>
@endsection
