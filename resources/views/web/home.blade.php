@extends('layouts.web')

@section('title', 'LIMA - Liga Mahasiswa')

@section('content')
    <section class="hero">
        @foreach ($heroSlide as $index => $slide)
            <div class="hero-slide"
                style="background: url('{{ $slide->picture_upload }}') center/cover no-repeat; {{ $index === 0 ? '' : 'display: none;' }}">
                <div class="hero-overlay">
                    <div class="hero-text">
                        <h1>{{ $slide->getTranslation('title', app()->getLocale()) ?? $slide->getTranslation('title', 'id') }}
                        </h1>
                        <p class="subtitle-typing"
                            data-subtitle="{{ $slide->getTranslation('subtitle', app()->getLocale()) ?? $slide->getTranslation('subtitle', 'id') }}">
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="hero-slider-dots">
            @foreach ($heroSlide as $index => $slide)
                <span class="dot {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}"></span>
            @endforeach
        </div>
    </section>

    <script>
        function typeText(element, text, speed = 50) {
            let index = 0;
            element.textContent = "";
            const typing = () => {
                if (index < text.length) {
                    element.textContent += text.charAt(index);
                    index++;
                    setTimeout(typing, speed);
                }
            };
            typing();
        }

        function activateTypingOnVisibleSlide() {
            const visibleSlide = document.querySelector('.hero-slide:not([style*="display: none"])');
            const subtitle = visibleSlide?.querySelector('.subtitle-typing');

            if (subtitle) {
                const text = subtitle.getAttribute('data-subtitle');
                typeText(subtitle, text);
            }
        }

        window.addEventListener('DOMContentLoaded', () => {
            activateTypingOnVisibleSlide();
            setInterval(() => {
                activateTypingOnVisibleSlide();
            }, 5000);
        });

        document.querySelectorAll('.dot').forEach(dot => {
            dot.addEventListener('click', () => {
                const index = dot.getAttribute('data-index');
                const allSlides = document.querySelectorAll('.hero-slide');
                const allDots = document.querySelectorAll('.dot');

                allSlides.forEach((slide, idx) => {
                    slide.style.display = (idx == index) ? 'block' : 'none';
                });

                allDots.forEach(d => {
                    d.classList.remove('active');
                });

                dot.classList.add('active');

                setTimeout(() => {
                    activateTypingOnVisibleSlide();
                }, 1000);
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slides = document.querySelectorAll(".hero-slide");
            const dots = document.querySelectorAll(".dot");
            let currentIndex = 0;
            let interval = setInterval(nextSlide, 5000);

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.style.display = i === index ? "block" : "none";
                    dots[i].classList.toggle("active", i === index);
                });
                currentIndex = index;
            }

            function nextSlide() {
                let nextIndex = (currentIndex + 1) % slides.length;
                showSlide(nextIndex);
            }

            dots.forEach(dot => {
                dot.addEventListener("click", () => {
                    clearInterval(interval);
                    showSlide(parseInt(dot.dataset.index));
                    interval = setInterval(nextSlide, 5000);
                });
            });

            showSlide(currentIndex);
        });
    </script>

    <section class="about">
        <div class="about-wrapper">
            <div class="about-logos">
                <div class="logo-grid">
                    @foreach ($sports as $index => $sport)
                        <div class="logo-box {{ $index >= 6 ? 'last-row' : '' }}">
                            <img src="{{ $sport->logo }}" alt="{{ $sport->name }}">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="about-text">
                <h2>About <span>LIMA</span></h2>
                <!-- <h2>{{ __('messages.about_lima') }}</h2> -->
                <p>{{ $webProfile->getTranslation('about', app()->getLocale()) ?? ($webProfile->getTranslation('about', 'en') ?? 'Description not available.') }}
                </p>
                <a href="{{ route('about') }}" class="btn">{{ __('messages.learn_more') }}</a>
            </div>
            <br />
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
                                <div class="news-img">
                                    <img src="{{ $news->picture_upload }}" alt="{{ $news->title }}">
                                    <div class="overlay">
                                        <p>{{ $news->created_at->format('d M Y') }} &nbsp;•&nbsp;
                                            {{ __('messages.news') }}</p>
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
