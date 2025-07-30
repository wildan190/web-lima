<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visitor;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('created_at', now()->toDateString())->count();

        return view('admin.dashboard', compact('totalVisitors', 'todayVisitors'));
    }
}
