@extends('layouts.admin')

@section('title', 'News')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/admin/news.css') }}">
@endpush

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Daftar Berita</h5>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Tambah Berita</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($item->picture_upload)
                                        <img src="{{ asset($item->picture_upload) }}" alt="News Image" class="img-thumbnail" style="max-width: 100px;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->category }}</td>
                                <td class="text-muted">{{ $item->slug }}</td>
                                <td><span class="badge bg-secondary">{{ ucfirst($item->status) }}</span></td>
                                <td class="text-end">
                                    <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
