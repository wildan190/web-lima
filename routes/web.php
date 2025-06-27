<?php

use App\Http\Controllers\Admin\DashboardController;
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
    Route::get('/web-profile', [WebProfileController::class, 'index'])->name('admin.web_profile.index');
    Route::post('/web-profile', [WebProfileController::class, 'store'])->name('admin.web_profile.store');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/web-contact', [WebContactController::class, 'index'])->name('admin.web_contact.index');
    Route::post('/web-contact', [WebContactController::class, 'store'])->name('admin.web_contact.store');
});

Route::get('/', function () {
    return view('welcome');
});
