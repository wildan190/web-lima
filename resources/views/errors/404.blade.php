@extends('layouts.web')

@section('content')
<style>
    .error-404-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 80px 20px;
        background-color:rgb(255, 255, 255);
    }

    .error-404-section img {
        max-width: 100%;
        width: 400px;
        height: auto;
        margin-bottom: 30px;
    }

    .error-404-section h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 16px;
        color: #333;
    }

    .error-404-section p {
        font-size: 18px;
        color: #666;
        margin-bottom: 30px;
    }

    .error-404-section a.btn-back-home {
        display: inline-block;
        padding: 12px 30px;
        background: linear-gradient(to right, #e53935, #4e0e0e);
        color: #fff;
        text-decoration: none;
        border-radius: 30px;
        font-weight: 600;
        transition: background 0.3s ease;
    }

    .error-404-section a.btn-back-home:hover {
        background: linear-gradient(to right, #c62828, #3e0c0c);
    }
</style>

<section class="error-404-section">
    <img src="{{ asset('assets/img/error/404.png') }}" alt="404 Not Found">
    <a href="{{ url('/') }}" class="btn-back-home">← Back to Home</a>
</section>
@endsection
