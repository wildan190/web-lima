@extends('layouts.admin')

@section('title', 'University Coverage')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/university_coverage.css') }}">
@endpush

@section('content')
<div class="web-profile-container">
    <h3>University Coverage List</h3>

    <a href="{{ route('admin.university-coverages.create') }}" class="btn">+ Add New University</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Logo</th>
                <th style="width: 150px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($coverages as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>
                        @if ($item->logo)
                            <img src="{{ $item->logo }}" alt="Logo" style="max-width: 100px;">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.university-coverages.edit', $item->id) }}" class="btn btn-edit">Edit</a>

                        <form action="{{ route('admin.university-coverages.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No university coverages found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
