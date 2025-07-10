@extends('layouts.admin')

@section('title', 'News')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/news.css') }}">
@endpush

@section('content')
<div class="news-container">
    <h3>News List</h3>

    <a href="{{ route('admin.news.create') }}" class="btn btn-create">+ Add New News</a>

    <table class="news-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Status</th>
                <th style="width: 150px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($item->picture_upload)
                            <img src="{{ $item->picture_upload }}" alt="News Image" style="max-width: 120px;">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
