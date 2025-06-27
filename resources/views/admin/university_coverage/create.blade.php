@extends('layouts.admin')

@section('title', 'Add University Coverage')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/university_coverage.css') }}">
@endpush

@section('content')
<div class="web-profile-container">
    <h3>Add University Coverage</h3>

    <form action="{{ route('admin.university-coverages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label for="logo">Logo</label>
        <input type="file" name="logo" accept="image/*">

        <button type="submit">Save</button>
    </form>
</div>
@endsection
