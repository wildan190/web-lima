@extends('layouts.admin')

@section('title', 'Create News')

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('assets/custom/css/admin/news.css') }}" rel="stylesheet">
    <style>
        .news-container {
            max-width: 900px;
            margin: 0 auto;
        }

        #editor-container {
            max-width: 800px;
            margin: 0 auto;
            min-height: 200px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
        }

        #preview-image {
            max-width: 200px;
            margin-top: 10px;
            border: 1px solid #ccc;
            display: none;
        }
    </style>
@endpush

@section('content')
    <div class="news-container">
        <h3>Create News</h3>

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

            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">

            <label for="subtitle">Subtitle</label>
            <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle') }}">

            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}">

            <label for="picture_upload">Picture</label>
            <input type="file" name="picture_upload" id="picture_upload">
            <img id="preview-image" alt="Image Preview" />

            <label for="tag">Tag</label>
            <input type="text" name="tag" id="tag" value="{{ old('tag') }}">

            <label for="keywords">Keywords</label>
            <input type="text" name="keywords" id="keywords" value="{{ old('keywords') }}">

            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                <option value="hidden" {{ old('status') == 'hidden' ? 'selected' : '' }}>Hidden</option>
            </select>

            <label for="editor-container">Content</label>
            <div id="editor-container"></div>
            <input type="hidden" name="content" id="content" value="{{ old('content') }}">

            <button type="submit" class="btn-submit">Submit</button>
        </form>
    </div>
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
