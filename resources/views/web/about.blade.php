@extends('layouts.web')

@section('title', 'About Us - LIMA')

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

        @media (max-width: 480px) {
            .about-left p {
                font-size: 14px;
            }
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

        @media (max-width: 768px) {
            .privacy-banner-text {
                padding: 16px 2rem;
            }

            .privacy-banner-text h1 {
                font-size: 24px;
            }

            .privacy-banner-text p {
                font-size: 14px;
            }

            .about-section {
                padding: 2rem;
            }

            .about-section h2 {
                font-size: 24px;
                margin-bottom: 2rem;
            }

            .about-content {
                flex-direction: column;
                gap: 1.5rem;
            }

            .about-left,
            .about-right {
                min-width: 100%;
            }

            .about-right iframe {
                height: 200px;
            }

            .vision-mission {
                flex-direction: column;
                gap: 1.5rem;
            }

            .vm-box {
                padding: 2rem 1.5rem;
            }

            .vm-box h3 {
                font-size: 18px;
                margin-top: 36px;
            }

            .vm-box p {
                font-size: 14px;
            }

            .latest-news .container {
                flex-direction: column;
                padding: 2rem 1rem;
            }

            .news-left {
                margin-bottom: 2rem;
            }

            .news-left h2 {
                font-size: 22px;
            }

            .news-left p {
                font-size: 14px;
            }

            .news-card {
                margin-bottom: 1.5rem;
            }

            .news-img img {
                width: 100%;
                height: auto;
            }

            .news-img .overlay {
                padding: 1rem;
            }

            .news-img .overlay h4 {
                font-size: 16px;
            }

            .news-img .overlay span {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .privacy-banner {
                height: 200px;
            }

            .privacy-banner-text {
                padding: 1rem;
            }

            .privacy-banner-text h1 {
                font-size: 20px;
            }

            .privacy-banner-text p {
                font-size: 12px;
            }

            .about-section {
                padding: 1.5rem 1rem;
            }

            .vm-box {
                padding: 1.5rem 1rem;
            }
        }

        @media (max-width: 768px) {
            .vision-mission {
                flex-direction: column;
                gap: 2rem;
            }

            .vm-box {
                padding: 2rem 1.5rem;
                margin-bottom: 1rem;
            }

            .vm-box h3 {
                font-size: 18px;
                margin-top: 36px;
            }

            .vm-box p {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .vision-mission {
                flex-direction: column;
                gap: 2rem;
            }

            .vm-box {
                padding: 1.5rem 1rem;
                margin-bottom: 1.5rem;
            }

            .vm-box h3 {
                font-size: 16px;
            }

            .vm-box p {
                font-size: 14px;
            }
        }
    </style>

    <section class="privacy-banner"
        style="background: url('{{ $aboutBanner?->upload_picture ?: asset('assets/img/hero.png') }}') center center / cover no-repeat;">
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
                <iframe src="{{ $WebContact->youtube ?? '-' }}" allowfullscreen></iframe>
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
                <h2>{{ __('messages.latest_news') }}</h2>
                <p>{{ __('messages.breaking_news') }}</p>
                <a href="{{ route('news') }}" class="btn-see-more">{{ __('messages.see_more') }}</a>
            </div>

            <div class="news-right">
                <!-- Chevron Left -->
                <button class="news-chevron chevron-left" onclick="scrollNews('left')">
                    <span>&#10094;</span>
                </button>

                <!-- Scrollable area -->
                <div class="news-scroll-wrapper" id="newsScroll">
                    @foreach ($newsLatest as $news)
                        <div class="news-card">
                            <a href="{{ route('news.detail', $news->slug) }}">
                                <div class="news-img" style="height: 200px; overflow: hidden; position: relative;">
                                    <img src="{{ $news->picture_upload }}" alt="{{ $news->title }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                    <div class="overlay">
                                        <p>{{ $news->date->format('d M Y') }} &nbsp;•&nbsp; {{ $news->category }}
                                        </p>
                                        <h4>{{ \Illuminate\Support\Str::limit($news->title, 60) }}</h4>
                                        <a
                                            href="{{ route('news.detail', $news->slug) }}"><span>{{ __('messages.read') }}</span></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Chevron Right -->
                <button class="news-chevron chevron-right" onclick="scrollNews('right')">
                    <span>&#10095;</span>
                </button>
            </div>
        </div>
    </section>

@endsection
