<?php

use App\Http\Controllers\Product\SearchController;
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

Route::get('/search', [SearchController::class, 'index'])->name('products.search');