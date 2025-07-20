@extends('layouts.admin')

@section('title', 'Milestone Banner')

@section('content')

    

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.milestone_banner.store_or_update') }}" enctype="multipart/form-data">
        @csrf
<div class="mb-3">
        <label for="upload_picture" class="form-label">Picture</label>
  
        
   <div class="card shadow-sm">
    <div class="card-body">  

@if(!empty($banner?->upload_picture))
    <div style="margin-bottom: 10px;">
        <img src="{{ $banner->upload_picture }}" alt="Current Image" style="max-width: 200px;">
        <p><small>Current Image from GCS</small></p>
    </div>
@endif
</div>
</div>

<input type="file" name="upload_picture" class="form-control mt-3" id="upload_picture">

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" placeholder="Title" name="title" class="form-control" id="title" class="form-control mt-3" value="{{ old('title', $banner->title ?? '') }}">
    </div>
<div class="mb-3">
        <label for="subtitle" class="form-label">Subtitle</label>
        <input type="text" placeholder="Subtitle" name="subtitle" class="form-control" id="subtitle" value="{{ old('subtitle', $banner->subtitle ?? '') }}">
</div>
<div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
</div>
    </form>
</div>
@endsection
