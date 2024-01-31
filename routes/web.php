<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('home.index');
});

// Authentication Routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    // Dashboard Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/upload', [DashboardController::class, 'upload'])->name('upload');

    // Gallery Routes
    Route::prefix('/dashboard/gallery')->group(function () {
        Route::get('/main', [DashboardController::class, 'main'])->name('dashboard.gallery.main');
    });
});

// Logout Route
Route::post('/logout', [LoginController::class, 'logout']);

// Pricing Route
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');

// Resourceful Gallery Routes
Route::resource('gallery', ImageController::class);

Route::post('/images/{image}/like', [LikeController::class, 'store'])->name('like');
Route::post('/images/{image}/comment', [CommentController::class, 'store'])->name('comment');
