@extends('layouts.web')

@section('title', 'Gallery - LIMA')

@section('content')
    <!-- Hero Banner -->
    <section class="privacy-banner"
        style="background: url('{{ $galleryBanner?->upload_picture ? $galleryBanner->upload_picture : asset('assets/img/hero.png') }}') center center / cover no-repeat;">
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
                                <img src="{{ $item->picture_upload }}" alt="Gallery Image"
                                    class="lima-gallery-modal-trigger" data-full="{{ $item->picture_upload }}">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- See More -->
            <div class="lima-gallery-see-more">
                <button id="limaSeeMoreBtn">See more <i class="fa-solid fa-chevron-down"></i></button>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="limaImageModal" class="lima-gallery-modal">
        <span class="lima-gallery-modal-close" id="limaModalClose">&times;</span>

        <!-- Modal Image -->
        <div class="modal-content-container">
            <img class="lima-gallery-modal-content" id="limaModalImage">
        </div>

        <!-- Navigation Buttons -->
        <button class="modal-nav-btn prev-btn" id="prevBtn">&#10094;</button>
        <button class="modal-nav-btn next-btn" id="nextBtn">&#10095;</button>
    </div>

    <!-- Styles for Navigation Buttons -->
    <style>
        .modal-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            font-size: 30px;
            padding: 12px;
            cursor: pointer;
            z-index: 10001;
        }

        .prev-btn {
            left: 10px;
        }

        .next-btn {
            right: 10px;
        }

        .modal-nav-btn:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>

    <!-- Styles -->
    <style>
        .lima-gallery-container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 9rem;
        }

        .modal-content-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .lima-gallery-modal-content {
            max-width: 90vw;
            max-height: 90vh;
            object-fit: contain;
            border-radius: 10px;
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
            flex-wrap: nowrap;
            overflow-x: auto;
            gap: 12px;
            padding: 10px 16px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 40px;
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE & Edge */
            justify-content: flex-start;
            /* Default (mobile) */
        }

        .lima-gallery-tabs::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari */
        }

        @media (min-width: 768px) {
            .lima-gallery-tabs {
                justify-content: center;
                /* Center di desktop */
                overflow-x: visible;
                /* Tidak perlu scroll di desktop */
            }
        }

        .lima-gallery-tab {
            white-space: nowrap;
            flex-shrink: 0;
            background: none;
            border: none;
            font-weight: 600;
            color: #333;
            cursor: pointer;
            padding: 10px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .lima-gallery-tab:hover {
            color: #E02A26;
            
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
            transition: all 0.4s ease;
            opacity: .9;
        }

        .lima-gallery-item img:hover {
            -webkit-transform: scale(1.05) translateY(-4px);
            -moz-transform: scale(1.05) translateY(-4px);
            -ms-transform: scale(1.05) translateY(-4px);
            -o-transform: scale(1.05) translateY(-4px);
            transform: scale(1.05) translateY(-4px);
            opacity: 1;
        }

        @media (max-width: 768px) {
            .lima-gallery-item img:hover {
                -webkit-transform: none;
                -moz-transform: none;
                -ms-transform: none;
                -o-transform: none;
                transform: none;
            }
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
            transition: all .3s ease;
        }

        /* Modal */
        .lima-gallery-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
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
            .privacy-banner-text {
                padding: 1.5rem 2rem;
            }

            .privacy-banner-text h1 {
                font-size: 24px;
            }

            .privacy-banner-text p {
                font-size: 14px;
            }

            .lima-gallery-container {
                padding: 0 2rem;
                position: relative;
                overflow: hidden;
            }

            .lima-gallery-title {
                font-size: 22px;
                margin-bottom: 1.5rem;
            }

            .lima-gallery-tabs {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                gap: 10px;
                margin-bottom: 40px;
                border-bottom: 1px solid #ddd;
                padding-bottom: 10px;
                scrollbar-width: none;
                padding-left: 0;
                /* ⛔️ Hapus padding kiri yang memotong */
            }

            .lima-gallery-tabs::-webkit-scrollbar {
                display: none;
            }

            .lima-gallery-tab {
                background: none;
                border: none;
                font-weight: 600;
                color: #333;
                cursor: pointer;
                padding: 10px 16px;
                font-size: 15px;
                white-space: nowrap;
                flex: 0 0 auto;
                transition: color 0.3s;
                margin-left: 10px;
                /* ✅ Tambahkan margin kiri jika ingin jarak antar tab */
            }

            .lima-gallery-tab:first-child {
                margin-left: 0;
                /* Hindari tab pertama terlalu jauh ke kanan */
            }

            .lima-gallery-tab.active {
                color: #E02A26;
                border-bottom: 2px solid #E02A26;
            }

            /* Gallery Grid */
            .lima-gallery-grid {
                column-count: 2;
                column-gap: 12px;
                max-height: 250px;
                overflow: hidden;
                position: relative;
                transition: max-height 0.3s ease-in-out;
            }

            /* Item gambar dalam galeri */
            .lima-gallery-item {
                position: relative;
                margin-bottom: 16px;
            }

            /* Menghapus blur pada gambar */
            .lima-gallery-item .lima-gallery-media img {
                display: block;
                width: 100%;
                height: auto;
            }

            /* Overlay untuk bagian bawah gambar */
            .lima-gallery-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 50%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 5;
            }

            /* Tombol See More */
            .lima-gallery-see-more {
                position: absolute;
                bottom: 10px;
                left: 50%;
                transform: translateX(-50%);
                z-index: 10;
                background: rgba(255, 255, 255, 0.7);
                padding: 12px 24px;
                border-radius: 6px;
                text-align: center;
            }

            .lima-gallery-see-more button {
                font-size: 16px;
                background-color: rgba(255, 42, 38, 0.9);
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 4px;
                cursor: pointer;
            }


            #limaSeeMoreBtn {
                font-size: 14px;
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

            .lima-gallery-container {
                padding: 0 1rem;
            }

            .lima-gallery-title {
                font-size: 20px;
            }

            .lima-gallery-grid {
                column-count: 1;
            }

            .lima-gallery-tab {
                font-size: 13px;
                padding: 6px 10px;
            }

            .lima-gallery-modal-close {
                top: 20px;
                right: 20px;
                font-size: 32px;
            }

            .latest-news .container {
                flex-direction: column;
                padding: 2rem 1rem;
            }

            .news-left {
                margin-bottom: 2rem;
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll(".lima-gallery-tab");
            const items = document.querySelectorAll(".lima-gallery-item");
            const seeMoreBtn = document.getElementById("limaSeeMoreBtn");
            const galleryGrid = document.getElementById("limaGalleryGrid");

            let expanded = false;
            let originalMaxHeight = getComputedStyle(galleryGrid).maxHeight;

            function updateGalleryHeight() {
                galleryGrid.style.maxHeight = expanded ? 'none' : originalMaxHeight;
                seeMoreBtn.innerHTML = expanded ?
                    'See less <i class="fa-solid fa-chevron-up"></i>' :
                    'See more <i class="fa-solid fa-chevron-down"></i>';
            }

            function filterGallery(sportId) {
                items.forEach(item => {
                    item.style.display = (item.dataset.sport === sportId) ? 'block' : 'none';
                });
                expanded = false;
                updateGalleryHeight();
            }

            if (tabs.length > 0) {
                filterGallery(tabs[0].dataset.sport);
            }

            tabs.forEach(tab => {
                tab.addEventListener("click", () => {
                    tabs.forEach(t => t.classList.remove("active"));
                    tab.classList.add("active");
                    filterGallery(tab.dataset.sport);
                });
            });

            seeMoreBtn.addEventListener("click", () => {
                expanded = !expanded;
                updateGalleryHeight();
            });

            // Modal Logic (unchanged)
            const modal = document.getElementById("limaImageModal");
            const modalImg = document.getElementById("limaModalImage");
            const closeBtn = document.getElementById("limaModalClose");
            const imageTriggers = document.querySelectorAll(".lima-gallery-modal-trigger");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");

            let currentIndex = -1;

            function openModal(index) {
                if (index < 0 || index >= imageTriggers.length) return;
                currentIndex = index;
                modal.style.display = "flex";
                modalImg.src = imageTriggers[currentIndex].dataset.full;
            }

            function closeModal() {
                modal.style.display = "none";
                modalImg.src = "";
                currentIndex = -1;
            }

            imageTriggers.forEach((img, index) => {
                img.addEventListener("click", () => openModal(index));
            });

            closeBtn.addEventListener("click", closeModal);

            window.addEventListener("click", function(e) {
                if (e.target === modal) closeModal();
            });

            prevBtn.addEventListener("click", () => {
                if (currentIndex > 0) openModal(currentIndex - 1);
            });

            nextBtn.addEventListener("click", () => {
                if (currentIndex >= 0 && currentIndex < imageTriggers.length - 1) {
                    openModal(currentIndex + 1);
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabsContainer = document.querySelector(".lima-gallery-tabs");
            const activeTab = tabsContainer.querySelector(".lima-gallery-tab.active");

            if (activeTab) {
                // Scroll agar tab aktif berada di sisi kiri
                const offsetLeft = activeTab.offsetLeft;
                tabsContainer.scrollTo({
                    left: offsetLeft - 16, // bisa disesuaikan jaraknya dari kiri
                    behavior: "smooth"
                });
            }
        });
    </script>

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
