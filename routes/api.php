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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('notifications', [\App\Http\Controllers\API\NotificationsController::class, 'latest'])
    ->name('notifications.latest');


Route::prefix('settings')
    ->as('settings.')
    ->group(function() {
        Route::prefix('do-not-disturb')
            ->as('do-not-disturb.')
            ->group(function () {
                Route::get('', [\App\Http\Controllers\API\DoNotDisturbController::class, 'status'])
                    ->name('status');
                Route::put('', [\App\Http\Controllers\API\DoNotDisturbController::class, 'update'])
                    ->name('update');
            });
    });

Route::prefix('users')
    ->as('users.')
    ->group(function() {
        Route::get('', [\App\Http\Controllers\API\UsersController::class, 'index'])
            ->name('index');
    });
