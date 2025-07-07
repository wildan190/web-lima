@extends('layouts.web')

@section('content')
<section class="news-detail-section" style="padding: 60px 9rem;">
    <div class="container">
        <div class="news-detail">
            <h1 class="news-title">{{ $news->title }}</h1>
            <div class="news-meta">
                <span>Oleh Admin</span>
                <span>{{ \Carbon\Carbon::parse($news->created_at)->format('j M Y') }}</span>
            </div>
            <img src="{{ asset('storage/' . $news->picture_upload) }}" alt="{{ $news->title }}" class="news-image">
            <div class="news-content">
                {!! $news->content !!}
            </div>
        </div>

        <hr style="margin: 60px 0;">

        <div class="news-latest">
            <h3>Berita Terbaru</h3>
            <ul>
                @foreach ($newsLatest as $item)
                    <li style="margin-bottom: 16px;">
                        <a href="{{ route('news.detail', ['slug' => $item->slug]) }}" style="color: #B30202; font-weight: bold;">
                            {{ $item->title }}
                        </a><br>
                        <small>{{ \Carbon\Carbon::parse($item->created_at)->format('j M Y') }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

<style>
    .news-title {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 12px;
    }

    .news-meta {
        font-size: 14px;
        color: #888;
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
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
    }

    .news-latest h3 {
        font-size: 20px;
        margin-bottom: 16px;
    }
</style>
@endsection
