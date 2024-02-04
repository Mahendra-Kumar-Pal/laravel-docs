<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::controller(\App\Http\Controllers\ApiAuthController::class)->group(function () {
        Route::post('/signIn', 'index');
        Route::post('/signUp', 'store');
    });
});
// Route::group(['prefix' => 'user'], function () {
//     Route::controller(\App\Http\Controllers\ApiUserController::class)->group(function () {
//         Route::get('/', 'index');
//     });
// });
Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'user'], function () {
    Route::controller(\App\Http\Controllers\ApiUserController::class)->group(function () {
        Route::get('/', 'index');
    });
});

Route::get('/articles', [\App\Http\Controllers\ArticlesController::class, 'index']);
Route::get('/articles/withoutcache', [\App\Http\Controllers\ArticlesController::class, 'allWithoutcache']);

