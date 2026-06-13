@extends('layouts.admin')

@section('title', 'Edit Sport')

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Edit Sport</h4>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.sports.update', $sport->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Sport Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $sport->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Logo</label>
                    @if ($sport->logo)
                        <div class="mb-2">
                            <img src="{{ Str::startsWith($sport->logo, 'http') ? $sport->logo : asset('storage/' . $sport->logo) }}" height="80" class="img-thumbnail" alt="Sport Logo">
                        </div>
                    @else
                        <p class="text-muted mb-3">No logo uploaded.</p>
                    @endif

                    <label for="logo" class="form-label">Change Logo</label>
                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="logo" accept="image/*">
                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.sports.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection
