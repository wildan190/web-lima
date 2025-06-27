@extends('layouts.auth.auth')

@section('image')
    <div class="auth-image"></div>
@endsection

@section('form')
    <div class="auth-form">
        <img src="{{ asset('assets/img/limalogo.png') }}" alt="LIMA Logo" class="logo">
        <div class="company">PT. BINA MAHASISWA INDONESIA</div>
        <h1>Welcome Back, Admin!</h1>
        <p>Please Log In with your account</p>

        @if(session('error'))
            <div style="color:red;">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ url('login') }}">
            @csrf

            <label for="email">Email or username</label>
            <input type="text" id="email" name="email" placeholder="Enter email or username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>

            <div class="forgot">
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit">Log In</button>
        </form>
    </div>
@endsection
