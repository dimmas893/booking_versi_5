<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => 'App\Http\Middleware\Admin'], function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'admin'])->name('dashboard');

    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products');
    Route::post('/products/store', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products-store');
    Route::get('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update_image']);
    Route::get('/products/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
    Route::post('/products/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update_post');
    Route::get('get_products', [App\Http\Controllers\Admin\ProductController::class, 'get_products']);
    Route::get('delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete']);


    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
    Route::post('/category/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category-store');
    Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category-edit');
    Route::delete('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category-delete');


    Route::get('/booking/edit/{id}', [App\Http\Controllers\Admin\BookingController::class, 'edit'])->middleware(['auth'])->name('booking-edit');
    Route::post('/booking/update/{id}', [App\Http\Controllers\Admin\BookingController::class, 'update'])->middleware(['auth'])->name('booking-update');
    Route::get('/booking/delete/{id}', [App\Http\Controllers\Admin\BookingController::class, 'destroy'])->middleware(['auth'])->name('booking-delete');
});




Route::get('/pelanggan', [App\Http\Controllers\PelangganController::class, 'index'])->middleware(['auth'])->name('pelanggan');
Route::get('/pelanggan/bayar', [App\Http\Controllers\PelangganController::class, 'bayar'])->middleware(['auth'])->name('bayar');
Route::get('/pelanggan/bukti-bayar/{id}', [App\Http\Controllers\PelangganController::class, 'edit_bukti_bayar'])->middleware(['auth'])->name('edit_bukti_bayar');
Route::get('/pelanggan/invoice', [App\Http\Controllers\PelangganController::class, 'invoice'])->middleware(['auth'])->name('invoice');
Route::post('/pelanggan/bukti-bayar-unggah/{id}', [App\Http\Controllers\PelangganController::class, 'upload_bukti'])->middleware(['auth'])->name('upload_bukti');

Route::get('/booking', [App\Http\Controllers\Admin\BookingController::class, 'index'])->middleware(['auth'])->name('booking');
Route::post('/booking/store', [App\Http\Controllers\Admin\BookingController::class, 'store'])->middleware(['auth'])->name('booking-store');
