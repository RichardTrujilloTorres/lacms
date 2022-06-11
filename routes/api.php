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


Route::prefix('notifications')
    ->as('notifications.')
    ->group(function() {
        Route::get('', [\App\Http\Controllers\API\NotificationsController::class, 'latest'])
            ->name('latest');
        Route::get('{notification}', [\App\Http\Controllers\API\NotificationsController::class, 'show'])
            ->name('show');
        Route::put('{notification}', [\App\Http\Controllers\API\NotificationsController::class, 'markAsRead'])
            ->name('mark-as-read');
    });


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
        Route::prefix('sync')
            ->as('sync.')
            ->group(function () {
                Route::get('', [\App\Http\Controllers\API\SyncController::class, 'lastUpdatedAt'])
                    ->name('last-updated-at');
                Route::post('', [\App\Http\Controllers\API\SyncController::class, 'syncNow'])
                    ->name('sync-now');
            });
    });

Route::prefix('users')
    ->as('users.')
    ->group(function() {
        Route::get('', [\App\Http\Controllers\API\UsersController::class, 'index'])
            ->name('index');
        Route::get('{user}', [\App\Http\Controllers\API\UsersController::class, 'show'])
            ->name('show');
        Route::put('{user}', [\App\Http\Controllers\API\UsersController::class, 'update'])
            ->name('update');
        Route::delete('{user}', [\App\Http\Controllers\API\UsersController::class, 'delete'])
            ->name('delete');
    });

Route::prefix('posts')
    ->as('posts.')
    ->group(function() {
        Route::get('', [\App\Http\Controllers\API\PostsController::class, 'index'])
            ->name('index');
        Route::get('{post}', [\App\Http\Controllers\API\PostsController::class, 'show'])
            ->name('show');
        Route::put('{post}', [\App\Http\Controllers\API\PostsController::class, 'update'])
            ->name('update');
        Route::delete('{post}', [\App\Http\Controllers\API\PostsController::class, 'delete'])
            ->name('delete');
    });
