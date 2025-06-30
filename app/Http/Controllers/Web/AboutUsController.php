<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use App\Models\WebContact;
use App\Models\WebProfile;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        $webProfile = WebProfile::first(); // hanya ambil satu
        $sports = Sport::all(); // ambil semua sport dan logo
        $WebContact = WebContact::first(); // hanya ambil satu kontak
        $newsLatest = \App\Models\News::orderBy('created_at', 'desc')->take(5)->get();

        return view('web.about', compact('webProfile', 'sports', 'WebContact', 'newsLatest'));
    }

    public function privacyPolicy(Request $request)
    {
        $policy = PrivacyPolicy::first(); // ambil kebijakan privasi

        return view('web.privacy-policy', compact('policy'));
    }
}
