@extends('layouts.admin')

@section('title', 'Add Milestone')

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Add Milestone</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.milestones.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="text" placeholder="Year" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}" required>
                    @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="sport_id" class="form-label">Sport</label>
                    <select name="sport_id" class="form-control @error('sport_id') is-invalid @enderror" required>
                        <option value="">-- Select Sport --</option>
                        @foreach ($sports as $sport)
                            <option value="{{ $sport->id }}" {{ old('sport_id') == $sport->id ? 'selected' : '' }}>
                                {{ $sport->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('sport_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="picture_upload" class="form-label">Picture</label>
                    <input type="file" name="picture_upload" class="form-control @error('picture_upload') is-invalid @enderror" accept="image/*">
                    @error('picture_upload')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.milestones.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
