<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/example', function () {
    return view('pages.example');
});

Route::get('/account', function () {
    return view('pages.user-account.index');
});

Route::prefix('/p')->name('products.')->group(function () {
    Route::get('/search', action: [ProductSearchController::class, 'index'])->name('search');
    Route::get('/{product}', action: [ProductController::class, 'show'])->name('show');
});
