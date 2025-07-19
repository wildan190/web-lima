@extends('layouts.admin')

@section('title', 'Gallery Banner')

@section('content')


<div class="mb-3">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.gallery_banner.store_or_update') }}" enctype="multipart/form-data">
        @csrf
    
        <label for="upload_picture" class="form-label">Picture</label>
    <div class="card shadow-sm">
        <div class="card-body">
    </div>
@if(!empty($galleryBanner?->upload_picture))
    <div style="margin-bottom: 10px;">
        <img src="{{ $galleryBanner->upload_picture }}" alt="Current Image" style="max-width: 200px;">
        <p><small>Image served from GCS</small></p>
    </div>
@endif
</div>
</div>

<input type="file" name="upload_picture" class="form-control" id="upload_picture">

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" placeholder="Title" name="title" class="form-control" id="title" value="{{ old('title', $galleryBanner->title ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="subtitle" class="form-label">Subtitle</label>
        <input type="text" placeholder="Subtitle" name="subtitle" class="form-control" id="subtitle" value="{{ old('subtitle', $galleryBanner->subtitle ?? '') }}">
</div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
</div>
    </form>
</div>
@endsection
