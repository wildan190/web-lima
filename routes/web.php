<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SportController;
use App\Http\Controllers\Admin\WebContactController;
use App\Http\Controllers\Admin\WebProfileController;
use App\Http\Controllers\Auth\AuthController;
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
    // Galleries
    Route::get('galleries', [GalleryController::class, 'index'])->name('galleries.index');
    Route::get('galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
    Route::post('galleries', [GalleryController::class, 'store'])->name('galleries.store');
    Route::get('galleries/{gallery}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
    Route::put('galleries/{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
    Route::delete('galleries/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    // Sports
    Route::get('sports', [SportController::class, 'index'])->name('sports.index');
    Route::get('sports/create', [SportController::class, 'create'])->name('sports.create');
    Route::post('sports', [SportController::class, 'store'])->name('sports.store');
    Route::get('sports/{sport}/edit', [SportController::class, 'edit'])->name('sports.edit');
    Route::put('sports/{sport}', [SportController::class, 'update'])->name('sports.update');
    Route::delete('sports/{sport}', [SportController::class, 'destroy'])->name('sports.destroy');
});


Route::get('/', function () {
    return view('welcome');
});
