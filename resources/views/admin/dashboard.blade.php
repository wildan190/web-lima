@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<style>
/* ====== DASHBOARD UI STYLE ====== */

.stat-card{
    border-radius:18px;
    border:1px solid #e6e6e6;
}

.stat-icon{
    width:60px;
    height:60px;
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
}

.section-card{
    border-radius:18px;
    border:1px solid #e6e6e6;
}

.card-header{
    border-bottom:1px solid #f0f0f0;
    font-weight:700;
    font-size:14px;
    letter-spacing:.3px;
}

canvas{
    margin-top:4px;
}
</style>


<!-- ================== STAT CARDS ================== -->
<div class="row g-3">

    <div class="col-md-6">
        <div class="card stat-card shadow-sm">
            <div class="card-body d-flex align-items-center">

                <div class="stat-icon bg-primary-subtle text-primary me-3">
                    <i class="fas fa-users fa-lg"></i>
                </div>

                <div>
                    <div class="text-muted small">Total Visitors</div>
                    <div class="h3 fw-bold mb-0">{{ $totalVisitors }}</div>
                </div>

            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card stat-card shadow-sm">
            <div class="card-body d-flex align-items-center">

                <div class="stat-icon bg-success-subtle text-success me-3">
                    <i class="fas fa-user-clock fa-lg"></i>
                </div>

                <div>
                    <div class="text-muted small">Today's Visitors</div>
                    <div class="h3 fw-bold mb-0">{{ $todayVisitors }}</div>
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

    <div class="col-lg-6">
        <div class="card section-card shadow-sm">
            <div class="card-header bg-light">
                Visitors in Last 7 Days
            </div>
            <div class="card-body">
                <canvas id="visitorChart" height="110"></canvas>
            </div>
        </div>
    </div>


    <div class="col-lg-6">
        <div class="card section-card shadow-sm">
            <div class="card-header bg-light">
                Top 7 Most Viewed News
            </div>
            <div class="card-body">
                <canvas id="newsChart" height="110"></canvas>
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
            borderColor: '#222',
            backgroundColor: 'rgba(0,0,0,.07)',
            tension: .35,
            pointRadius: 4,
            pointHoverRadius: 6,
            fill:true
        }]
    },
    options:{
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
            backgroundColor:'rgba(0,0,0,.7)',
            borderRadius:8,
            barThickness:36
        }]
    },
    options:{
        plugins:{ legend:{display:false}},
        scales:{ y:{ beginAtZero:true }}
    }
});

</script>

@endpush
