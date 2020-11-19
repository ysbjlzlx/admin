<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\RandomController;

Route::post('user/register', 'Api\AuthController@register');
Route::post('user/login', 'Api\AuthController@login');
Route::middleware([App\Http\Middleware\CheckApiToken::class])->group(
    function () {
        Route::get('user/profile', 'Api\UserController@profile');
        // post
        Route::post('post/save', 'Api\PostController@save');
    }
);




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

Route::get('health', [HealthController::class, 'action']);
Route::get('random/string', [RandomController::class, 'string']);
Route::get('random/uniqid', [RandomController::class, 'uniqid']);
