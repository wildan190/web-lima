<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use App\Models\Sport;
use App\Models\WebContact;
use App\Models\WebProfile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $webProfile = WebProfile::first(); // hanya ambil satu
        $sports = Sport::all(); // ambil semua sport dan logo
        $WebContact = WebContact::first(); // hanya ambil satu kontak

        $newsLatest = \App\Models\News::orderBy('created_at', 'desc')->take(5)->get();

        return view('web.home', compact('webProfile', 'sports', 'WebContact', 'newsLatest'));
    }

    public function privacyPolicy(Request $request)
    {
        $policy = PrivacyPolicy::first(); // ambil kebijakan privasi

        return view('web.privacy-policy', compact('policy'));
    }

    public function about(Request $request)
    {
        $webProfile = WebProfile::first(); // hanya ambil satu
        $WebContact = WebContact::first(); // hanya ambil satu kontak

        return view('web.about', compact('webProfile', 'WebContact'));
    }

    public function contact(Request $request)
    {
        $WebContact = WebContact::first(); // hanya ambil satu kontak

        return view('web.contact', compact('WebContact'));
    }
}
