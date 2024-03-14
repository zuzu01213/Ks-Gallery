<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController; // Added this line for ImageController

// Public routes
Route::get('/', function () {
    return view('home.index');
});

// Authentication routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/gallery/main', [DashboardController::class, 'main'])->name('dashboard.gallery.main');
    Route::get('/dashboard/main', [DashboardController::class, 'main'])->name('dashboard.main');
    Route::post('/dashboard/upload', [DashboardController::class, 'upload'])->name('dashboard.upload');
    Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::post('/dashboard/publish-draft', [DashboardController::class, 'publishDraft'])->name('dashboard.publishDraft');
    Route::post('/dashboard/publish-selected', [DashboardController::class, 'publishSelected'])->name('dashboard.publishSelected');
    Route::delete('/dashboard/destroy/{id}', [DashboardController::class, 'destroyImage'])->name('dashboard.destroyImage');
    Route::delete('/dashboard/destroy-selected', [DashboardController::class, 'destroySelected'])->name('dashboard.destroySelected');



    // Gallery routes
    Route::prefix('/dashboard/gallery')->group(function () {
        Route::get('/', [DashboardController::class, 'galleryIndex'])->name('dashboard.gallery.index');
        // Add more gallery routes here if needed
    });

    // Logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Like and comment routes
    Route::post('/images/{image}/like', [LikeController::class, 'store'])->name('like.store');
    Route::post('/images/{image}/comment', [CommentController::class, 'store'])->name('comment.store');
});

// Pricing route
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');

// Resourceful gallery routes
Route::resource('gallery', ImageController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);

// Category routes (for admin and operator only)
Route::middleware(['role:admin,operator'])->group(function () {
    Route::resource('categories', CategoryController::class)->except(['show']);
});

