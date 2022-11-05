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

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => '/camps'], function () {
    Route::get('/favorite', [\App\Http\Controllers\CampController::class, 'listFavorite']);
    Route::post('/{camp}/favorite', [\App\Http\Controllers\CampController::class, 'addFavorite']);
    Route::delete('/{camp}/favorite', [\App\Http\Controllers\CampController::class, 'removeFavorite']);
});
Route::apiResource('camps', \App\Http\Controllers\CampController::class);
