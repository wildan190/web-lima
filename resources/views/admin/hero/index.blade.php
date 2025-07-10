@extends('layouts.admin')
@section('title', 'Hero Banners')

@section('content')
        <style>
        .hero-index {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%);
            padding: 40px 2vw;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            margin-top: 32px;
            min-height: 80vh;
            max-width: 100vw;
            box-sizing: border-box;
        }
        .hero-index h3 {
            margin-bottom: 32px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #2d3748;
        }
        .hero-index .btn-primary, .hero-index .btn-warning, .hero-index .btn-link {
            margin-bottom: 24px;
            font-weight: 600;
            border-radius: 8px;
            background: #4f8cff;
            color: #fff !important;
            border: none;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            padding: 10px 22px;
            font-size: 1rem;
            display: inline-block;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
        }
        .hero-index .btn-primary:hover, 
        .hero-index .btn-warning:hover, 
        .hero-index .btn-link:hover {
            background: #357ae8;
            color: #fff !important;
        }
        .hero-index .btn-link {
            background: transparent;
            color: #4f8cff !important;
            margin-bottom: 0;
            box-shadow: none;
            text-decoration: underline;
            padding: 0;
        }
        .hero-index .btn-link:hover {
            background: transparent;
            color: #357ae8 !important;
        }
        .hero-index .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
        .hero-index .table {
            width: 100%;
            min-width: 600px;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            border-collapse: collapse;
        }
        .hero-index th {
            background: #f1f5f9;
            color: #374151;
            font-weight: 600;
            font-size: 1.05rem;
            border-bottom: 2px solid #e5e7eb;
        }
        .hero-index th, .hero-index td {
            vertical-align: middle !important;
            text-align: center;
            padding: 18px 12px;
        }
        .hero-index img {
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            transition: transform 0.2s;
            max-width: 110px;
            max-height: 60px;
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .hero-index img:hover {
            transform: scale(1.08);
        }
        .alert-success {
            margin-bottom: 20px;
            border-radius: 8px;
            font-weight: 500;
        }
        .action-btns .btn {
            margin: 0 4px;
            border-radius: 6px;
            font-size: 0.95rem;
            padding: 8px 16px;
            min-width: 80px;
            display: inline-block;
        }
        .empty-state {
            color: #a0aec0;
            font-size: 1.1rem;
            padding: 40px 0;
        }
        /* Responsive */
        @media (max-width: 900px) {
            .hero-index {
                padding: 24px 1vw;
            }
            .hero-index .table {
                min-width: 480px;
            }
            .hero-index th, .hero-index td {
                padding: 12px 6px;
                font-size: 0.97rem;
            }
        }
        @media (max-width: 600px) {
            .hero-index {
                padding: 10px 0.5vw;
            }
            .hero-index h3 {
                font-size: 1.2rem;
            }
            .hero-index .table {
                min-width: 350px;
            }
            .hero-index th, .hero-index td {
                padding: 8px 3px;
                font-size: 0.92rem;
            }
            .action-btns .btn {
                font-size: 0.85rem;
                padding: 6px 10px;
                min-width: 60px;
            }
        }
    </style>

    <div class="hero-index">
        <h3><i class="fas fa-images"></i> Hero List</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.hero.create') }}" class="btn btn-primary shadow-sm"><i class="fas fa-plus"></i> Add New</a>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($heroes as $hero)
                        <tr>
                            <td>
                                @if($hero->picture_upload)
                                    <img src="{{ $hero->picture_upload }}" alt="Hero Image">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $hero->title }}</td>
                            <td>{{ $hero->subtitle }}</td>
                            <td class="action-btns">
                                <a href="{{ route('admin.hero.edit', $hero->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty-state">
                                <i class="fas fa-box-open fa-2x mb-2"></i><br>
                                No hero banners found. <br>
                                <a href="{{ route('admin.hero.create') }}" class="btn btn-link mt-2">Add your first hero banner</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
@endsection
