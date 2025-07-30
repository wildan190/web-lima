@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3 shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Total Visitors</h5>
                        <h3 class="card-text">{{ $totalVisitors }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-white bg-success mb-3 shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-user-clock fa-3x"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Today's Visitors</h5>
                        <h3 class="card-text">{{ $todayVisitors }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5>Visitors in Last 7 Days</h5>
            <canvas id="visitorChart" height="100"></canvas>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5>Top 7 Most Viewed News (by slug)</h5>
            <canvas id="newsChart" height="100"></canvas>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart pengunjung per hari
        const ctx = document.getElementById('visitorChart').getContext('2d');
        const visitorChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_column($dailyVisitors, 'date')) !!},
                datasets: [{
                    label: 'Visitors',
                    data: {!! json_encode(array_column($dailyVisitors, 'count')) !!},
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // Chart pengunjung per berita (slug)
        const newsCtx = document.getElementById('newsChart').getContext('2d');
        const newsChart = new Chart(newsCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($visitorBySlug->pluck('news_slug')) !!},
                datasets: [{
                    label: 'Visitors per News',
                    data: {!! json_encode($visitorBySlug->pluck('total')) !!},
                    backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1,
                    barThickness: 40
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
@endpush
