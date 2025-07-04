@extends('layouts.web')

@section('title', 'Milestone')

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

<section class="milestone-section">
    <div class="container">
        <h2 class="milestone-title">Milestone</h2>

        <div class="milestone-slider-wrapper">
            <button class="milestone-arrow prev" onclick="scrollMilestone(-1)">&#8592;</button>

            <div class="milestone-cards" id="milestoneCards">
                @foreach ([['year' => 2012, 'desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'], ['year' => 2014, 'desc' => 'Another dummy text for the 2014 milestone'], ['year' => 2016, 'desc' => 'Important updates were made this year'], ['year' => 2018, 'desc' => 'Major milestone achieved in 2018'], ['year' => 2022, 'desc' => 'LIMA expanded into new areas'], ['year' => 2025, 'desc' => 'Future plans and projections']] as $item)
                    <div class="milestone-card">
                        <div class="milestone-card-inner">
                            <div class="milestone-img">
                                <img src="{{ asset('assets/img/exarticleimg.png') }}" alt="Milestone Image">
                            </div>
                            <div class="milestone-content">
                                <small>LIMA Milestone in</small>
                                <h3>{{ $item['year'] }}</h3>
                                <p>{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="milestone-arrow next" onclick="scrollMilestone(1)">&#8594;</button>
        </div>

        <div class="milestone-timeline">
            @foreach ([2012, 2014, 2016, 2018, 2022, 2025] as $year)
                <span class="milestone-year {{ $year == 2012 ? 'active' : '' }}">{{ $year }}</span>
            @endforeach
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
</script>

@endsection
