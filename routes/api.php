<?php

use Illuminate\Support\Facades\Route;

Route::post('user/register', 'Api\AuthController@register');
Route::post('user/login', 'Api\AuthController@login');
Route::middleware([App\Http\Middleware\CheckApiToken::class])->group(
    function () {
        Route::get('user/profile', 'Api\UserController@profile');
        // post
        Route::post('post/save', 'Api\PostController@save');
    }
);
