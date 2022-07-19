<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\EvaluationController;


/*
Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

Route::get('/thanks', [ThanksController::class, 'index']);

Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{shop_id}', [ShopController::class, 'detail']);
Route::get('/search', [ShopController::class, 'search']);

Route::middleware(['auth'])->group(function(){
    Route::post('/favorites', [FavoriteController::class, 'store']);
    Route::post('/favorites/delete/{favorite_id}', [FavoriteController::class, 'delete']);
    Route::post('/booking', [BookingController::class, 'store']);
    Route::get('/done', [BookingController::class, 'done']);
    Route::post('/booking/update/{booking_id}', [BookingController::class, 'update']);
    Route::post('/booking/delete/{booking_id}', [BookingController::class, 'delete']);
    Route::get('/mypage', [MypageController::class, 'index']);
    Route::post('/evaluation', [EvaluationController::class, 'store']);
    Route::post('/evaluation/update/{evaluation_id}', [EvaluationController::class, 'update']);
    Route::post('/evaluation/delete/{evaluation_id}', [EvaluationController::class, 'delete']);
});

require __DIR__.'/auth.php';

