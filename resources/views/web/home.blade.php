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
    <div class="about-wrapper">

        <div class="about-logos">
            <div class="logo-grid">
                @foreach($sports as $index => $sport)
                    <div class="logo-box {{ ($index >= 6) ? 'last-row' : '' }}">
                        <img src="{{ asset('storage/' . $sport->logo) }}" alt="{{ $sport->name }}">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="about-text">
            <h2>About <span>LIMA</span></h2>
            <p>{{ $webProfile->about ?? 'Deskripsi belum tersedia.' }}</p>
            <a href="#" class="btn">Learn More</a>
        </div>
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
