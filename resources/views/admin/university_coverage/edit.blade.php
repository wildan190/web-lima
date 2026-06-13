@extends('layouts.admin')

@section('title', 'Edit University Coverage')

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Edit University Coverage</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.university-coverages.update', $coverage->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $coverage->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Logo</label>
                    @if ($coverage->logo)
                        <div class="mb-2">
                            <img src="{{ Str::startsWith($coverage->logo, 'http') ? $coverage->logo : asset('storage/' . $coverage->logo) }}" height="80" class="img-thumbnail" alt="Logo">
                        </div>
                    @else
                        <p class="text-muted mb-3">No logo uploaded.</p>
                    @endif

                    <label for="logo" class="form-label">Change Logo</label>
                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.university-coverages.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
