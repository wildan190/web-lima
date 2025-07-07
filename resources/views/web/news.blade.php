@extends('layouts.web')

@section('title', 'News')

@section('content')

    <section class="privacy-banner"
        style="background: url('{{ $newsBanner?->upload_picture ? asset('storage/' . $newsBanner->upload_picture) : asset('assets/img/hero.png') }}') center center / cover no-repeat;">
        <div class="privacy-banner-overlay">
            <div class="privacy-banner-text">
                <h1>{{ $newsBanner?->title ?? 'About Us' }}</h1>
                <p>{{ $newsBanner?->subtitle ?? 'Get to know LIMA, and what our main focus is' }}</p>
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
    </style>

    <section class="news-wrapper">
        <div class="news-container">
            <!-- Sidebar Filter -->
            <aside class="news-sidebar">
                <div class="sidebar-header">
                    <h2>News Category</h2>
                    <span class="chevron">&#9650;</span>
                </div>
                <form id="filterForm" method="GET" action="{{ route('news') }}">
                    <ul class="category-list">
                        <li>
                            <label>
                                All
                                <input type="checkbox" name="categories[]" value="all"
                                    {{ !request('categories') || in_array('all', request('categories', [])) ? 'checked' : '' }}
                                    onchange="this.form.submit()">
                                <span class="custom-checkbox"></span>
                            </label>
                        </li>
                        @foreach ($sports as $sport)
                            <li>
                                <label>
                                    {{ $sport->name }}
                                    <input type="checkbox" name="categories[]" value="{{ $sport->name }}"
                                        {{ request('categories') && in_array($sport->name, request('categories', [])) ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    <span class="custom-checkbox"></span>
                                </label>
                            </li>
                        @endforeach
                    </ul>

                </form>

            </aside>

            <!-- Main Content -->
            <div class="news-main">
                <!-- Filter + Sort Row -->
                <div class="news-header-bar">
                    <div class="header-title-mobile">
                        <h2 class="mobile-only" style="color: white;">|</h2>
                    </div>
                    <div class="sort-options">
                        <span>Sort:</span>
                        <a href="#" class="active">Newest</a> |
                        <a href="#">Oldest</a>
                    </div>
                </div>

                <!-- News Cards -->
                <div class="news-grid">
                    @foreach ($news as $item)
                        <div class="news-card">
                            <img src="{{ asset('storage/' . $item->picture_upload) }}" alt="{{ $item->title }}">
                            <div class="news-card-overlay">
                                <span class="date">{{ \Carbon\Carbon::parse($item->created_at)->format('j M Y') }} • News
                                    Category</span>
                                <h3 class="title">{{ $item->title }}</h3>
                                <a href="{{ route('news.detail', $item->slug) }}" class="read-more">Read →</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <!-- Pagination -->
            <div class="pagination-wrapper">
                {{ $news->appends(request()->query())->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>

    <style>
        .news-wrapper {
            margin-top: 48px;
            /* Beri jarak dari banner */
            padding: 24px 9rem;
            box-sizing: border-box;
        }

        .news-container {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .news-sidebar {
            width: 100%;
            max-width: 250px;
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .chevron {
            font-size: 16px;
        }

        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category-list li {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }

        .category-list label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            cursor: pointer;
            position: relative;
        }

        .category-list input[type="checkbox"] {
            display: none;
        }

        .custom-checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid #ccc;
            border-radius: 4px;
            position: relative;
            flex-shrink: 0;
        }

        /* Checked style */
        .category-list input[type="checkbox"]:checked+.custom-checkbox {
            background-color: #C62828;
            border-color: #C62828;
        }

        .category-list input[type="checkbox"]:checked+.custom-checkbox::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .news-main {
            flex: 1;
        }

        .news-header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            padding-left: 4px;
        }

        .sort-options {
            font-size: 14px;
            white-space: nowrap;
        }

        .sort-options a {
            text-decoration: none;
            color: gray;
            margin: 0 4px;
        }

        .sort-options a.active {
            color: black;
            font-weight: bold;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
        }

        .news-card {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .news-card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card:hover img {
            transform: scale(1.05);
        }

        .news-card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            color: white;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
            padding: 16px;
        }

        .news-card-overlay .date {
            font-size: 12px;
            opacity: 0.8;
        }

        .news-card-overlay .title {
            font-size: 14px;
            font-weight: bold;
            margin-top: 6px;
            margin-bottom: 6px;
            line-height: 1.3;
        }

        .news-card-overlay .read-more {
            font-size: 13px;
            color: white;
            text-decoration: underline;
        }

        .pagination-wrapper {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            gap: 6px;
        }

        .pagination li a,
        .pagination li span {
            padding: 6px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        .pagination li.active span {
            background-color: #C62828;
            color: white;
            border-color: #C62828;
        }

        .pagination li.disabled span {
            color: #aaa;
            cursor: not-allowed;
        }

        .pagination li a:hover {
            background-color: #f0f0f0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .news-wrapper {
                padding: 24px 1rem;
            }

            .news-container {
                flex-direction: column;
            }

            .news-sidebar {
                max-width: 100%;
            }

            .news-header-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .mobile-only {
                display: block;
            }
        }
    </style>

    <section class="press-release-section">
        <div class="container">
            <h2 class="press-title">Press Release</h2>

            <div class="press-row press-featured">
                @if ($pressRelease->count() > 0)
                    @php
                        $first = $pressRelease[0];
                        $second = $pressRelease->get(1);
                        $rest = $pressRelease->slice(2);
                    @endphp

                    <div class="press-card press-large">
                        <img src="{{ asset('storage/' . $first->picture_upload) }}" alt="{{ $first->title }}">
                        <div class="press-content">
                            <div class="press-meta">
                                <span>Oleh Admin</span>
                                <span>{{ \Carbon\Carbon::parse($first->created_at)->format('j M Y') }}</span>
                            </div>
                            <h3 class="press-title-red">{{ $first->title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($first->content), 150) }}</p>
                        </div>
                    </div>

                    @if ($second)
                        <div class="press-card">
                            <img src="{{ asset('storage/' . $second->picture_upload) }}" alt="{{ $second->title }}">
                            <div class="press-content">
                                <div class="press-meta">
                                    <span>Oleh Admin</span>
                                    <span>{{ \Carbon\Carbon::parse($second->created_at)->format('j M Y') }}</span>
                                </div>
                                <h3 class="press-title-red">{{ $second->title }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($second->content), 100) }}</p>
                            </div>
                        </div>
                    @endif
                @endif
            </div>

            <div class="press-grid">
                @foreach ($rest as $item)
                    <div class="press-card">
                        <img src="{{ asset('storage/' . $item->picture_upload) }}" alt="{{ $item->title }}">
                        <div class="press-content">
                            <div class="press-meta">
                                <span>Oleh Admin</span>
                                <span>{{ \Carbon\Carbon::parse($item->created_at)->format('j M Y') }}</span>
                            </div>
                            <h3 class="press-title-red">{{ $item->title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 100) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="press-pagination" style="margin-top: 40px;">
                {{ $pressRelease->appends(request()->except('press_page'))->links() }}
            </div>

        </div>
    </section>

    <style>
        .press-release-section {
            padding: 60px 9rem;
            /* sama dengan section news & hero */
        }

        .press-title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .press-row {
            display: grid;
            gap: 20px;
        }

        .press-featured {
            grid-template-columns: 2fr 1fr;
            margin-bottom: 40px;
        }

        .press-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .press-card {
            background-color: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            transition: 0.2s ease-in-out;
        }

        .press-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .press-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 16px 16px 16px 16px;
            /* Rounded top and bottom */
        }

        .press-card.press-large img {
            height: 260px;
        }

        .press-content {
            padding: 14px 16px;
        }

        .press-meta {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #888;
            margin-bottom: 6px;
        }

        .press-title-red {
            font-size: 16px;
            color: #B30202;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .press-content p {
            font-size: 13px;
            color: #444;
            margin: 0;
        }

        /* Container Width Match */
        .container {
            max-width: 100%;
            margin: 0 auto;
        }

        .press-pagination nav {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .press-pagination .pagination {
            display: flex;
            list-style: none;
            gap: 8px;
            padding: 0;
        }

        .press-pagination .page-item a,
        .press-pagination .page-item span {
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ccc;
        }

        .press-pagination .page-item.active span {
            background-color: #B30202;
            color: white;
            border-color: #B30202;
        }

        .press-pagination .page-item.disabled span {
            color: #aaa;
        }
    </style>

    <section class="lima-gallery-section">
        <div class="lima-gallery-container">
            <h2 class="lima-gallery-title">
                <span style="color:#E02A26;">LIMA</span> Gallery
            </h2>

            <!-- Tabs -->
            <div class="lima-gallery-tabs">
                @foreach ($sports as $sport)
                    <button class="lima-gallery-tab {{ $loop->first ? 'active' : '' }}" data-sport="{{ $sport->id }}">
                        {{ $sport->name }}
                    </button>
                @endforeach
            </div>

            <!-- Gallery Grid -->
            <div class="lima-gallery-grid" id="limaGalleryGrid">
                @foreach ($gallery as $item)
                    @if (!Str::endsWith($item->picture_upload, ['.mp4', '.mov', '.webm']))
                        <div class="lima-gallery-item" data-sport="{{ $item->sport_id }}">
                            <div class="lima-gallery-media">
                                <img src="{{ asset('storage/' . $item->picture_upload) }}" alt="Gallery Image"
                                    class="lima-gallery-modal-trigger"
                                    data-full="{{ asset('storage/' . $item->picture_upload) }}">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- See More -->
            <div class="lima-gallery-see-more">
                <button id="limaSeeMoreBtn">See more ⌄</button>
            </div>
        </div>
    </section>

    <div id="limaImageModal" class="lima-gallery-modal">
        <span class="lima-gallery-modal-close" id="limaModalClose">&times;</span>
        <img class="lima-gallery-modal-content" id="limaModalImage">
    </div>

    <style>
        .lima-gallery-container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 9rem;
        }

        .lima-gallery-header {
            background: url('{{ asset('assets/img/banner.jpg') }}') center/cover no-repeat;
            height: 300px;
            position: relative;
            color: white;
            padding: 60px 0;
            margin-bottom: 0;
        }

        .lima-gallery-header-overlay {
            background: rgba(0, 0, 0, 0.5);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .lima-gallery-section {
            padding: 60px 0;
            background-color: #fff;
            text-align: center;
        }

        .lima-gallery-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .lima-gallery-tabs {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .lima-gallery-tab {
            background: none;
            border: none;
            font-weight: 600;
            color: #333;
            cursor: pointer;
            padding: 10px 16px;
            font-size: 15px;
            transition: color 0.3s;
        }

        .lima-gallery-tab.active {
            color: #E02A26;
            border-bottom: 2px solid #E02A26;
        }

        .lima-gallery-grid {
            column-count: 4;
            column-gap: 20px;
            max-height: 1000px;
            overflow: hidden;
            transition: max-height 0.5s ease;
        }

        .lima-gallery-item {
            display: inline-block;
            width: 100%;
            margin-bottom: 20px;
            background: #f0f0f0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .lima-gallery-media {
            position: relative;
        }

        .lima-gallery-item img {
            width: 100%;
            height: auto;
            display: block;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .lima-gallery-item img:hover {
            transform: scale(1.03);
        }

        .lima-gallery-see-more {
            text-align: center;
            margin-top: 30px;
            padding-top: 40px;
            background: linear-gradient(to bottom, transparent, white 80%);
        }

        #limaSeeMoreBtn {
            background: none;
            border: none;
            font-weight: 600;
            font-size: 15px;
            color: #000;
            cursor: pointer;
        }

        /* Modal */
        .lima-gallery-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .lima-gallery-modal-content {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 80vh;
            border-radius: 10px;
        }

        .lima-gallery-modal-close {
            position: absolute;
            top: 30px;
            right: 40px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            z-index: 10000;
        }

        .lima-gallery-modal-close:hover {
            color: #bbb;
        }

        @media (max-width: 768px) {
            .lima-gallery-grid {
                column-count: 2;
            }
        }

        @media (max-width: 480px) {
            .lima-gallery-grid {
                column-count: 1;
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll(".lima-gallery-tab");
            const items = document.querySelectorAll(".lima-gallery-item");
            const seeMoreBtn = document.getElementById("limaSeeMoreBtn");
            const galleryGrid = document.getElementById("limaGalleryGrid");

            function filterGallery(sportId) {
                items.forEach(item => {
                    item.style.display = (item.dataset.sport == sportId) ? 'block' : 'none';
                });
            }

            const firstSport = tabs[0]?.dataset.sport;
            if (firstSport) filterGallery(firstSport);

            tabs.forEach(tab => {
                tab.addEventListener("click", () => {
                    tabs.forEach(t => t.classList.remove("active"));
                    tab.classList.add("active");
                    filterGallery(tab.dataset.sport);
                });
            });

            // Expand / collapse
            let expanded = false;
            seeMoreBtn.addEventListener("click", () => {
                expanded = !expanded;
                galleryGrid.style.maxHeight = expanded ? 'none' : '1000px';
                seeMoreBtn.innerHTML = expanded ? 'See less ▲' : 'See more ⌄';
            });

            // Modal
            const modal = document.getElementById("limaImageModal");
            const modalImg = document.getElementById("limaModalImage");
            const closeBtn = document.getElementById("limaModalClose");

            document.querySelectorAll(".lima-gallery-modal-trigger").forEach(img => {
                img.addEventListener("click", () => {
                    modal.style.display = "block";
                    modalImg.src = img.dataset.full;
                });
            });

            closeBtn.onclick = function() {
                modal.style.display = "none";
                modalImg.src = "";
            }

            window.onclick = function(e) {
                if (e.target == modal) {
                    modal.style.display = "none";
                    modalImg.src = "";
                }
            }
        });
    </script>
@endsection
