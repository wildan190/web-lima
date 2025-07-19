@extends('layouts.admin')

@section('title', 'News Banner')

@section('content')


        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.news_banner.store_or_update') }}" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="upload_picture" class="form-label">Picture</label>
        <div class="card shadow-sm">
            <div class="card-body">


            @if (!empty($newsBanner?->upload_picture))
                <div style="margin-bottom: 10px;">
                    <img src="{{ $newsBanner->upload_picture }}" alt="Current Image" style="max-width: 200px;">
                    <p><small>Current Image from GCS</small></p>
                </div>
            @endif
</div>
</div>
        
            <input type="file" name="upload_picture" class="form-control mt-3" id="upload_picture">

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" placeholder="Title" class="form-control" name="title" id="title" value="{{ old('title', $newsBanner->title ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" placeholder="Subtitle" name="subtitle" class="form-control" id="subtitle" value="{{ old('subtitle', $newsBanner->subtitle ?? '') }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
    </div>
@endsection
