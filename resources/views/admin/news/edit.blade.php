@extends('layouts.admin')

@section('title', 'Edit News')

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title mb-4">Edit News</h3>
            <div id="flash-data" data-success="{{ session('success') }}" data-errors="{{ $errors->any() ? implode('||', $errors->all()) : '' }}"></div>

        <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data" id="news-form">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="subtitle" class="form-label">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $news->subtitle) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $news->slug) }}" class="form-control">
            </div>

            <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-select">
                <option value="Basketball" {{ old('category') == 'Basketball' ? 'selected' : '' }}>Basketball</option>
                <option value="Futsal" {{ old('category') == 'Futsal' ? 'selected' : '' }}>Futsal</option>
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
                <div class="mb-2">
                    <img src="{{ asset($news->picture_upload) }}" alt="Current Image" id="existing-image" class="img-thumbnail" style="max-width: 200px;">
                </div>
                <input type="file" name="picture_upload" id="picture_upload" class="form-control">
                <img id="preview-image" class="img-thumbnail mt-2" style="max-width: 200px; display: none;" />
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" value="{{ old('date', $news->date ? \Carbon\Carbon::parse($news->date)->format('Y-m-d') : '') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="tag" class="form-label">Tag</label>
                <input type="text" name="tag" id="tag" value="{{ old('tag', $news->tag) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="keywords" class="form-label">Keywords</label>
                <input type="text" name="keywords" id="keywords" value="{{ old('keywords', $news->keywords) }}" class="form-control">
            </div>

            <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="draft" {{ old('status', $news->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="publish" {{ old('status', $news->status) == 'publish' ? 'selected' : '' }}>Publish</option>
                <option value="hidden" {{ old('status', $news->status) == 'hidden' ? 'selected' : '' }}>Hidden</option>
            </select>
            </div>

            <div class="mb-3">
                <label for="editor-container" class="form-label">Content</label>
                <div id="editor-container" style="min-height: 200px; background: white;"></div>
                <input type="hidden" name="content" id="content" value="{{ old('content', $news->content) }}">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Update</button>
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
            // Quill
            const quill = new Quill('#editor-container', {
                theme: 'snow',
                placeholder: 'Edit your news content here...'
            });

            const form = document.getElementById('news-form');
            const contentInput = document.getElementById('content');
            quill.root.innerHTML = contentInput.value || '';

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

            // Live preview for image
            const imageInput = document.getElementById('picture_upload');
            const previewImage = document.getElementById('preview-image');
            const existingImage = document.getElementById('existing-image');

            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
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

            const flashEl = document.getElementById('flash-data');
            const successMsg = flashEl ? flashEl.getAttribute('data-success') : '';
            const errorData = flashEl ? flashEl.getAttribute('data-errors') : '';
            if (successMsg) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: successMsg,
                    confirmButtonColor: '#3085d6'
                });
            }
            if (errorData) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: errorData.split('||').join('<br>'),
                    confirmButtonColor: '#d33'
                });
            }
        });
    </script>
@endpush
