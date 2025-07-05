@extends('layouts.admin')
@section('title', 'Edit Hero')

@section('content')
<div class="hero-edit-form">
    <h3>Edit Hero</h3>

    <form action="{{ route('admin.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="picture_upload">Picture</label>
        @if($hero->picture_upload)
            <img src="{{ asset('storage/' . $hero->picture_upload) }}" width="150" style="margin-bottom: 10px; display: block;">
        @endif
        <input type="file" name="picture_upload" id="picture_upload">

        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $hero->title) }}" required>

        <label for="subtitle">Subtitle</label>
        <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $hero->subtitle) }}">

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<style>
body {
    background: #f4f6f8;
    font-family: 'Segoe UI', Arial, sans-serif;
}
.hero-edit-form {
    background: #fff;
    max-width: 420px;
    margin: 40px auto;
    padding: 32px 28px 24px 28px;
    border-radius: 12px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.08);
}
.hero-edit-form h3 {
    margin-bottom: 24px;
    color: #22223b;
    font-weight: 600;
    text-align: center;
}
.hero-edit-form label {
    display: block;
    margin-top: 16px;
    color: #4a4e69;
    font-size: 15px;
    font-weight: 500;
}
.hero-edit-form input[type="text"],
.hero-edit-form input[type="file"] {
    width: 100%;
    padding: 10px 12px;
    margin-top: 6px;
    border: 1px solid #c9c9c9;
    border-radius: 6px;
    font-size: 15px;
    background: #f8f9fa;
    transition: border 0.2s;
}
.hero-edit-form input[type="text"]:focus,
.hero-edit-form input[type="file"]:focus {
    border-color: #5e60ce;
    outline: none;
}
.hero-edit-form img {
    display: block;
    margin: 10px 0 0 0;
    border-radius: 8px;
    border: 1px solid #e0e0e0;
}
.hero-edit-form .btn-primary {
    margin-top: 24px;
    width: 100%;
    padding: 12px 0;
    background: #5e60ce;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
}
.hero-edit-form .btn-primary:hover {
    background: #3a3a8c;
}
</style>
@endsection
