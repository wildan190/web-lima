@extends('layouts.admin')

@section('title', 'Add Milestone')

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

    <form action="{{ route('admin.milestones.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="text" placeholder="Year" name="year" class="form-control" value="{{ old('year') }}" required>

            <label for="sport_id" class="form-label">Sport</label>
            <select name="sport_id" class="form-control" required>
                <option value="">-- Select Sport --</option>
                @foreach ($sports as $sport)
                    <option value="{{ $sport->id }}" {{ old('sport_id') == $sport->id ? 'selected' : '' }}>
                        {{ $sport->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="picture_upload" class="form-label">Picture</label>
            <input type="file" name="picture_upload" class="form-control" accept="image/*">
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    </div>
@endsection
