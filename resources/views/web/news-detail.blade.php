@extends('layouts.web')

@section('content')
    <!-- Progress Scroll -->
    <div id="scrollProgress"></div>

    <section class="news-detail-section" style="padding: 60px 9rem;">
        <div class="breadcrumb">
            <a href="{{ url('/') }}">News</a> › <a href="#">News Category</a> › <span>{{ $news->title }}</span>
        </div>

        <div class="news-layout">
            <!-- Left Share Column -->
            <aside class="news-share-box">
                <p class="share-title">Share to</p>
                <div class="share-icons-inline">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"
                        target="_blank" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank"
                        title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode(Request::fullUrl()) }}" target="_blank" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#" onclick="copyLink()" title="Copy Link">
                        <i class="fas fa-link"></i>
                    </a>
                </div>
                <small id="copyStatus" style="display:none; color: green;">Link Copied</small>
            </aside>

            <!-- Main News Content -->
            <div class="news-detail">
                <h1 class="news-title">{{ $news->title }}</h1>

                <div class="meta-share">
                    <p class="news-date">{{ \Carbon\Carbon::parse($news->created_at)->format('j M Y') }}</p>
                    <div class="meta-icons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"
                            target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank"
                            title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode(Request::fullUrl()) }}" target="_blank" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" onclick="copyLink()" title="Copy Link">
                            <i class="fas fa-link"></i>
                        </a>
                    </div>
                </div>

                <img src="{{ asset('storage/' . $news->picture_upload) }}" alt="{{ $news->title }}" class="news-image">

                <div class="news-content">
                    {!! $news->content !!}
                </div>
            </div>
        </div>

        <div class="related-section">
            <p class="related-label">Baca Juga:
                @if ($newsLatest->first())
                    <a href="{{ route('news.detail', $newsLatest->first()->slug) }}" class="related-link">
                        {{ $newsLatest->first()->title }}
                    </a>
                @endif
            </p>

            <div class="related-tags">
                @foreach ($newsLatest->take(3) as $item)
                    <span class="related-tag">{{ $item->category }}</span>
                @endforeach
            </div>
        </div>


    </section>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        #scrollProgress {
            position: fixed;
            top: 70px;
            left: 0;
            height: 4px;
            background: #B30202;
            width: 0%;
            z-index: 9999;
            transition: width 0.25s ease-out;
        }

        .breadcrumb {
            font-size: 14px;
            margin-bottom: 24px;
        }

        .breadcrumb a {
            color: #888;
            text-decoration: none;
        }

        .news-layout {
            display: flex;
            gap: 40px;
        }

        .news-share-box {
            width: 150px;
            flex-shrink: 0;
            text-align: center;
            margin-top: 70vh;
            transform: translateY(-50%);
        }


        .share-title {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .share-icons-inline {
            display: flex;
            justify-content: center;
            gap: 14px;
            font-size: 18px;
        }

        .share-icons-inline a {
            color: #333;
            transition: 0.3s;
        }

        .share-icons-inline a:hover {
            color: #B30202;
        }

        .news-detail {
            flex: 1;
            max-width: 900px;
        }

        .news-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .meta-share {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .news-date {
            font-size: 14px;
            color: #666;
            margin: 0;
        }

        .meta-icons {
            display: flex;
            gap: 14px;
            font-size: 18px;
        }

        .meta-icons a {
            color: #333;
            transition: 0.3s;
        }

        .meta-icons a:hover {
            color: #B30202;
        }

        .news-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 24px;
        }

        .news-content {
            font-size: 16px;
            color: #333;
            line-height: 1.7;
            margin-bottom: 40px;
        }

        .related-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 10px;
            font-size: 15px;
        }

        .related-link {
            color: #0b57d0;
            text-decoration: underline;
            font-weight: 500;
        }

        .related-link:hover {
            color: #083ea1;
        }

        .related-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .related-tag {
            padding: 6px 14px;
            border: 1px solid #ccc;
            border-radius: 999px;
            font-size: 13px;
            color: #666;
            background-color: #f9f9f9;
            cursor: default;
            transition: all 0.3s;
        }

        .related-tag:hover {
            background-color: #eee;
        }


        @media (max-width: 768px) {
            .news-layout {
                flex-direction: column;
            }

            .news-share-box {
                width: 100%;
                margin-bottom: 20px;
            }

            .share-icons-inline {
                justify-content: start;
            }

            .meta-share {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>

    <!-- Scripts -->
    <script>
        // Scroll progress bar
        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            document.getElementById("scrollProgress").style.width = scrollPercent + "%";
        });

        // Copy link
        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                const status = document.getElementById('copyStatus');
                status.style.display = 'inline';
                setTimeout(() => status.style.display = 'none', 2000);
            });
        }
    </script>
@endsection
