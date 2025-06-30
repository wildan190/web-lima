@extends('layouts.web')

@section('content')

{{-- SECTION: Banner --}}
<section class="privacy-banner">
    <div class="privacy-banner-overlay">
        <div class="privacy-banner-text">
            <h1>Privacy Policy Use of Cookie</h1>
        </div>
    </div>
</section>

{{-- SECTION: Content --}}
<section class="privacy-policy-section">
    <div class="container">
        <h2 class="privacy-title">Privacy Policy Use of Cookie</h2>

        @if ($policy && $policy->content)
            <div class="privacy-content">{!! $policy->content !!}</div>
        @else
            <p class="empty-message">Privacy policy content is not available at the moment.</p>
        @endif
    </div>
</section>

<style>
/* BANNER SECTION */
.privacy-banner {
    position: relative;
    height: 320px;
    background: url('{{ asset("assets/img/hero.png") }}') center center / cover no-repeat;
}

.privacy-banner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: rgba(114, 19, 19, 0.7); /* merah semi transparan */
    display: flex;
    align-items: flex-end;
    justify-content: flex-start;
}

.privacy-banner-text {
    padding: 24px 9rem;
}

.privacy-banner-text h1 {
    color: white;
    font-size: 28px;
    font-weight: 600;
    margin: 0;
}

/* CONTENT SECTION */
.privacy-policy-section {
    padding: 60px 0;
    background: #fafafa;
    font-family: 'Inter', sans-serif;
}

.privacy-policy-section .container {
    padding: 0 9rem;
    max-width: 100%;
}

.privacy-title {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 24px;
    color: #2d2d2d;
    /* Jangan pakai padding di sini */
}

.privacy-content {
    font-size: 16px;
    line-height: 1.7;
    color: #333;
    background-color: #fff;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 0 12px rgba(0, 0, 0, 0.04);
}

.privacy-content h2, 
.privacy-content h3 {
    margin-top: 24px;
    font-weight: 600;
    color: #222;
}

.privacy-content ul {
    list-style: disc;
    padding-left: 24px;
    margin-top: 12px;
}

.empty-message {
    color: #999;
    text-align: center;
    font-style: italic;
}

/* RESPONSIVE */
@media (max-width: 1024px) {
    .privacy-banner-text,
    .privacy-policy-section .container {
        padding: 24px;
    }
}

</style>

@endsection
