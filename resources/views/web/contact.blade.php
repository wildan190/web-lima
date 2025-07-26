@extends('layouts.web')

@section('title', 'Contact')

@section('content')
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url('{{ asset('assets/font/Poppins-Regular.ttf') }}') format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        /* BANNER SECTION */
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
        }

        .privacy-banner-text h1 {
            color: white;
            font-size: 28px;
            font-weight: 600;
            margin: 0;
        }

        .contact-section {
            padding: 60px 9rem;
            background: #fafafa;
        }

        .contact-container {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            align-items: flex-start;
        }

        .contact-info {
            flex: 1;
            min-width: 300px;
        }

        .contact-map {
            flex: 1;
            min-width: 300px;
        }

        .contact-map iframe {
            width: 100%;
            height: 300px;
            border: 0;
            border-radius: 12px;
        }

        .contact-info h2 {
            margin: 0;
        }

        .contact-info a {
            color: #d62828;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .privacy-banner-text {
                padding: 24px 1rem;
            }

            .privacy-banner-text h1 {
                font-size: 22px;
            }

            .privacy-banner-text p {
                font-size: 14px;
            }

            .contact-section {
                padding: 40px 1rem;
            }

            .contact-container {
                flex-direction: column;
                gap: 32px;
            }

            .contact-info h2 {
                font-size: 20px;
            }

            .contact-info p,
            .contact-info a {
                font-size: 14px;
                line-height: 1.6;
            }

            .contact-map iframe {
                height: 220px;
                border-radius: 8px;
            }
        }

        @media (max-width: 768px) {
            .privacy-banner-text {
                padding: 24px 1rem;
            }

            .privacy-banner-text h1 {
                font-size: 22px;
            }

            .privacy-banner-text p {
                font-size: 14px;
            }

            .contact-section {
                padding: 40px 1rem;
            }

            .contact-container {
                flex-direction: column;
                gap: 32px;
            }

            .contact-info h2 {
                font-size: 20px;
            }

            .contact-info p,
            .contact-info a {
                font-size: 14px;
                line-height: 1.6;
            }

            /* Memastikan Map mengisi lebar penuh dan tidak ada margin kiri-kanan */
            .contact-map {
                width: 100%;
                padding: 0;
                /* Menghilangkan padding agar iframe benar-benar 100% */
            }

            .contact-map iframe {
                width: 100%;
                /* Membuat lebar iframe mengisi 100% */
                height: 300px;
                /* Tinggi iframe, sesuaikan sesuai kebutuhan */
                border: 0;
                border-radius: 8px;
            }
        }

        @media (max-width: 480px) {
            .contact-map iframe {
                height: 220px;
                /* Menyesuaikan tinggi untuk layar lebih kecil */
            }
        }
    </style>

    <!-- Banner Section -->
    <section class="privacy-banner"
        style="background: url('{{ $contactBanner?->upload_picture ? $contactBanner->upload_picture : asset('assets/img/hero.png') }}') center center / cover no-repeat;">
        <div class="privacy-banner-overlay">
            <div class="privacy-banner-text">
                <h1>{{ $contactBanner?->title ?? 'Contact' }}</h1>
                <p style="color: white; margin: 0;">{{ $contactBanner?->subtitle ?? 'Stay connected with us' }}</p>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-section">
        <div class="contact-container">
            <div class="contact-info">
                <h2 style="color: #d62828; display: inline;">LIMA</h2>
                <h2 style="display: inline; margin-left: 8px;">Office</h2>
                <p>{{ $WebContact->address ?? 'n/a' }}</p>
                <p>
                    <strong>E-mail :</strong>
                    <a href="mailto:{{ $WebContact->email ?? 'none@email.com' }}" target="_blank">
                        {{ $WebContact->email ?? 'none@email.com' }}</a><br>
                    <strong>Office :</strong>
                    <a href="tel:{{ $WebContact->phone ?? 'n/a' }}" target="_blank">{{ $WebContact->phone ?? 'n/a' }}</a>
                </p>
            </div>
            <div class="contact-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d774772.1020493754!2d105.66515038076105!3d-6.209504499999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f50002a44927%3A0x65e6c28c04721e28!2sLIMA%20(Liga%20Mahasiswa)!5e1!3m2!1sid!2sid!4v1753242056782!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="yes" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
@endsection
