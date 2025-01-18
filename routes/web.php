<?php

use App\Http\Controllers\CategoryChildrenController;
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

Route::prefix('/products')->name('products.')->group(function () {
    Route::get('/search', action: [ProductSearchController::class, 'index'])
        ->name('search')
        ->middleware(['htmx-no-cache']);
    Route::get('/{product}', action: [ProductController::class, 'show'])->name('show');
});

Route::get('/categories/{collection}/children', CategoryChildrenController::class)
    ->name('categories.children')
    ->middleware(['htmx-no-cache']);
