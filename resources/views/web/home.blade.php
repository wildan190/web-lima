@extends('layouts.web')

@section('content')
<section class="hero">
    <div class="hero-overlay">
        <div class="hero-text">
            <h1>LIGA MAHASISWA</h1>
            <p>Awal Masa Depan</p>
            <div class="hero-slider-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div>
</section>

<section class="about">
    <div class="logo-grid">
        <img src="{{ asset('assets/images/logo1.png') }}" alt="">
        <img src="{{ asset('assets/images/logo2.png') }}" alt="">
        <img src="{{ asset('assets/images/logo3.png') }}" alt="">
        <img src="{{ asset('assets/images/logo4.png') }}" alt="">
        <img src="{{ asset('assets/images/logo5.png') }}" alt="">
        <img src="{{ asset('assets/images/logo6.png') }}" alt="">
        <img src="{{ asset('assets/images/logo7.png') }}" alt="">
        <img src="{{ asset('assets/images/logo8.png') }}" alt="">
    </div>
    <div class="about-text">
        <h2>About <span>LIMA</span></h2>
        <p>Since 2012, we have grown into the leading force behind collegiate sports in Indonesia — driving the growth of student competitions nationwide.</p>
        <a href="#" class="btn">Learn More</a>
    </div>
</section>

<section class="news">
    <h2>Latest News</h2>
    <p>Here is some breaking news especially for you.</p>
    <div class="news-slider">
        <div class="news-card">
            <img src="{{ asset('assets/images/news1.jpg') }}" alt="">
            <h3>LIMA Basketball Championship 2024 Digelar</h3>
            <a href="#">Read →</a>
        </div>
        <!-- Duplicate news cards if needed -->
    </div>
    <a href="#" class="btn">See More</a>
</section>
@endsection
