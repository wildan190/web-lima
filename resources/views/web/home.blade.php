@extends('layouts.web')

@section('title', 'Home')

@section('content')
    <section class="hero">
        @foreach ($heroSlide as $index => $slide)
            <div class="hero-slide"
                style="background: url('{{ $slide->picture_upload }}') center/cover no-repeat; {{ $index === 0 ? '' : 'display: none;' }}">
                <div class="hero-overlay">
                    <div class="hero-text">
                        <h1>{{ $slide->title }}</h1>
                        <p class="subtitle-typing" data-subtitle="{{ $slide->subtitle }}"></p>
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

        window.addEventListener('DOMContentLoaded', activateTypingOnVisibleSlide);

        setInterval(() => {
                    activateTypingOnVisibleSlide();
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
                <p>{{ $webProfile->about ?? 'Deskripsi belum tersedia.' }}</p>
                <a href="{{ route('about')}}" class="btn">Learn More</a>
            </div>
        </div>
    </section>

    <section class="latest-news">
        <div class="container">
            <div class="news-left">
                <h2>Latest <strong>News</strong></h2>
                <p>Here is some breaking news especially for you.</p>
                <a href="{{ route('news')}}" class="btn-see-more">See More</a>
            </div>
            <div class="news-right">
                @foreach ($newsLatest as $news)
                    <div class="news-card">
                        <a href="{{ route('news.detail', $news->slug) }}">
                            <div class="news-img">
                                <img src="{{ $news->picture_upload }}" alt="{{ $news->title }}">
                                <div class="overlay">
                                    <p>{{ $news->created_at->format('d M Y') }} &nbsp;•&nbsp; News</p>
                                    <h4>{{ \Illuminate\Support\Str::limit($news->title, 60) }}</h4>
                                    <a href="{{ route('news.detail', $news->slug) }}"><span>Read →</span></a>
                                </div>
                        </a>
                    </div>
            </div>
            @endforeach
        </div>
        </div>
    </section>

@endsection