<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {



    Route::get('/category', [App\Http\Controllers\Api\CategoryController::class, 'index']);
    Route::post('/category/store', [App\Http\Controllers\Api\CategoryController::class, 'store']);
    Route::get('/category/edit/{id}', [App\Http\Controllers\Api\CategoryController::class, 'edit']);
    Route::post('/category/update/{id}', [App\Http\Controllers\Api\CategoryController::class, 'update']);
    Route::delete('/category/delete/{id}', [App\Http\Controllers\Api\CategoryController::class, 'destroy']);

    Route::get('/products', [App\Http\Controllers\Api\ProductController::class, 'index']);
    Route::post('/products/store', [App\Http\Controllers\Api\ProductController::class, 'store']);
    Route::get('/products/edit/{id}', [App\Http\Controllers\Api\ProductController::class, 'edit']);
    Route::post('/products/update/{id}', [App\Http\Controllers\Api\ProductController::class, 'update']);
    Route::delete('/products/delete/{id}', [App\Http\Controllers\Api\ProductController::class, 'destroy']);

    Route::get('/booking', [App\Http\Controllers\Api\BookingController::class, 'index']);
    Route::post('/booking/store', [App\Http\Controllers\Api\BookingController::class, 'store']);
    Route::get('/booking/edit/{id}', [App\Http\Controllers\Api\BookingController::class, 'edit']);
    Route::post('/booking/update/{id}', [App\Http\Controllers\Api\BookingController::class, 'update']);
    Route::delete('/booking/delete/{id}', [App\Http\Controllers\Api\BookingController::class, 'destroy']);



    Route::get('/pelanggan', [App\Http\Controllers\Api\PelangganController::class, 'index']);
    Route::get('/pelanggan/bayar', [App\Http\Controllers\Api\PelangganController::class, 'bayar']);
    Route::get('/pelanggan/bukti-bayar/{id}', [App\Http\Controllers\Api\PelangganController::class, 'edit_bukti_bayar']);
    Route::post('/pelanggan/bukti-bayar/{id}', [App\Http\Controllers\Api\PelangganController::class, 'upload_bukti']);
    Route::get('/pelanggan/invoice', [App\Http\Controllers\Api\PelangganController::class, 'invoice']);
    Route::post('/logout', [App\Http\Controllers\Api\UserController::class, 'logout']);
    Route::get('/fetch', [App\Http\Controllers\Api\UserController::class, 'fetch']);
});

Route::post('/login', [App\Http\Controllers\Api\UserController::class, 'login']);
Route::post('/register', [App\Http\Controllers\Api\UserController::class, 'register']);
