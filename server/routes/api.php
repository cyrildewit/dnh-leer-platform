<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Api\Controllers\Auth\LoginController;
use App\Api\Controllers\Auth\UserController;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [LoginController::class, 'login']);
        // Route::post('register', 'RegisterController@register');
        Route::get('user', [UserController::class, 'authenticated']);
    });
});
