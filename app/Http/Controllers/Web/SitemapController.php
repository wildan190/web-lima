<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Milestone;

class SitemapController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        $galleries = Gallery::latest()->get();
        $milestones = Milestone::latest()->get();

        return response()->view('web.sitemap', [
            'news' => $news,
            'galleries' => $galleries,
            'milestones' => $milestones,
        ])->header('Content-Type', 'text/xml');
    }
}
