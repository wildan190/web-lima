@extends('layouts.admin')

@section('title', 'Privacy Policy')

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('assets/custom/css/admin/privacy_policy.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="web-profile-container">
    <h3>Update Privacy Policy</h3>

    <form id="privacy-policy-form" method="POST" action="{{ route('admin.privacy-policies.update') }}">
        @csrf
        @method('PUT')

        <input type="hidden" name="content" id="content">

        <div id="editor-container" style="height: 300px;"></div>

        <button type="submit" class="btn btn-submit">Save</button>
    </form>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const quill = new Quill('#editor-container', {
                theme: 'snow',
                placeholder: 'Write your privacy policy here...'
            });

            const initialContent = `{!! addslashes(old('content', $privacyPolicy->content ?? '')) !!}`;
            quill.root.innerHTML = initialContent;

            document.getElementById('privacy-policy-form').addEventListener('submit', function (e) {
                const contentInput = document.getElementById('content');
                contentInput.value = quill.root.innerHTML;

                if (quill.getText().trim().length === 0) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Content field is required.',
                        confirmButtonColor: '#d33'
                    });
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
