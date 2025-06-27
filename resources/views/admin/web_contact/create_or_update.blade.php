@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/custom/css/admin/web_contact.css') }}">
@endpush

@section('title', 'Web Contact Settings')

@section('content')
<div class="web-contact-container">
    <h3>Web Contact Settings</h3>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.web_contact.store') }}" method="POST">
        @csrf

        @foreach ([
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'instagram' => 'Instagram URL',
            'facebook' => 'Facebook URL',
            'linkedin' => 'LinkedIn URL',
            'youtube' => 'YouTube URL'
        ] as $name => $label)
            <div class="form-group">
                <label for="{{ $name }}">{{ $label }}</label>
                @if($name === 'address')
                    <textarea name="{{ $name }}" id="{{ $name }}">{{ old($name, $contact->$name ?? '') }}</textarea>
                @else
                    <input type="{{ $name === 'email' ? 'email' : 'text' }}" name="{{ $name }}"
                           value="{{ old($name, $contact->$name ?? '') }}">
                @endif
            </div>
        @endforeach

        <button type="submit">Save Contact</button>
    </form>
</div>
@endsection
