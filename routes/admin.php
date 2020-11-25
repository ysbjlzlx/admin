<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'redirectLoginView']);
Route::post('login', [LoginController::class, 'login'])->name('admin.login');

Route::middleware(['admin.auth:admin'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
});
