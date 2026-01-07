@extends('layouts.web')

@section('title', 'LIMA - Maintenance')

@section('content')
<style>
    .maintenance-wrapper {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #E02A26 0%, #4e0e0e 100%);
        color: #fff;
        padding: 60px 20px;
        text-align: center;
    }
    .maintenance-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(6px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 20px;
        padding: 32px 28px;
        max-width: 720px;
        width: 100%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.25);
    }
    .maintenance-logo {
        width: 120px;
        height: auto;
        margin: 0 auto 12px auto;
        display: block;
        filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
    }
    .maintenance-title {
        font-size: 36px;
        font-weight: 800;
        margin: 10px 0 6px 0;
        letter-spacing: 0.6px;
    }
    .maintenance-subtitle {
        font-size: 16px;
        opacity: 0.9;
        margin-bottom: 22px;
    }
    .maintenance-status {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 16px;
        background: rgba(0,0,0,0.25);
        border-radius: 999px;
        font-weight: 600;
        margin-bottom: 14px;
    }
    .maintenance-status .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #ffd166;
        animation: pulse 1.6s infinite;
    }
    @keyframes pulse {
        0% { transform: scale(1); opacity: 1; }
        60% { transform: scale(1.6); opacity: 0.6; }
        100% { transform: scale(1); opacity: 1; }
    }
    .maintenance-actions {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
        flex-wrap: wrap;
    }
    .btn-primary {
        background: #ffffff;
        color: #E02A26;
        border: none;
        border-radius: 999px;
        padding: 10px 18px;
        font-weight: 700;
        text-decoration: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(0,0,0,0.25);
    }
    .btn-ghost {
        background: transparent;
        border: 1px solid rgba(255,255,255,0.6);
        color: #fff;
        border-radius: 999px;
        padding: 10px 18px;
        font-weight: 700;
        text-decoration: none;
        transition: background 0.2s ease;
    }
    .btn-ghost:hover {
        background: rgba(255,255,255,0.12);
    }
    .maintenance-footer {
        margin-top: 18px;
        font-size: 13px;
        opacity: 0.8;
    }
</style>

<section class="maintenance-wrapper">
    <div class="maintenance-card">
        <img class="maintenance-logo" src="{{ asset('assets/img/lima-white.png') }}" alt="LIMA Logo">
        <div class="maintenance-status">
            <span class="dot"></span>
            <span>Scheduled Maintenance</span>
        </div>
        <h1 class="maintenance-title">We’ll be right back</h1>
        <p class="maintenance-subtitle">
            Situs LIMA sedang dalam pemeliharaan untuk peningkatan performa dan keamanan. 
            Terima kasih atas kesabaran Anda.
        </p>
        <div class="maintenance-actions">
            <a class="btn-primary" href="{{ url('/') }}">Kembali ke Beranda</a>
            <a class="btn-ghost" href="{{ route('contact') }}">Hubungi Kami</a>
        </div>
        <div class="maintenance-footer">
            Status akan otomatis pulih setelah proses selesai. Refresh halaman secara berkala.
        </div>
    </div>
    </section>
@endsection

