<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AboutBanner;
use App\Models\ContactBanner;
use App\Models\Gallery;
use App\Models\GalleryBanner;
use App\Models\Hero;
use App\Models\MilestioneBanner;
use App\Models\Milestone;
use App\Models\News;
use App\Models\NewsBanner;
use App\Models\PrivacyPolicy;
use App\Models\Sport;
use App\Models\UniversityCoverage;
use App\Models\WebContact;
use App\Models\WebProfile;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    protected $webProfile;
    protected $webContact;
    protected $sports;
    protected $newsLatest;

    public function __construct()
    {
        // Cache common data for 10 minutes
        $this->webProfile = Cache::remember('webProfile', 600, fn() => WebProfile::first());
        $this->webContact = Cache::remember('webContact', 600, fn() => WebContact::first());
        $this->sports = Cache::remember('sports', 600, fn() => Sport::all());
        $this->newsLatest = Cache::remember('newsLatest', 600, fn() => News::orderBy('created_at', 'desc')->take(5)->get());
    }

    public function index(Request $request)
    {
        Visitor::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        $heroSlide = Hero::all();

        return view('web.home', [
            'webProfile' => $this->webProfile,
            'sports' => $this->sports,
            'WebContact' => $this->webContact,
            'newsLatest' => $this->newsLatest,
            'heroSlide' => $heroSlide,
        ]);
    }

    public function privacyPolicy(Request $request)
    {
        $policy = Cache::remember('privacyPolicy', 600, fn() => PrivacyPolicy::first());

        return view('web.privacy-policy', compact('policy'));
    }

    public function about(Request $request)
    {
        $aboutBanner = Cache::remember('aboutBanner', 600, fn() => AboutBanner::first());

        return view('web.about', [
            'webProfile' => $this->webProfile,
            'WebContact' => $this->webContact,
            'newsLatest' => $this->newsLatest,
            'aboutBanner' => $aboutBanner,
        ]);
    }

    public function contact(Request $request)
    {
        $contactBanner = Cache::remember('contactBanner', 600, fn() => ContactBanner::first());

        return view('web.contact', [
            'WebContact' => $this->webContact,
            'contactBanner' => $contactBanner,
        ]);
    }

    public function gallery(Request $request)
    {
        $gallery = Cache::remember('gallery', 600, fn() => Gallery::all());
        $galleryBanner = Cache::remember('galleryBanner', 600, fn() => GalleryBanner::first());

        return view('web.gallery', [
            'webProfile' => $this->webProfile,
            'WebContact' => $this->webContact,
            'newsLatest' => $this->newsLatest,
            'gallery' => $gallery,
            'sports' => $this->sports,
            'galleryBanner' => $galleryBanner,
        ]);
    }

    public function milestones(Request $request)
    {
        $universities = Cache::remember('universities', 600, fn() => UniversityCoverage::all());
        $milestones = Cache::remember('milestones', 600, fn() => Milestone::all());
        $milestoneBanner = Cache::remember('milestoneBanner', 600, fn() => MilestioneBanner::first());

        return view('web.milestone', [
            'webProfile' => $this->webProfile,
            'WebContact' => $this->webContact,
            'newsLatest' => $this->newsLatest,
            'sports' => $this->sports,
            'universities' => $universities,
            'milestones' => $milestones,
            'milestoneBanner' => $milestoneBanner,
        ]);
    }

    public function news(Request $request)
    {
        $newsBanner = Cache::remember('newsBanner', 600, fn() => NewsBanner::first());
        $gallery = Cache::remember('gallery', 600, fn() => Gallery::all());

        $pressRelease = News::paginate(15, ['*'], 'press_page');

        $query = News::query();
        $categories = $request->input('categories', []);
        if (!empty($categories) && !in_array('all', $categories)) {
            $query->whereIn('category', $categories);
        }

        $sort = $request->input('sort', 'newest');
        $query->orderBy('created_at', $sort === 'oldest' ? 'asc' : 'desc');

        $news = $query->paginate(8)->appends($request->all());

        return view('web.news', [
            'pressRelease' => $pressRelease,
            'webProfile' => $this->webProfile,
            'WebContact' => $this->webContact,
            'news' => $news,
            'newsBanner' => $newsBanner,
            'sports' => $this->sports,
            'gallery' => $gallery,
        ]);
    }

    public function newsDetail(Request $request, $slug)
    {
        Visitor::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
            'news_slug' => $slug,
        ]);

        $news = News::where('slug', $slug)->firstOrFail();
        $relatedNews = News::where('category', $news->category)->latest()->take(3)->get();

        return view('web.news-detail', [
            'webProfile' => $this->webProfile,
            'WebContact' => $this->webContact,
            'news' => $news,
            'newsLatest' => $this->newsLatest,
            'relatedNews' => $relatedNews,
        ]);
    }
}
