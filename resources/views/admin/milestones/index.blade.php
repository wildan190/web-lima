@extends('layouts.admin')

@section('title', 'Milestone')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Milestones</h5>
        <a href="{{ route('admin.milestones.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add New Milestone
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Year</th>
                            <th>Sport</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th class="text-end" style="width: 180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($milestones as $milestone)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $milestone->year }}</td>
                                <td>{{ $milestone->sport->name ?? '-' }}</td>
                                <td>{{ $milestone->location }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($milestone->description, 50) }}</td>
                                <td>
                                    @if ($milestone->picture_upload)
                                        <img src="{{ asset($milestone->picture_upload) }}" alt="Milestone Image" class="img-thumbnail" style="max-width: 120px;">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('admin.milestones.edit', $milestone->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.milestones.destroy', $milestone->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">No milestones found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
