<?php

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

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Auth::routes();

Route::get('/products', [App\Http\Controllers\ProductController::class, 'showList'])->name('product');

Route::get('/search', [App\Http\Controllers\ProductController::class, 'search']);

Route::post('/destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');

Route::post('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');

Route::get('/show/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');

Route::put('/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');