@extends('layouts.admin')

@section('title', 'Create News')

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        #preview-image {
            display: none;
            max-width: 200px;
            margin-top: 10px;
            border-radius: 6px;
        }
    </style>
@endpush

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title mb-4">Create News</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>There were some problems with your input:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" id="news-form">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}"
                        placeholder="Title">
                </div>

                <div class="mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{ old('subtitle') }}"
                        placeholder="Subtitle">
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') }}"
                        placeholder="Slug">
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select">
                        @foreach (['Basketball', 'Futsal', 'Badminton', 'Golf', 'Swimming', 'Mini Socer', 'eSport', 'Volley Ball'] as $category)
                            <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                                {{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="picture_upload" class="form-label">Picture</label>
                    <input type="file" name="picture_upload" class="form-control" id="picture_upload">
                    <img id="preview-image" alt="Image Preview">
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" id="date" value="{{ old('date') }}">
                </div>

                <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <input type="text" name="tag" class="form-control" id="tag" value="{{ old('tag') }}"
                        placeholder="Tag">
                </div>

                <div class="mb-3">
                    <label for="keywords" class="form-label">Keywords</label>
                    <input type="text" name="keywords" class="form-control" id="keywords" value="{{ old('keywords') }}"
                        placeholder="Keywords">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                        <option value="hidden" {{ old('status') == 'hidden' ? 'selected' : '' }}>Hidden</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="editor-container" class="form-label">Content</label>
                    <div id="editor-container" style="height: 300px;"></div>
                    <input type="hidden" name="content" id="content" value="{{ old('content') }}">
                </div>

                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Quill Init
            const quill = new Quill('#editor-container', {
                theme: 'snow',
                placeholder: 'Write your news content here...'
            });

            const oldContent = `{!! str_replace(['\\', "'", '"'], ['\\\\', "\\'", '\\"'], old('content')) !!}`;
            quill.root.innerHTML = oldContent;

            const form = document.getElementById('news-form');
            const contentInput = document.getElementById('content');

            form.addEventListener('submit', function(e) {
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

            titleInput.addEventListener('input', function() {
                if (!slugInput.dataset.touched) {
                    slugInput.value = generateSlug(this.value);
                }
            });

            slugInput.addEventListener('input', function() {
                this.dataset.touched = true;
            });

            function generateSlug(str) {
                return str.toLowerCase().trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }

            // Live Preview Image
            document.getElementById('picture_upload').addEventListener('change', function(e) {
                const preview = document.getElementById('preview-image');
                const file = e.target.files[0];
                if (file) {
                    preview.src = URL.createObjectURL(file);
                    preview.style.display = 'block';
                }
            });
        });

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6'
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#d33'
            });
        @endif
    </script>
@endpush
