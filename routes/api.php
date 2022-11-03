<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/camps/favorite', [\App\Http\Controllers\CampController::class, 'listFavorite']);
Route::post('/camps/{camp}/favorite', [\App\Http\Controllers\CampController::class, 'addFavorite']);
Route::delete('/camps/{camp}/favorite', [\App\Http\Controllers\CampController::class, 'removeFavorite']);
Route::apiResource('camps', \App\Http\Controllers\CampController::class);
