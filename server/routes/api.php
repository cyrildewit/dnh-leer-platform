<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Api\User\Controllers\LoginController;
use App\Api\User\Controllers\UserController;
use App\Api\Course\Controllers\CourseController;
use App\Api\Topic\Controllers\TopicController;
use App\Api\View\Controllers\ViewController;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [LoginController::class, 'login']);
        // Route::post('register', 'RegisterController@register');
        Route::get('user', [UserController::class, 'authenticated'])->middleware('auth:api');
    });

    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index']);
        Route::get('/getBySlug/{slug}', [CourseController::class, 'getBySlug']);
    });

    Route::prefix('topics')->group(function () {
        Route::get('/', [TopicController::class, 'index']);
        Route::get('/getBySlug/{slug}', [TopicController::class, 'getBySlug']);
    });

    Route::prefix('users')->group(function () {
        Route::put('/{user}', [UserController::class, 'update']);
    });

    Route::prefix('views')->group(function () {
        Route::post('/record-topic-view/{id}', [ViewController::class, 'recordTopicView']);
        Route::post('/record-course-view/{id}', [ViewController::class, 'recordCourseView']);
    });
});
