@extends('layouts.admin')

@section('title', 'Create News')

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('assets/custom/css/admin/news.css') }}" rel="stylesheet">
    
@endpush

@section('content')
    

        <form method="POST" action="{{ route('admin.news.store') }}" class="news-form" enctype="multipart/form-data" id="news-form">
            @csrf

            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" placeholder="Title" name="title" class="form-control" id="title" value="{{ old('title') }}">
</div>
<div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" placeholder="Subtitile" name="subtitle" class="form-control" id="subtitle" value="{{ old('subtitle') }}">
</div>
<div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" placeholder="Slug" name="slug" class="form-control" id="slug" value="{{ old('slug') }}">
</div>
<div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category">
                <option value="Basketball" {{ old('category') == 'Basketball' ? 'selected' : '' }}>Basketball</option>
                <option value="Futsall" {{ old('category') == 'Futsall' ? 'selected' : '' }}>Futsall</option>
                <option value="Badminton" {{ old('category') == 'Badminton' ? 'selected' : '' }}>Badminton</option>
                <option value="Golf" {{ old('category') == 'Golf' ? 'selected' : '' }}>Golf</option>
                <option value="Swimming" {{ old('category') == 'Swimming' ? 'selected' : '' }}>Swimming</option>
                <option value="Mini Socer" {{ old('category') == 'Mini Socer' ? 'selected' : '' }}>Mini Socer</option>
                <option value="eSport" {{ old('category') == 'eSport' ? 'selected' : '' }}>eSport</option>
                <option value="Volley Ball" {{ old('category') == 'Volley Ball' ? 'selected' : '' }}>Volley Ball</option>
            </select>
</div>
<div class="mb-3">
            <label for="picture_upload" class="form-label">Picture</label>
            <input type="file" name="picture_upload" class="form-control" id="picture_upload">
            <img id="preview-image" alt="Image Preview" />
</div>
<div class="mb-3">
            <label for="tag" class="form-label">Tag</label>
            <input type="text" placeholder="Tag" name="tag" class="form-control" id="tag" value="{{ old('tag') }}">
</div>
<div class="mb-3">
            <label for="keywords" class="form-label">Keywords</label>
            <input type="text" placeholder="Keywords" name="keywords" class="form-control" id="keywords" value="{{ old('keywords') }}">
</div>
<div class="mb-3">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                <option value="hidden" {{ old('status') == 'hidden' ? 'selected' : '' }}>Hidden</option>
            </select>
</div>
<div class="mb-3">
            <label for="editor-container">Content</label>
            <div id="editor-container"></div>
            <input type="hidden" name="content" id="content" value="{{ old('content') }}">
</div>
<div class="mb-3">
            <button type="submit" class="btn btn-submit">Submit</button>
</div>
        </form>
    
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Quill Init
        const quill = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: 'Write your news content here...'
        });

        const oldContent = `{!! str_replace(['\\', "'", '"'], ['\\\\', "\\'", '\\"'], old('content')) !!}`;
        quill.root.innerHTML = oldContent;

        const form = document.getElementById('news-form');
        const contentInput = document.getElementById('content');

        form.addEventListener('submit', function (e) {
            const html = quill.root.innerHTML;
            const plainText = quill.getText().trim();

            if (plainText.length === 0 || html === '<p><br></p>') {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Content field is required.',
                    confirmButtonColor: '#d33'
                });
                return;
            }

            contentInput.value = html;
        });

        // Slug Generator
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');

        titleInput.addEventListener('input', function () {
            if (!slugInput.dataset.touched) {
                slugInput.value = generateSlug(this.value);
            }
        });

        slugInput.addEventListener('input', function () {
            this.dataset.touched = true;
        });

        function generateSlug(str) {
            return str.toLowerCase().trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }

        // Live Preview Image
        document.getElementById('picture_upload').addEventListener('change', function (e) {
            const preview = document.getElementById('preview-image');
            const file = e.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });
    });

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6'
        });
    @endif

    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonColor: '#d33'
        });
    @endif
</script>
@endpush
