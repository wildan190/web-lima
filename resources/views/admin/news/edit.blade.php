@extends('layouts.admin')

@section('title', 'Edit News')

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('assets/custom/css/admin/news.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="news-container">
        <h3>Edit News</h3>

        <form method="POST" action="{{ route('admin.news.update', $news->id) }}" class="news-form" enctype="multipart/form-data" id="news-form">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}">

            <label for="subtitle">Subtitle</label>
            <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $news->subtitle) }}">

            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $news->slug) }}">

            <label for="category">Category</label>
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

            <label for="picture_upload">Picture</label>
            <div style="margin-bottom: 10px;">
                <img src="{{ asset('storage/' . $news->picture_upload) }}" alt="Current Image" id="existing-image" style="max-width: 200px; border: 1px solid #ccc;">
            </div>
            <input type="file" name="picture_upload" id="picture_upload">
            <img id="preview-image" style="max-width: 200px; display: none; margin-top: 10px; border: 1px solid #ccc;" />

            <label for="tag">Tag</label>
            <input type="text" name="tag" id="tag" value="{{ old('tag', $news->tag) }}">

            <label for="keywords">Keywords</label>
            <input type="text" name="keywords" id="keywords" value="{{ old('keywords', $news->keywords) }}">

            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="draft" {{ old('status', $news->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="publish" {{ old('status', $news->status) == 'publish' ? 'selected' : '' }}>Publish</option>
                <option value="hidden" {{ old('status', $news->status) == 'hidden' ? 'selected' : '' }}>Hidden</option>
            </select>

            <label for="editor-container">Content</label>
            <div id="editor-container" style="min-height: 200px; background: white;"></div>
            <input type="hidden" name="content" id="content" value="{{ old('content', $news->content) }}">

            <button type="submit" class="btn-submit">Update</button>
        </form>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Quill
        const quill = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: 'Edit your news content here...'
        });

        const initialContent = `{!! str_replace(['\\', "'", '"'], ['\\\\', "\\'", '\\"'], old('content', $news->content)) !!}`;
        quill.root.innerHTML = initialContent;

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

        // Live preview for image
        const imageInput = document.getElementById('picture_upload');
        const previewImage = document.getElementById('preview-image');
        const existingImage = document.getElementById('existing-image');

        imageInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    previewImage.src = event.target.result;
                    previewImage.style.display = 'block';
                    existingImage.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });

        // Auto slug generator
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
    });
</script>
@endpush
