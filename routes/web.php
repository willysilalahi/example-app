<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckToken;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;


Route::get('/', CustomerController::class, 'index');
Route::get('/login', [CustomerController::class, 'login'])->name('login.view');
Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
Route::get('/test', [CustomerController::class, 'test'])->name('test');
Route::post('/login', [CustomerController::class, 'loginPost'])->name('login');

Route::middleware([CheckToken::class])->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/add', [ProductController::class, 'add'])->name('product');
        Route::get('/{id}', [ProductController::class, 'detail'])->name('product.detail');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer');
        Route::get('/add', [CustomerController::class, 'add'])->name('customer');
        Route::get('/{id}', [CustomerController::class, 'detail'])->name('customer.detail');
    });
    Route::get('/products', [CustomerController::class, 'products'])->name('customer.detail');
});
