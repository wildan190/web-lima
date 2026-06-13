@extends('layouts.admin')

@section('title', 'Add New Gallery')

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Add New Gallery</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="picture_upload" class="form-label">Upload Image</label>
                    <input type="file" name="picture_upload" class="form-control @error('picture_upload') is-invalid @enderror" id="picture_upload" required>
                    @error('picture_upload')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="sport_id" class="form-label">Sport</label>
                    <select name="sport_id" class="form-control @error('sport_id') is-invalid @enderror" id="sport_id" required>
                        <option value="">-- Select Sport --</option>
                        @foreach (\App\Models\Sport::all() as $sport)
                            <option value="{{ $sport->id }}" {{ old('sport_id') == $sport->id ? 'selected' : '' }}>{{ $sport->name }}</option>
                        @endforeach
                    </select>
                    @error('sport_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection
