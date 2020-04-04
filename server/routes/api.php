<?php

use App\Api\Course\Controllers\CourseController;
use App\Api\Course\Controllers\ChapterController;
use App\Api\Topic\Controllers\TopicController;
use App\Api\User\Controllers\LoginController;
use App\Api\User\Controllers\RegisterController;
use App\Api\User\Controllers\UserController;
use App\Api\View\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [LoginController::class, 'login']);
        Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:api');
        Route::post('register', [RegisterController::class, 'register']);
        Route::get('user', [UserController::class, 'authenticated'])->middleware('auth:api');
    });

    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index']);
        Route::get('/{id}', [CourseController::class, 'show']);
        Route::get('/getBySlug/{slug}', [CourseController::class, 'getBySlug']);
        Route::post('/{id}/enroll', [CourseController::class, 'enrollCourse'])->middleware('auth:api');
    });

    Route::prefix('chapters')->group(function () {
        Route::get('/{id}', [ChapterController::class, 'show']);
        Route::get('/getBySlug/{slug}', [ChapterController::class, 'getBySlug']);
    });

    Route::prefix('topics')->group(function () {
        Route::get('/', [TopicController::class, 'index']);
        Route::get('/getBySlug/{slug}', [TopicController::class, 'getBySlug']);
        Route::get('/getBySlug/{slug}/courses', [TopicController::class, 'getBySlugCourses']);
    });

    Route::prefix('users')->group(function () {
        Route::put('/{user}', [UserController::class, 'update']);
    });

    Route::prefix('views')->group(function () {
        Route::post('/record-topic-view/{id}', [ViewController::class, 'recordTopicView']);
        Route::post('/record-course-view/{id}', [ViewController::class, 'recordCourseView']);
    });
});
