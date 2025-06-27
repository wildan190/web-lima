@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/custom/css/admin/sport.css') }}">
@endpush

@section('title', 'Create Sport')

@section('content')
<div class="web-profile-container">
    <h3>Create Sport</h3>

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.sport.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Sport Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="logo">Logo</label>
        <input type="file" name="logo" id="logo" accept="image/*">
        @error('logo')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Save</button>
        <a href="{{ route('admin.sport.index') }}" class="btn">Back</a>
    </form>
</div>
@endsection
