<?php

use App\Http\Controllers\ComicController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/whoami', function () {
    return 'Lowell T. Gianan | 2020-05213 | Block 4C | ITRACKB4 Laravel 12';
});

Route::get('/comics/feature', [ComicController::class, 'feature'])
    ->name('comics.feature');

Route::get('/comics/filter/{genre?}', function (?string $genre = null) {
    return redirect()->route('comics.index', $genre ? ['genre' => $genre] : []);
})->name('comics.filter');

Route::resource('comics', ComicController::class)
    ->only(['index', 'show']);