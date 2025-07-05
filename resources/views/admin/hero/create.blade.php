@extends('layouts.admin')
@section('title', 'Create Hero')

@section('content')
<div class="hero-create-form">
    <h3>Create Hero</h3>

    <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="picture_upload">Picture</label>
            <input type="file" name="picture_upload" id="picture_upload" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="title">Title <span class="required">*</span></label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="subtitle">Subtitle</label>
            <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle') }}" class="form-control">
        </div>

        <button type="submit" class="btn-submit">Save</button>
    </form>
</div>

<style>
.hero-create-form {
    max-width: 420px;
    margin: 40px auto;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.08);
    padding: 32px 28px 24px 28px;
}
.hero-create-form h3 {
    text-align: center;
    margin-bottom: 28px;
    color: #2d3748;
    font-weight: 600;
    letter-spacing: 1px;
}
.form-group {
    margin-bottom: 18px;
}
.hero-create-form label {
    display: block;
    margin-bottom: 7px;
    color: #4a5568;
    font-size: 15px;
    font-weight: 500;
}
.hero-create-form .required {
    color: #e53e3e;
}
.form-control,
.form-control-file {
    width: 100%;
    padding: 9px 12px;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    font-size: 15px;
    background: #f9fafb;
    transition: border-color 0.2s;
}
.form-control:focus,
.form-control-file:focus {
    border-color: #3182ce;
    outline: none;
    background: #fff;
}
.btn-submit {
    width: 100%;
    padding: 11px 0;
    background: linear-gradient(90deg, #3182ce 0%, #2b6cb0 100%);
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    margin-top: 10px;
    box-shadow: 0 2px 8px rgba(49,130,206,0.08);
}
.btn-submit:hover {
    background: linear-gradient(90deg, #2563eb 0%, #1e40af 100%);
}
</style>
@endsection
