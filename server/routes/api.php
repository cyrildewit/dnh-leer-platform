<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Api\User\Controllers\LoginController;
use App\Api\User\Controllers\UserController;
use App\Api\Course\Controllers\CourseController;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [LoginController::class, 'login']);
        // Route::post('register', 'RegisterController@register');
        Route::get('user', [UserController::class, 'authenticated']);
    });

    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index']);
    });
});
