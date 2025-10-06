<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProductApiControllerV2;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [ProductApiController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductApiController::class, 'show'])->name('products.show');

Route::get('/v2/products', [ProductApiControllerV2::class, 'index'])->name('products.v2.index');
Route::get('/v2/products/{id}', [ProductApiControllerV2::class, 'show'])->name('products.v2.show');
