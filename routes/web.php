<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/', [DashboardController::class,'index'])->name('dashboardWeb');

Route::get('products/{id}/gallery', [ProductController::class,'gallery'])->name('products.gallery');
Route::middleware(['auth:sanctum', 'verified'])->resource('products', ProductController::class);
Route::resource('product-galleries', ProductGalleryController::class);

Route::get('transactions/{id}/set-status', [TransactionController::class,'setStatus'])->name('transactions.status');
Route::middleware(['auth:sanctum', 'verified'])->resource('transactions', TransactionController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
