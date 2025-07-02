@extends('layouts.web')

@section('title', 'About Us')

@section('content')
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url('{{ asset('assets/font/Poppins-Regular.ttf') }}');
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .privacy-banner {
            position: relative;
            height: 320px;
            background: url('{{ asset('assets/img/hero.png') }}') center center / cover no-repeat;
        }

        .privacy-banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(114, 19, 19, 0.7);
            display: flex;
            align-items: flex-end;
            justify-content: flex-start;
        }

        .privacy-banner-text {
            padding: 24px 9rem;
            color: white;
        }

        .privacy-banner-text h1 {
            font-size: 32px;
            font-weight: 600;
            margin: 0;
        }

        .privacy-banner-text p {
            margin: 4px 0 0 0;
        }

        .about-section {
            padding: 60px 9rem;
            background: #fafafa;
        }

        .about-section h2 {
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .about-section h2 span {
            color: #e02a26;
        }

        .about-content {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .about-left,
        .about-right {
            flex: 1;
            min-width: 300px;
        }

        .about-right iframe {
            width: 100%;
            height: 300px;
            border: 0;
            border-radius: 12px;
        }

        .vision-mission {
            margin-top: 60px;
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .vm-box {
            flex: 1;
            background: #fff;
            border: 2px solid #e02a26;
            border-radius: 12px;
            padding: 24px;
            text-align: center;
            position: relative;
        }

        .vm-box img {
            width: 64px;
            height: 64px;
            position: absolute;
            top: -32px;
            left: 50%;
            transform: translateX(-50%);
        }


        .vm-box h3 {
            margin-top: 30px;
            font-size: 20px;
            font-weight: 600;
            color: #e02a26;
        }

        .vm-box p {
            margin-top: 12px;
            font-size: 16px;
            color: #333;
        }
    </style>

    <section class="privacy-banner"
        style="background: url('{{ $aboutBanner?->upload_picture ? asset('storage/' . $aboutBanner->upload_picture) : asset('assets/img/hero.png') }}') center center / cover no-repeat;">
        <div class="privacy-banner-overlay">
            <div class="privacy-banner-text">
                <h1>{{ $aboutBanner?->title ?? 'About Us' }}</h1>
                <p>{{ $aboutBanner?->subtitle ?? 'Get to know LIMA, and what our main focus is' }}</p>
            </div>
        </div>
    </section>

    <!-- Profile Section -->
    <section class="about-section">
        <h2><span>LIMA</span> Profile</h2>
        <div class="about-content">
            <div class="about-left">
                <p>{{ $webProfile->history ?? '-' }}</p>
            </div>
            <div class="about-right">
                <iframe src="https://www.youtube.com/embed/{{ $webProfile->youtube ?? '' }}" allowfullscreen></iframe>
            </div>
        </div>

        <!-- Vision & Mission Section -->
        <div class="vision-mission">
            <div class="vm-box">
                <img src="{{ asset('assets/img/svg/telescope.svg') }}" alt="Vision Icon">
                <h3>Vision</h3>
                <p>{{ $webProfile->vision ?? '-' }}</p>
            </div>
            <div class="vm-box">
                <img src="{{ asset('assets/img/svg/target.svg') }}" alt="Mission Icon">
                <h3>Mission</h3>
                <p>{{ $webProfile->mission ?? '-' }}</p>
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
