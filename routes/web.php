<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index')->name('index');
Route::get('api', 'IndexController@openapi')->name('openapi');
Route::get('storage/{filename}', 'IndexController@storage');

Route::get('login', 'Web\LoginController@redirectLoginView')->name('login');
Route::post('login', 'Web\LoginController@login');

Route::get('register', 'Web\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Web\RegisterController@register');

Route::middleware(['auth'])->group(function () {
    Route::post('logout', 'Web\LoginController@logout')->name('logout');
    Route::resource('posts', 'PostsController');
});

Route::get('/', [IndexController::class, 'index']);
