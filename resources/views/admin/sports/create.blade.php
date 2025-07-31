@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/sport.css') }}">
@endpush

@section('title', 'Create Sport')

@section('content')


    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.sport.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Sport Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            @error('name')
            </div>
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" name="logo" class="form-control" id="logo" accept="image/*">
            @error('logo')
            </div>
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('admin.sport.index') }}" class="btn btn-primary">Back</a>
        </div>
    </form>

@endsection
