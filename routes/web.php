<?php

use App\Http\Controllers\Admin\AboutBannerController;
use App\Http\Controllers\Admin\ContactBannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryBannerController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\MilestoneBannerController;
use App\Http\Controllers\Admin\MilestoneController;
use App\Http\Controllers\Admin\NewsBannerController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\SportController;
use App\Http\Controllers\Admin\UniversityCoverageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebContactController;
use App\Http\Controllers\Admin\WebProfileController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\SitemapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy.policy');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
    Route::get('/milestones', [HomeController::class, 'milestones'])->name('milestones');
    Route::get('/news', [HomeController::class, 'news'])->name('news');
    Route::get('/news/{slug}', [HomeController::class, 'newsDetail'])->name('news.detail');
});

Route::post('/accept-cookies', function (Request $request) {
    return response('OK')->cookie('cookie_consent', 'accepted', 60 * 24 * 365); // 1 year
})->name('cookie.accept');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::resource('users', UserController::class);

    // Web Profile & Contact
    Route::get('web-profile', [WebProfileController::class, 'index'])->name('web_profile.index');
    Route::post('web-profile', [WebProfileController::class, 'store'])->name('web_profile.store');
    Route::get('web-contact', [WebContactController::class, 'index'])->name('web_contact.index');
    Route::post('web-contact', [WebContactController::class, 'store'])->name('web_contact.store');

    // Sports
    Route::resource('sports', SportController::class);

    // Galleries
    Route::resource('galleries', GalleryController::class);

    // University Coverages
    Route::resource('university-coverages', UniversityCoverageController::class);

    // Milestones
    Route::resource('milestones', MilestoneController::class);

    // News
    Route::get('news', [NewsController::class, 'index'])->name('news.index');
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('news', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    // Privacy Policy
    Route::get('privacy-policies', [PrivacyPolicyController::class, 'edit'])->name('privacy-policies.edit');
    Route::put('privacy-policies', [PrivacyPolicyController::class, 'update'])->name('privacy-policies.update');

    // Banners
    Route::get('about-banner', [AboutBannerController::class, 'create'])->name('about_banner.create');
    Route::post('about-banner', [AboutBannerController::class, 'storeOrUpdate'])->name('about_banner.store_or_update');
    Route::get('contact-banner', [ContactBannerController::class, 'form'])->name('contact_banner.form');
    Route::post('contact-banner', [ContactBannerController::class, 'storeOrUpdate'])->name('contact_banner.store_or_update');
    Route::get('milestone-banner', [MilestoneBannerController::class, 'create'])->name('milestone_banner.create');
    Route::post('milestone-banner', [MilestoneBannerController::class, 'storeOrUpdate'])->name('milestone_banner.store_or_update');
    Route::get('gallery-banner', [GalleryBannerController::class, 'create'])->name('gallery_banner.create');
    Route::post('gallery-banner', [GalleryBannerController::class, 'storeOrUpdate'])->name('gallery_banner.store_or_update');
    Route::get('news-banner', [NewsBannerController::class, 'create'])->name('news_banner.create');
    Route::post('news-banner', [NewsBannerController::class, 'storeOrUpdate'])->name('news_banner.store_or_update');

    // Hero
    Route::resource('hero', HeroController::class);
});

Route::get('language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'id'])) {
        session(['locale' => $lang]);
    }
    return back();
})->name('change.language');

