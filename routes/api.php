<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


Route::group([
    'middleware' => 'auth:api',
], function () {
	Route::get('user', [AuthController::class, 'user']);
	Route::put('users/info', [AuthController::class, 'updateInfo']);
	Route::put('users/password', [AuthController::class, 'updatePassword']);
    Route::apiResource('users', UserController::class);
});
