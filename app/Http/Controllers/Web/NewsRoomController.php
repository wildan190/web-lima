<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use App\Models\WebContact;
use App\Models\WebProfile;
use Illuminate\Http\Request;

class NewsRoomController extends Controller
{
    public function index(Request $request)
    {
        $webProfile = WebProfile::first(); // hanya ambil satu
        $sports = Sport::all(); // ambil semua sport dan logo
        $WebContact = WebContact::first(); // hanya ambil satu kontak

        $newsLatest = \App\Models\News::orderBy('created_at', 'desc')->take(5)->get();

        return view('web.news', compact('webProfile', 'sports', 'WebContact', 'newsLatest'));
    }
}
