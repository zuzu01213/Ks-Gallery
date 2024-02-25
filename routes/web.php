<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Models\User;
// Home Route
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

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/upload', [DashboardController::class, 'upload'])->name('dashboard.upload');

    // Gallery Routes
    Route::prefix('/dashboard/gallery')->group(function () {
        Route::get('/main', [DashboardController::class, 'main'])->name('dashboard.gallery.main');
    });

    // Logout Route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Pricing Route
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');

// Resourceful Gallery Routes
Route::resource('gallery', ImageController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);

// Like and Comment Routes
Route::post('/images/{image}/like', [LikeController::class, 'store'])->name('like');
Route::post('/images/{image}/comment', [CommentController::class, 'store'])->name('comment');

// Additional Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/main', [DashboardController::class, 'main'])->name('dashboard.main');
    Route::delete('/dashboard/destroy/{id}', [DashboardController::class, 'destroyImage'])->name('dashboard.destroy');
    Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');

});
Route::middleware(['auth'])->group(function () {
    // GET route to display categories management page
    Route::get('/dashboard/categories', function () {
        if (auth()->user()->isAdmin() || auth()->user()->isOperator()) {
            $dashboardController = new DashboardController();
            return $dashboardController->categories();
        } else {
            abort(403, 'Unauthorized');
        }
    })->name('dashboard.categories');

    // POST route to store a new category
    Route::post('/dashboard/categories', 'DashboardController@storeCategory')->name('dashboard.categories.store');
});
