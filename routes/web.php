<?php

use App\Http\Controllers\ComicController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/comics/filter', [ComicController::class, 'filter'])->name('comics.filter');

Route::get('/comics/filter/{genre?}', [ComicController::class, 'filter'])->name('comics.filter');

Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');

Route::get('/comics/{id?}', [ComicController::class, 'show'])->name('comics.show');


