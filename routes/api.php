<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\RandomController;
use Illuminate\Support\Facades\Route;

Route::post('user/register', [AuthController::class, 'register']);
Route::post('user/login', [AuthController::class, 'login']);
Route::middleware([App\Http\Middleware\CheckApiToken::class])->group(
    function () {
        Route::get('user/profile', [UserController::class, 'profile']);
        // post
        Route::post('post/save', [PostController::class, 'save']);
    }
);

Route::get('health', [HealthController::class, 'action']);
Route::get('random/string', [RandomController::class, 'string']);
Route::get('random/uniqid', [RandomController::class, 'uniqid']);
