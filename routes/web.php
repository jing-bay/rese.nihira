<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
*/

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [AuthenticatedSessionController::class, 'create']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');

Route::get('/thanks', [ThanksController::class, 'index']);

Route::get('/', [ShopsController::class, 'index']);
Route::get('/detail/{shop_id}', [ShopsController::class, 'detail']);
Route::get('/search', [ShopsController::class, 'search']);

Route::post('/favorites/{shop_id}', [FavoritesController::class, 'store'])->middleware('auth');
Route::post('/favorites/delete/{shop_id}', [FavoritesController::class, 'delete'])->middleware('auth');

Route::post('/booking/{shop_id}', [BookingsController::class, 'store'])->middleware('auth');
Route::get('/done', [BookingsController::class, 'done'])->middleware('auth');
Route::post('/booking/delete/{shop_id}', [BookingsController::class, 'delete'])->middleware('auth');



