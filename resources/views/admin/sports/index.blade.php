@extends('layouts.admin')

@section('title', 'Sport List')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/sport.css') }}">
@endpush

@section('content')
<div class="web-profile-container">
    <h3>All Sports</h3>

    <a href="{{ route('admin.sports.create') }}" class="btn btn-primary mb-3">+ Add Sport</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Logo</th>
                <th style="width: 150px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sports as $sport)
                <tr>
                    <td>{{ $sport->name }}</td>
                    <td>
                        @if ($sport->logo)
                            @if(Str::startsWith($sport->logo, 'http'))
                                <img src="{{ $sport->logo }}" height="50">
                            @else
                                <img src="{{ asset('storage/' . $sport->logo) }}" height="50">
                            @endif
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.sports.edit', $sport->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.sports.destroy', $sport->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this sport?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No sports found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
