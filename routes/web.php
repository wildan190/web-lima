<?php

use App\Http\Controllers\Admin\AboutBannerController;
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
use App\Http\Controllers\Admin\WebContactController;
use App\Http\Controllers\Admin\WebProfileController;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', [\App\Http\Controllers\Web\HomeController::class, 'index'])->name('home');
Route::get('/privacy-policy', [\App\Http\Controllers\Web\HomeController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/contact', [\App\Http\Controllers\Web\HomeController::class, 'contact'])->name('contact');
Route::get('/about', [\App\Http\Controllers\Web\HomeController::class, 'about'])->name('about');
Route::get('/gallery', [\App\Http\Controllers\Web\HomeController::class, 'gallery'])->name('gallery');
Route::get('/milestones', [\App\Http\Controllers\Web\HomeController::class, 'milestones'])->name('milestones');
Route::get('/news', [\App\Http\Controllers\Web\HomeController::class, 'news'])->name('news');
Route::get('/news/{slug}', [\App\Http\Controllers\Web\HomeController::class, 'newsDetail'])->name('news.detail');

Route::post('/accept-cookies', function (Request $request) {
    return response('OK')->cookie('cookie_consent', 'accepted', 60 * 24 * 365); // 1 year
})->name('cookie.accept');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/web-contact', [WebContactController::class, 'index'])->name('admin.web_contact.index');
    Route::post('/web-contact', [WebContactController::class, 'store'])->name('admin.web_contact.store');

    Route::get('/web-profile', [WebProfileController::class, 'index'])->name('admin.web_profile.index');
    Route::post('/web-profile', [WebProfileController::class, 'store'])->name('admin.web_profile.store');

    Route::get('/sport', [SportController::class, 'index'])->name('admin.sport.index');
    Route::get('/sport/create', [SportController::class, 'create'])->name('admin.sport.create');
    Route::post('/sport', [SportController::class, 'store'])->name('admin.sport.store');
    Route::get('/sport/{id}/edit', [SportController::class, 'edit'])->name('admin.sport.edit');
    Route::put('/sport/{id}', [SportController::class, 'update'])->name('admin.sport.update');
    Route::delete('/sport/{id}', [SportController::class, 'destroy'])->name('admin.sport.destroy');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('galleries', [GalleryController::class, 'index'])->name('galleries.index');
    Route::get('galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
    Route::post('galleries', [GalleryController::class, 'store'])->name('galleries.store');
    Route::get('galleries/{gallery}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
    Route::put('galleries/{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
    Route::delete('galleries/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('sports', [SportController::class, 'index'])->name('sports.index');
    Route::get('sports/create', [SportController::class, 'create'])->name('sports.create');
    Route::post('sports', [SportController::class, 'store'])->name('sports.store');
    Route::get('sports/{sport}/edit', [SportController::class, 'edit'])->name('sports.edit');
    Route::put('sports/{sport}', [SportController::class, 'update'])->name('sports.update');
    Route::delete('sports/{sport}', [SportController::class, 'destroy'])->name('sports.destroy');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('university-coverages', [UniversityCoverageController::class, 'index'])->name('university-coverages.index');
    Route::get('university-coverages/create', [UniversityCoverageController::class, 'create'])->name('university-coverages.create');
    Route::post('university-coverages', [UniversityCoverageController::class, 'store'])->name('university-coverages.store');
    Route::get('university-coverages/{id}/edit', [UniversityCoverageController::class, 'edit'])->name('university-coverages.edit');
    Route::put('university-coverages/{id}', [UniversityCoverageController::class, 'update'])->name('university-coverages.update');
    Route::delete('university-coverages/{id}', [UniversityCoverageController::class, 'destroy'])->name('university-coverages.destroy');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('milestones', [MilestoneController::class, 'index'])->name('milestones.index');
    Route::get('milestones/create', [MilestoneController::class, 'create'])->name('milestones.create');
    Route::post('milestones', [MilestoneController::class, 'store'])->name('milestones.store');
    Route::get('milestones/{id}/edit', [MilestoneController::class, 'edit'])->name('milestones.edit');
    Route::put('milestones/{id}', [MilestoneController::class, 'update'])->name('milestones.update');
    Route::delete('milestones/{id}', [MilestoneController::class, 'destroy'])->name('milestones.destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('news', [NewsController::class, 'index'])->name('news.index');
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('news/{id}/update', [NewsController::class, 'update'])->name('news.update');
    Route::delete('news/{id}/destroy', [NewsController::class, 'destroy'])->name('news.destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('privacy-policies', [PrivacyPolicyController::class, 'edit'])->name('privacy-policies.edit');
    Route::put('privacy-policies', [PrivacyPolicyController::class, 'update'])->name('privacy-policies.update');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/about-banner', [AboutBannerController::class, 'create'])->name('about_banner.create');
    Route::post('/about-banner', [AboutBannerController::class, 'storeOrUpdate'])->name('about_banner.store_or_update');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('contact-banner', [\App\Http\Controllers\Admin\ContactBannerController::class, 'form'])->name('contact_banner.form');
    Route::post('contact-banner', [\App\Http\Controllers\Admin\ContactBannerController::class, 'storeOrUpdate'])->name('contact_banner.store_or_update');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('milestone-banner', [MilestoneBannerController::class, 'create'])->name('admin.milestone_banner.create');
    Route::post('milestone-banner', [MilestoneBannerController::class, 'storeOrUpdate'])->name('admin.milestone_banner.store_or_update');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('gallery-banner', [GalleryBannerController::class, 'create'])->name('admin.gallery_banner.create');
    Route::post('gallery-banner', [GalleryBannerController::class, 'storeOrUpdate'])->name('admin.gallery_banner.store_or_update');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('news-banner', [NewsBannerController::class, 'create'])->name('admin.news_banner.create');
    Route::post('news-banner', [NewsBannerController::class, 'storeOrUpdate'])->name('admin.news_banner.store_or_update');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('hero', [HeroController::class, 'index'])->name('hero.index');
    Route::get('hero/create', [HeroController::class, 'create'])->name('hero.create');
    Route::post('hero/store', [HeroController::class, 'store'])->name('hero.store');
    Route::get('hero/{hero}/edit', [HeroController::class, 'edit'])->name('hero.edit');
    Route::post('hero/{hero}/update', [HeroController::class, 'update'])->name('hero.update');
});
