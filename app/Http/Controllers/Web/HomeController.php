<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AboutBanner;
use App\Models\ContactBanner;
use App\Models\Milestone;
use App\Models\PrivacyPolicy;
use App\Models\Sport;
use App\Models\UniversityCoverage;
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
        $policy = PrivacyPolicy::first();

        return view('web.privacy-policy', compact('policy'));
    }

    public function about(Request $request)
    {
        $webProfile = WebProfile::first();
        $WebContact = WebContact::first();
        $aboutBanner = AboutBanner::first();

        $newsLatest = \App\Models\News::orderBy('created_at', 'desc')->take(5)->get();

        return view('web.about', compact('webProfile', 'WebContact', 'newsLatest', 'aboutBanner'));
    }

    public function contact(Request $request)
    {
        $WebContact = WebContact::first();
        $contactBanner = ContactBanner::first();

        return view('web.contact', compact('WebContact', 'contactBanner'));
    }

    public function gallery(Request $request)
    {
        $webProfile = WebProfile::first();
        $WebContact = WebContact::first();
        $newsLatest = \App\Models\News::orderBy('created_at', 'desc')->take(5)->get();

        return view('web.gallery', compact('webProfile', 'WebContact', 'newsLatest'));
    }

    public function milestones(Request $request)
    {
        $webProfile = WebProfile::first();
        $WebContact = WebContact::first();
        $sports = Sport::all();
        $universities = UniversityCoverage::all();
        $milestones = Milestone::all();
        $newsLatest = \App\Models\News::orderBy('created_at', 'desc')->take(5)->get();

        return view('web.milestone', compact('webProfile', 'WebContact', 'newsLatest', 'sports', 'universities', 'milestones'));
    }

    public function news(Request $request)
    {
        $webProfile = WebProfile::first();
        $WebContact = WebContact::first();
        $newsLatest = \App\Models\News::orderBy('created_at', 'desc')->take(5)->get();

        return view('web.news', compact('webProfile', 'WebContact', 'newsLatest'));
    }

    public function newsDetail(Request $request, $id)
    {
        $webProfile = WebProfile::first();
        $WebContact = WebContact::first();
        $news = \App\Models\News::findOrFail($id);
        $newsLatest = \App\Models\News::orderBy('created_at', 'desc')->take(5)->get();

        return view('web.news-detail', compact('webProfile', 'WebContact', 'news', 'newsLatest'));
    }
}
