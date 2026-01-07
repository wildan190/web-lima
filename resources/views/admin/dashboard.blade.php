@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 p-3 rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Visitors</div>
                        <div class="h3 mb-0">{{ $totalVisitors }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 p-3 rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-clock fa-2x"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Today's Visitors</div>
                        <div class="h3 mb-0">{{ $todayVisitors }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-1">
        <div class="col-lg-6">
            <div id="dashboard-data"
                 data-daily-labels='@json(array_column($dailyVisitors, "date"))'
                 data-daily-counts='@json(array_column($dailyVisitors, "count"))'
                 data-news-labels='@json($visitorBySlug->pluck("news_slug"))'
                 data-news-counts='@json($visitorBySlug->pluck("total"))'></div>
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <strong>Visitors in Last 7 Days</strong>
                </div>
                <div class="card-body">
                    <canvas id="visitorChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <strong>Top 7 Most Viewed News (by slug)</strong>
                </div>
                <div class="card-body">
                    <canvas id="newsChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const dataEl = document.getElementById('dashboard-data');
        const dailyLabels = JSON.parse(dataEl.dataset.dailyLabels || '[]');
        const dailyCounts = JSON.parse(dataEl.dataset.dailyCounts || '[]');
        const newsLabels = JSON.parse(dataEl.dataset.newsLabels || '[]');
        const newsCounts = JSON.parse(dataEl.dataset.newsCounts || '[]');

        // Chart pengunjung per hari
        const ctx = document.getElementById('visitorChart').getContext('2d');
        const visitorChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dailyLabels,
                datasets: [{
                    label: 'Visitors',
                    data: dailyCounts,
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
                labels: newsLabels,
                datasets: [{
                    label: 'Visitors per News',
                    data: newsCounts,
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
