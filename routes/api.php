<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [ProductController::class, 'login']);
Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/product', [ProductController::class, 'getProducts']);
    Route::post('/product', [ProductController::class, 'createProducts']);
});
