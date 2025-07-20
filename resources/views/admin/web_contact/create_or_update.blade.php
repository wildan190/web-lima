@extends('layouts.admin')



@section('title', 'Web Contact Settings')

@section('content')


    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.web_contact.store') }}" method="POST">
        @csrf
    <div class="mb-3">
        @foreach ([
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'instagram' => 'Instagram URL',
            'facebook' => 'Facebook URL',
            'linkedin' => 'LinkedIn URL',
            'youtube' => 'YouTube URL'
        ] as $name => $label)
            <div class="mb-3">
                <label for="{{ $name }}" class="form-label">{{ $label }}</label>
                @if($name === 'address')
                    <textarea name="{{ $name }}" id="{{ $name }}" class="form-control">{{ old($name, $contact->$name ?? '') }}</textarea>
                @else
                    <input type="{{ $name === 'email' ? 'email' : 'text' }}" class="form-control" name="{{ $name }}"
                           value="{{ old($name, $contact->$name ?? '') }}">
                @endif
            </div>
        @endforeach
<div class="mb-3">
        <button type="submit" class="btn btn-primary">Save Contact</button>
        </div>
        </div>
    </form>

@endsection
