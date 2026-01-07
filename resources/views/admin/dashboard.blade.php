@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<div class="row g-3">

    <div class="col-md-6">
        <div class="card shadow-sm rounded-4">
            <div class="card-body d-flex align-items-center gap-3">

                <div class="bg-primary-subtle text-primary rounded-4 d-flex align-items-center justify-content-center"
                     style="width:60px;height:60px">
                    <i class="fas fa-users fs-4"></i>
                </div>

                <div>
                    <div class="text-muted small">Total Visitors</div>
                    <div class="h3 fw-bold mb-0">{{ $totalVisitors }}</div>
                </div>

            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card shadow-sm rounded-4">
            <div class="card-body d-flex align-items-center gap-3">

                <div class="bg-success-subtle text-success rounded-4 d-flex align-items-center justify-content-center"
                     style="width:60px;height:60px">
                    <i class="fas fa-user-clock fs-4"></i>
                </div>

                <div>
                    <div class="text-muted small">Today's Visitors</div>
                    <div class="h3 fw-bold mb-0">{{ $todayVisitors }}</div>
                </div>

            </div>
        </div>
    </div>

</div>


<div id="dashboard-data"
     data-daily-labels='@json(array_column($dailyVisitors,"date"))'
     data-daily-counts='@json(array_column($dailyVisitors,"count"))'
     data-news-labels='@json($visitorBySlug->pluck("news_slug"))'
     data-news-counts='@json($visitorBySlug->pluck("total"))'>
</div>


<div class="row g-3 mt-1">

    <div class="col-lg-6">
        <div class="card shadow-sm rounded-4">
            <div class="card-header bg-light fw-bold small">
                Visitors in Last 7 Days
            </div>
            <div class="card-body">
                <canvas id="visitorChart" height="110"></canvas>
            </div>
        </div>
    </div>


    <div class="col-lg-6">
        <div class="card shadow-sm rounded-4">
            <div class="card-header bg-light fw-bold small">
                Top 7 Most Viewed News
            </div>
            <div class="card-body">
                <canvas id="newsChart" height="110"></canvas>
            </div>
        </div>
    </div>

</div>

@endsection
