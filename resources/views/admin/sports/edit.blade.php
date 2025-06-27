@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/custom/css/admin/sport.css') }}">
@endpush

@section('title', 'Edit Sport')

@section('content')
<div class="web-profile-container">
    <h3>Edit Sport</h3>

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.sport.update', $sport->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Sport Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $sport->name) }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="logo">Current Logo</label><br>
        @if($sport->logo)
            <img src="{{ asset('storage/' . $sport->logo) }}" alt="Sport Logo">
        @else
            <p>No logo uploaded.</p>
        @endif

        <label for="logo">Change Logo</label>
        <input type="file" name="logo" id="logo" accept="image/*">
        @error('logo')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Update</button>
        <a href="{{ route('admin.sport.index') }}" class="btn">Back</a>
    </form>
</div>
@endsection
