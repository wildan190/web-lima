@extends('layouts.web')

@section('title', 'Milestone')

@section('content')
        <section class="privacy-banner"
        style="background: url('{{ $milestoneBanner?->upload_picture ? asset('storage/' . $milestoneBanner->upload_picture) : asset('assets/img/hero.png') }}') center center / cover no-repeat;">
        <div class="privacy-banner-overlay">
            <div class="privacy-banner-text">
                <h1>{{ $milestoneBanner?->title ?? 'About Us' }}</h1>
                <p>{{ $milestoneBanner?->subtitle ?? 'Get to know LIMA, and what our main focus is' }}</p>
            </div>
        </div>
    </section>

    <style>
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
            padding: 24px 12rem;
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
    </style>

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

    <section class="milestone-section">
        <div class="container">
            <h2 class="milestone-title">Milestone</h2>

            <div class="milestone-slider-wrapper">
                <button class="milestone-arrow prev" onclick="scrollMilestone(-1)">&#8592;</button>

                <div class="milestone-cards" id="milestoneCards">
                    @foreach ($milestones as $item)
                        <div class="milestone-card" data-year="{{ $item->year }}">
                            <div class="milestone-card-inner">
                                <div class="milestone-img">
                                    <img src="{{ asset('storage/' . $item->picture_upload) }}" alt="Milestone Image">
                                </div>
                                <div class="milestone-content">
                                    <small>LIMA Milestone in</small>
                                    <h3>{{ $item->year }}</h3>
                                    <p>{{ $item->description }}</p>
                                    @if ($item->location)
                                        <p><strong>Location:</strong> {{ $item->location }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="milestone-arrow next" onclick="scrollMilestone(1)">&#8594;</button>
            </div>

            <div class="milestone-timeline">
                @foreach ($milestones->pluck('year')->unique() as $year)
                    <span class="milestone-year {{ $loop->first ? 'active' : '' }}"
                        onclick="goToYear({{ $year }})">{{ $year }}</span>
                @endforeach
            </div>
        </div>
    </section>


    <section class="sports-section">
        <div class="sports-container">
            <h2 class="sports-title">{{ count($sports) }} Sports</h2>
            <div class="sports-grid">
                @foreach ($sports as $sport)
                    <div class="sport-card">
                        <div class="sport-card-inner">
                            <div class="sport-logo">
                                <img src="{{ asset('storage/' . $sport->logo) }}" alt="{{ $sport->name }}">
                            </div>
                            <p class="sport-name">{{ $sport->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .sports-section {
            padding: 60px 0;
            background-color: #fff;
            text-align: center;
        }

        .sports-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .sports-container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .sports-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .sport-card {
            aspect-ratio: 1 / 1;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sport-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .sport-card-inner {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .sport-logo {
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .sport-logo img {
            max-height: 60px;
            max-width: 100%;
            object-fit: contain;
        }

        .sport-name {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin: 0;
            word-wrap: break-word;
        }

        @media (max-width: 992px) {
            .sports-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .sports-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .sports-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <section class="lima-inum-section">
        <div class="lima-inum-container">
            <h2><span style="color: #E02A26;">LIMA</span> in Number</h2>

            <div class="lima-inum-grid">
                <!-- KIRI: Card Besar -->
                <div class="lima-inum-card"
                    style="background-image: url('{{ asset('assets/img/hero.png') }}'); grid-row: span 2;">
                    <div class="lima-inum-overlay red"></div>
                    <div class="lima-inum-text">12.000 +<br><span>Student Athlete</span></div>
                </div>

                <!-- KANAN ATAS -->
                <div class="lima-inum-card" style="background-image: url('{{ asset('assets/img/asset1.png') }}');">
                    <div class="lima-inum-overlay purple"></div>
                    <div class="lima-inum-text">1.000 +<br><span>Matches</span></div>
                </div>

                <!-- KANAN BAWAH -->
                <div class="lima-inum-card" style="background-image: url('{{ asset('assets/img/asset2.png') }}');">
                    <div class="lima-inum-overlay yellow"></div>
                    <div class="lima-inum-text">400 +<br><span>University</span></div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .lima-inum-section {
            padding: 60px 0;
            background-color: #fff;
            text-align: center;
        }

        .lima-inum-container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .lima-inum-section h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 40px;
            color: #000;
        }

        .lima-inum-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-template-rows: repeat(2, 160px);
            gap: 20px;
        }

        .lima-inum-card {
            position: relative;
            background-size: cover;
            background-position: center;
            border-radius: 12px;
            overflow: hidden;
            color: #fff;
            display: flex;
            align-items: flex-end;
            padding: 20px;
        }

        .lima-inum-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 2;
            z-index: 1;
            border-radius: 12px;
        }

        .lima-inum-overlay.red {
            background-color: rgba(224, 42, 38, 0.55);
        }

        .lima-inum-overlay.purple {
            background-color: rgba(141, 82, 163, 0.55);
        }

        .lima-inum-overlay.yellow {
            background-color: rgba(235, 195, 52, 0.55);
        }

        .lima-inum-text {
            position: relative;
            z-index: 2;
            font-size: 22px;
            font-weight: bold;
            text-align: left;
            color: #fff;
            line-height: 1.3;
        }

        .lima-inum-text span {
            font-size: 15px;
            font-weight: normal;
            margin-top: 4px;
            display: block;
        }

        @media (max-width: 768px) {
            .lima-inum-grid {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
            }

            .lima-inum-card {
                height: 160px;
            }
        }
    </style>


    <section class="university-coverage-section">
        <div class="coverage-container">
            <h2 class="coverage-title">University Coverage</h2>

            <div class="coverage-grid" id="universityGrid">
                @foreach ($universities as $index => $university)
                    <div class="coverage-card {{ $index >= 10 ? 'hidden' : '' }}">
                        <div class="coverage-logo">
                            <img src="{{ asset('storage/' . $university->logo) }}" alt="{{ $university->name }}">
                        </div>
                        <div class="coverage-name">{{ $university->name }}</div>
                    </div>
                @endforeach
            </div>

            @if (count($universities) > 10)
                {{-- Transparent gradient with clickable text --}}
                <div class="coverage-gradient-overlay" id="coverageGradient">
                    <span class="see-more-text" onclick="showMoreUniversities()">
                        See more
                        {{-- <span style="display:inline-block; font-size:18px; vertical-align:middle;">&#8964;</span> --}}
                    </span>
                </div>
            @endif
        </div>
    </section>

    <style>
        .university-coverage-section {
            padding: 60px 0;
            background-color: #fff;
            position: relative;
        }

        .coverage-container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 20px;
            text-align: center;
        }

        .coverage-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .coverage-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 24px;
            justify-items: center;
        }

        .coverage-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 24px 16px;
            width: 100%;
            max-width: 160px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: all 0.3s ease;
        }

        .coverage-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .coverage-logo img {
            width: 64px;
            height: 64px;
            object-fit: contain;
            margin-bottom: 16px;
        }

        .coverage-name {
            font-size: 14px;
            font-weight: 700;
            color: #333;
            text-align: center;
        }

        .hidden {
            display: none;
        }

        /* Gradient overlay with transparent effect */
        .coverage-gradient-overlay {
            position: relative;
            margin-top: -60px;
            padding-top: 100px;
            background: linear-gradient(to top, rgba(255, 255, 255, 1) 40%, rgba(255, 255, 255, 0) 100%);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            z-index: 1;
        }

        .see-more-text {
            position: absolute;
            top: -20px;
            font-size: 16px;
            font-weight: 600;
            color: rgb(0, 0, 0);

            padding: 6px 14px;

            cursor: pointer;

            transition: color 0.3s ease;
            z-index: 2;
        }

        .see-more-text:hover {
            color: #b91c1c;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .coverage-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 768px) {
            .coverage-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .coverage-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <script>
        function showMoreUniversities() {
            const hiddenCards = document.querySelectorAll('.coverage-card.hidden');
            hiddenCards.forEach(card => card.classList.remove('hidden'));

            const gradient = document.getElementById('coverageGradient');
            if (gradient) {
                gradient.style.display = 'none';
            }
        }
    </script>

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


    <style>
        .milestone-section {
            padding: 60px 0;
            background-color: #fff;
            text-align: center;
        }

        .milestone-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .milestone-slider-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .milestone-arrow {
            background-color: #e02a26;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 20px;
            cursor: pointer;
            flex-shrink: 0;
        }

        .milestone-cards {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 10px 0;
            max-width: 80%;
        }

        .milestone-card {
            flex: 0 0 auto;
            width: 480px;
            background-color: #fddddd;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .milestone-card-inner {
            display: flex;
            align-items: stretch;
            height: 100%;
        }

        .milestone-img {
            width: 50%;
            overflow: hidden;
        }

        .milestone-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .milestone-content {
            width: 50%;
            text-align: left;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .milestone-content small {
            font-weight: bold;
            font-size: 14px;
        }

        .milestone-content h3 {
            color: #e02a26;
            margin: 5px 0;
        }

        .milestone-timeline {
            display: flex;
            justify-content: space-between;
            max-width: 600px;
            margin: 0 auto;
            border-top: 2px solid #ddd;
            padding-top: 20px;
        }

        .milestone-year {
            font-size: 14px;
            color: #888;
            position: relative;
        }

        .milestone-year.active {
            color: #e02a26;
            font-weight: bold;
        }

        .milestone-year.active::after {
            content: '';
            display: block;
            margin: 5px auto 0;
            width: 6px;
            height: 6px;
            background-color: #e02a26;
            border-radius: 50%;
        }

        /* Optional: hide scrollbar */
        .milestone-cards::-webkit-scrollbar {
            display: none;
        }
    </style>

    <script>
        function scrollMilestone(direction) {
            const container = document.getElementById('milestoneCards');
            const card = container.querySelector('.milestone-card');
            if (!card) return;

            const cardWidth = card.offsetWidth + 20; // card width + gap
            container.scrollBy({
                left: direction * cardWidth,
                behavior: 'smooth'
            });
        }

        function goToYear(year) {
            const container = document.getElementById('milestoneCards');
            const cards = container.querySelectorAll('.milestone-card');
            const timelineYears = document.querySelectorAll('.milestone-year');

            let targetCard = null;
            cards.forEach((card, index) => {
                if (card.dataset.year == year) {
                    targetCard = card;
                    const scrollLeft = index * (card.offsetWidth + 20);
                    container.scrollTo({
                        left: scrollLeft,
                        behavior: 'smooth'
                    });
                }
            });

            // Highlight active year
            timelineYears.forEach(span => span.classList.remove('active'));
            document.querySelector(`.milestone-year[onclick="goToYear(${year})"]`)?.classList.add('active');
        }
    </script>


@endsection
