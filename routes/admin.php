<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'redirectLoginView']);
Route::post('login', [LoginController::class, 'login'])->name('admin.login');
Route::get('dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
