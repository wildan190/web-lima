<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visitor;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('created_at', now()->toDateString())->count();

        $dailyVisitors = [];
        foreach (range(6, 0) as $i) {
            $date = Carbon::today()->subDays($i)->toDateString();
            $count = Visitor::whereDate('created_at', $date)->count();
            $dailyVisitors[] = [
                'date' => Carbon::parse($date)->format('d M'),
                'count' => $count,
            ];
        }

        $visitorBySlug = Visitor::select('news_slug', DB::raw('count(*) as total'))->whereNotNull('news_slug')->groupBy('news_slug')->orderByDesc('total')->limit(7)->get();

        return view('admin.dashboard', compact('totalVisitors', 'todayVisitors', 'dailyVisitors', 'visitorBySlug'));
    }
}
