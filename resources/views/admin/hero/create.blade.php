@extends('layouts.admin')
@section('title', 'Create Hero')

@section('content')

    <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="picture_upload" class="form-label">Picture</label>
            <input type="file" name="picture_upload" class="form-control" id="picture_upload" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" placeholder="Titile" name="title" class="form-control" id="title" value="{{ old('title') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" placeholder="Subtitile" name="subtitle" class="form-control" id="subtitle" value="{{ old('subtitle') }}" class="form-control">
        </div>
<div class="mt-3">
        <button type="submit" class="btn btn-primary">Save</button>
</div>
    </form>


@endsection
