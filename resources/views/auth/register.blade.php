@extends('layouts.auth.auth')

@section('image')
    <div class="auth-image"></div>
@endsection

@section('form')
    <div class="auth-form">
        <img src="{{ asset('assets/img/limalogo.png') }}" alt="LIMA Logo" class="logo">
        <div class="company">PT. BINA MAHASISWA INDONESIA</div>
        <h1>Create Your Account</h1>
        <p>Please fill in the form to register</p>

        @if(session('error'))
            <div style="color:red;">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ url('register') }}">
            @csrf

            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter full name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter email address" required>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Choose a username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>

            <button type="submit">Register</button>
        </form>
    </div>
@endsection
