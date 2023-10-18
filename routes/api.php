<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\Library\BookController;

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

Route::as('api.')->group(function() {
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/register', [UserController::class, 'register'])->name('register');

    Route::middleware('auth:sanctum')->group(function() {
        Route::get('/user', [UserController::class, 'user'])->name('user');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');

        Route::apiResource('books', BookController::class);
    });
});
