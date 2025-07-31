@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/sport.css') }}">
@endpush

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="h4 mb-0">Sport List Data Table</h3>
        <a href="{{ route('admin.sports.create') }}" class="btn btn-primary">+ Add Sport</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Logo</th>
                <th style="width: 150px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sports as $sport)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sport->name }}</td>
                    <td>
                        @if ($sport->logo)
                            @if (Str::startsWith($sport->logo, 'http'))
                                <img src="{{ $sport->logo }}" height="50">
                            @else
                                <img src="{{ asset('storage/' . $sport->logo) }}" height="50">
                            @endif
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.sports.edit', $sport->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>

                            <form action="{{ route('admin.sports.destroy', $sport->id) }}" method="POST"
                                class="form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No sports found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.form-delete');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action cannot be undone!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
