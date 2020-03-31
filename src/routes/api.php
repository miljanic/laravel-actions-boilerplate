<?php

use App\Api\Controllers\AuthController;
use App\Api\Controllers\TodoController;
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
Route::group(['prefix' => 'auth', 'as' => 'auth::'], function () {
    Route::post('register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::post('refresh', [AuthController::class, 'refresh'])
        ->name('refresh');

    Route::get('me', [AuthController::class, 'me'])
        ->name('me');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'todos', 'as' => 'todos::'], function () {
        Route::get('/', [TodoController::class, 'index'])
            ->name('index');

        Route::post('/', [TodoController::class, 'store'])
            ->name('store');

        Route::put('/{todo}', [TodoController::class, 'update'])
            ->name('update');

        Route::delete('/{todo}', [TodoController::class, 'destroy'])
            ->name('destroy');
    });
});
