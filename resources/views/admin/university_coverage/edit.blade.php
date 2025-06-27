@extends('layouts.admin')

@section('title', 'Edit University Coverage')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/university_coverage.css') }}">
@endpush

@section('content')
<div class="web-profile-container">
    <h3>Edit University Coverage</h3>

    <form action="{{ route('admin.university-coverages.update', $coverage->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name', $coverage->name) }}" required>

        <label for="logo">Logo</label>
        @if ($coverage->logo)
            <img src="{{ asset('storage/' . $coverage->logo) }}" alt="Logo">
        @endif
        <input type="file" name="logo" accept="image/*">

        <button type="submit">Update</button>
    </form>
</div>
@endsection
