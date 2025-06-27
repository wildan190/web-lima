@extends('layouts.admin')

@section('title', 'Gallery')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/gallery.css') }}">
@endpush

@section('content')
<div class="gallery-container">
    <h3>Gallery List</h3>

    <a href="{{ route('admin.galleries.create') }}" class="btn btn-create">+ Add New Gallery</a>

    <table class="gallery-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Sport</th>
                <th>Description</th>
                <th style="width: 150px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($galleries as $gallery)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $gallery->picture_upload) }}" alt="Gallery Image">
                    </td>
                    <td>{{ $gallery->sport->name ?? '-' }}</td>
                    <td>{{ $gallery->description }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No galleries found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
