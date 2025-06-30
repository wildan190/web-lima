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


<section class="latest-news">
    <div class="container">
        <div class="news-left">
            <h2>Latest <strong>News</strong></h2>
            <p>Here is some breaking news especially for you.</p>
            <a href="#" class="btn-see-more">See More</a>
        </div>
        <div class="news-right">
            @for ($i = 0; $i < 3; $i++)
                <div class="news-card">
                    <div class="news-img">
                        <img src="{{ asset('assets/img/exarticleimg.png') }}" alt="News Image">
                        <div class="overlay">
                            <p>1 Mei 2025 &nbsp;•&nbsp; News Category</p>
                            <h4>LIMA Basketball Championship 2024 Digelar...</h4>
                            <span>Read →</span>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

@endsection
