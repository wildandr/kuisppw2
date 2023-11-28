<?php

use App\Http\Controllers\FavouriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RatingController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/book/{book_id}/rate', [RatingController::class, 'store']);

Route::post('/book/{book_id}/favourite', [FavouriteController::class, 'store'])->middleware('auth');
Route::get('/buku/myfavourite', [FavouriteController::class, 'index'])->middleware('auth');
