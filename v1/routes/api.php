<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\WebinarController;

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

Route::prefix('v1')->group(function () {

    Route::post('/auth/login/email', [AuthController::class, 'login']);
    Route::get('/post/analysis', [WebinarController::class, 'favouriteWebinar']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/me/user/logout', [AuthController::class, 'logout']);
        Route::post('/me/user/info', function () {
            return "ok";
        });
        Route::get('/me/user/favourite/post-analysis', [WebinarController::class, 'getFavouriteList']);
        Route::post('/me/user/favourite/post-analysis/{id}', [WebinarController::class, 'favouriteWebinar']);
        Route::delete('/me/user/favourite/post-analysis/{id}', [WebinarController::class, 'unfavouriteWebinar']);
    });

});
