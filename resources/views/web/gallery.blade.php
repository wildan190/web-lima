@extends('layouts.web')

@section('content')
    <!-- Hero Banner -->
    <section class="privacy-banner"
        style="background: url('{{ $galleryBanner?->upload_picture ? asset('storage/' . $galleryBanner->upload_picture) : asset('assets/img/hero.png') }}') center center / cover no-repeat;">
        <div class="privacy-banner-overlay">
            <div class="privacy-banner-text">
                <h1>{{ $galleryBanner?->title ?? 'About Us' }}</h1>
                <p>{{ $galleryBanner?->subtitle ?? 'Get to know LIMA, and what our main focus is' }}</p>
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

    <!-- Gallery Section -->
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

    <!-- Modal -->
    <div id="limaImageModal" class="lima-gallery-modal">
        <span class="lima-gallery-modal-close" id="limaModalClose">&times;</span>
        <img class="lima-gallery-modal-content" id="limaModalImage">
    </div>

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

    <!-- Styles -->
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

    <!-- Scripts -->
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
