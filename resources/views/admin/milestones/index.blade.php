@extends('layouts.admin')

@section('title', 'Milestone')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/milestone.css') }}">
@endpush

@section('content')
<div class="milestone-container">
    <h3>Milestone List</h3>

    <a href="{{ route('admin.milestones.create') }}" class="btn btn-create">+ Add New Milestone</a>

    <table class="milestone-table">
        <thead>
            <tr>
                <th>Year</th>
                <th>Sport</th>
                <th>Location</th>
                <th>Description</th>
                <th>Image</th>
                <th style="width: 150px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($milestones as $milestone)
                <tr>
                    <td>{{ $milestone->year }}</td>
                    <td>{{ $milestone->sport->name ?? '-' }}</td>
                    <td>{{ $milestone->location }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($milestone->description, 50) }}</td>
                    <td>
                        @if ($milestone->picture_upload)
                            <img src="{{ asset('storage/' . $milestone->picture_upload) }}" alt="Milestone Image">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.milestones.edit', $milestone->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('admin.milestones.destroy', $milestone->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No milestones found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
