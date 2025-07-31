@extends('layouts.admin')

@section('title', 'Add New Gallery')

@section('content')

    @if ($errors->any())
        <div class="error-message">
            <ul>
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
            <input type="file" name="picture_upload" class="form-control" id="picture_upload" required>
        </div>
        <div class="mb-3">
            <label for="sport_id" class="form-label">Sport</label>
            <select name="sport_id" class="form-control" id="sport_id" required>
                <option value="">-- Select Sport --</option>
                @foreach (\App\Models\Sport::all() as $sport)
                    <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection
