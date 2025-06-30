@extends('layouts.web')

@section('title', 'Home')

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
                    @foreach ($sports as $index => $sport)
                        <div class="logo-box {{ $index >= 6 ? 'last-row' : '' }}">
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
            @foreach ($newsLatest as $news)
                <div class="news-card">
                    <div class="news-img">
                        <img src="{{ asset('storage/' . $news->picture_upload) }}" alt="{{ $news->title }}">
                        <div class="overlay">
                            <p>{{ $news->created_at->format('d M Y') }} &nbsp;•&nbsp; News</p>
                            <h4>{{ \Illuminate\Support\Str::limit($news->title, 60) }}</h4>
                            <a href="#"><span>Read →</span></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
