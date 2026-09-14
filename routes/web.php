<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/whoami', function () {
    return 'Lowell T. Gianan | 2020-05213 | Block 4C | ITRACKB4 Laravel 12';
});

Route::get('/comics/featured', [ComicController::class, 'featured'])
    ->name('comics.featured');

Route::get('/comics/filter/{genre?}', [ComicController::class, 'filter'])
    ->name('comics.filter');

Route::resource('comics', ComicController::class)
    ->only(['index', 'show']);