<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'redirectLoginView']);
Route::post('login', [LoginController::class, 'login'])->name('admin.login');
