@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')


<!-- ================== STAT CARDS ================== -->
<div class="row g-3">

    <div class="col-12 col-md-6">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center">

                <div class="me-3 p-3 rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center">
                    <i class="fas fa-users fa-2x"></i>
                </div>

                <div>
                    <div class="text-muted small">Total Visitors</div>
                    <div class="h3 mb-0">{{ $totalVisitors }}</div>
                </div>

            </div>
        </div>
    </div>


    <div class="col-12 col-md-6">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center">

                <div class="me-3 p-3 rounded-3 bg-success-subtle text-success d-flex align-items-center justify-content-center">
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



<!-- ================== CHART DATA STORE ================== -->
<div id="dashboard-data"
     data-daily-labels='@json(array_column($dailyVisitors, "date"))'
     data-daily-counts='@json(array_column($dailyVisitors, "count"))'
     data-news-labels='@json($visitorBySlug->pluck("news_slug"))'
     data-news-counts='@json($visitorBySlug->pluck("total"))'>
</div>



<!-- ================== CHARTS ================== -->
<div class="row g-3 mt-1">

    <div class="col-12 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                Visitors in Last 7 Days
            </div>
            <div class="card-body">
                <div class="chart-container" style="height: 280px;">
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                Top 7 Most Viewed News
            </div>
            <div class="card-body">
                <div class="chart-container" style="height: 280px;">
                    <canvas id="newsChart"></canvas>
                </div>
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


// ================= LINE CHART =================
new Chart(document.getElementById('visitorChart'), {
    type: 'line',
    data: {
        labels: dailyLabels,
        datasets: [{
            label: 'Visitors',
            data: dailyCounts,
            borderColor: 'rgba(13, 110, 253, 1)',
            backgroundColor: 'rgba(13, 110, 253, 0.15)',
            tension: .35,
            pointRadius: 4,
            pointHoverRadius: 6,
            fill:true
        }]
    },
    options:{
        responsive:true,
        maintainAspectRatio:false,
        plugins:{ legend:{display:false}},
        scales:{ y:{ beginAtZero:true }}
    }
});


// ================= BAR CHART =================
new Chart(document.getElementById('newsChart'), {
    type: 'bar',
    data:{
        labels:newsLabels,
        datasets:[{
            label:'Visitors',
            data:newsCounts,
            backgroundColor:'rgba(108, 117, 125, 0.6)',
            borderRadius:8,
            barThickness:36
        }]
    },
    options:{
        responsive:true,
        maintainAspectRatio:false,
        plugins:{ legend:{display:false}},
        scales:{ y:{ beginAtZero:true }}
    }
});

</script>

@endpush
