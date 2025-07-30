@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>Total Visitors: {{ $totalVisitors }}</h5>
            <h5>Today's Visitors: {{ $todayVisitors }}</h5>
        </div>
    </div>

@endsection
