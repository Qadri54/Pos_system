<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Landing Pages
Route::get('/', function () {
    return view('landing_page');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// SEO Routes
Route::get('/sitemap.xml', function () {
    return response()->file(public_path('sitemap.xml'));
});

Route::get('/robots.txt', function () {
    return response()->file(public_path('robots.txt'));
});

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Profile Management
    |--------------------------------------------------------------------------
    */
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Management Resources (CRUD)
    |--------------------------------------------------------------------------
    */
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('outlets', OutletController::class);
    Route::resource('histories', HistoryController::class);

    /*
    |--------------------------------------------------------------------------
    | Order Management
    |--------------------------------------------------------------------------
    */
    Route::resource('orders', OrderController::class)->except(['show']);

    // Order Status Routes
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('ongoing', [OrderController::class, 'ongoing'])->name('ongoing');
        Route::get('completed', [OrderController::class, 'completed'])->name('completed');
        Route::get('canceled', [OrderController::class, 'canceled'])->name('canceled');
        Route::post('invoice', [OrderController::class, 'invoice'])->name('invoice');
    });

});

require __DIR__ . '/auth.php';
