@extends('layouts.admin')

@section('title', 'Create Sport')

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Create Sport</h4>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.sports.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Sport Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="logo" accept="image/*">
                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.sports.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection
