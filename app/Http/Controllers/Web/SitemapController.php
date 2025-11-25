<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();

        return response()->view('web.sitemap', [
            'news' => $news,
        ])->header('Content-Type', 'text/xml');
    }
}
