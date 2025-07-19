@extends('layouts.web')

@section('content')
    <div id="scrollProgress"></div>

    <section class="news-container">
        {{-- Breadcrumb --}}
        <nav class="breadcrumb">
            <a href="{{ url('/') }}">Home</a> &rsaquo;
            <a href="#">News Category</a> &rsaquo;
            <span>{{ $news->title }}</span>
        </nav>

        {{-- Main Content --}}
        <article class="news-content">
            <h1 class="news-title">{{ $news->title }}</h1>

            <div class="news-meta">
                <span class="news-date">{{ \Carbon\Carbon::parse($news->created_at)->format('j M Y') }}</span>
                <div class="news-meta-icons">
                    <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank"
                        title="Share to Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank"
                        title="Share to Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://wa.me/?text={{ urlencode(Request::fullUrl()) }}" target="_blank"
                        title="Share to WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" onclick="copyLink()" title="Copy Link"><i class="fas fa-link"></i></a>
                </div>
                <small id="copyStatus" style="display:none; color: green;">Link copied</small>
            </div>

            <img src="{{ $news->picture_upload }}" class="news-image" alt="{{ $news->title }}">

            <div class="news-body-content">
                {!! $news->content !!}
            </div>
        </article>

        {{-- Related News Section --}}
        <div class="news-related-section">
            <h2>Related News</h2>
            <div class="news-related-items">
                @forelse ($relatedNews as $item)
                    <div class="related-item">
                        <a href="{{ route('news.detail', $item->slug) }}">
                            <img src="{{ $item->picture_upload }}" alt="{{ $item->title }}" class="related-image">
                            <p class="related-title">{{ $item->title }}</p>
                        </a>
                    </div>
                @empty
                    <p>No related news available.</p> {{-- Pesan jika tidak ada berita terkait --}}
                @endforelse
            </div>
        </div>

        {{-- Baca Juga Section --}}
        <div class="news-related">
            <p class="related-title">
                Baca Juga:
                @if ($newsLatest->first())
                    <a href="{{ route('news.detail', $newsLatest->first()->slug) }}">{{ $newsLatest->first()->title }}</a>
                @endif
            </p>

            <div class="related-tags">
                @foreach ($newsLatest->take(3) as $item)
                    <span class="tag">{{ $item->category }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    <style>
        :root {
            --primary-color: #B30202;
            --text-dark: #222;
            --text-muted: #777;
        }

        #scrollProgress {
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            background: var(--primary-color);
            width: 0%;
            z-index: 9999;
        }

        .news-container {
            max-width: 960px;
            margin: auto;
            padding: 60px 24px;
        }

        .breadcrumb {
            font-size: 14px;
            margin-bottom: 24px;
        }

        .breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
        }

        .news-content {
            width: 100%;
        }

        .news-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 12px;
            color: var(--text-dark);
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .news-date {
            color: var(--text-muted);
            font-size: 14px;
        }

        .news-meta-icons {
            display: flex;
            gap: 14px;
            font-size: 18px;
        }

        .news-meta-icons a {
            color: var(--text-dark);
            transition: color 0.3s;
        }

        .news-meta-icons a:hover {
            color: var(--primary-color);
        }

        .news-image {
            width: 100%;
            height: auto;
            max-height: 420px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 24px;
        }

        .news-body-content {
            font-size: 16px;
            color: var(--text-dark);
            line-height: 1.8;
        }

        .news-related-section {
            margin-top: 60px;
        }

        .news-related-section h2 {
            font-size: 24px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .news-related-items {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .related-item {
            width: 30%;
        }

        .related-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }

        .related-title {
            font-size: 16px;
            font-weight: 500;
            color: var(--text-dark);
            margin-top: 12px;
        }

        .news-related {
            margin-top: 60px;
        }

        .related-title {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 10px;
            font-size: 16px;
        }

        .related-title a {
            color: #0b57d0;
            text-decoration: underline;
            font-weight: 500;
        }

        .related-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .tag {
            padding: 6px 14px;
            font-size: 13px;
            border: 1px solid #ccc;
            border-radius: 999px;
            background: #f4f4f4;
            color: #555;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .news-container {
                padding: 32px 16px;
            }

            .news-title {
                font-size: 24px;
            }

            .news-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            .news-image {
                max-height: 260px;
            }

            .news-related-items {
                flex-direction: column;
                gap: 20px;
            }

            .related-item {
                width: 100%;
            }
        }
    </style>

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
